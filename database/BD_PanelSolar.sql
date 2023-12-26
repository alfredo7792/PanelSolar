-- Crear la base de datos en MySQL
CREATE DATABASE IF NOT EXISTS bd_panel_solar;
USE bd_panel_solar;

-- Tabla para los datos de la estación
CREATE TABLE IF NOT EXISTS Estacion (
    EstacionID INT AUTO_INCREMENT PRIMARY KEY,
    NombreEstacion VARCHAR(30),
    FechaInstalacion DATE,
    Ubicacion VARCHAR(60)
);

-- Tabla para los datos de los sensores
CREATE TABLE IF NOT EXISTS Sensor_data (
    SensorID INT AUTO_INCREMENT PRIMARY KEY,
    temperature FLOAT,
    voltage FLOAT,
    luminosity FLOAT,
    proximity FLOAT,
    EstacionID INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (EstacionID) REFERENCES Estacion(EstacionID)
);

-- Tabla para los registros de la batería
CREATE TABLE IF NOT EXISTS Battery_status (
    BatteryID INT AUTO_INCREMENT PRIMARY KEY,
    timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    battery_level FLOAT,
    EstacionID INT,
    FOREIGN KEY (EstacionID) REFERENCES Estacion(EstacionID)
);

-- Tabla para los datos de los roles del sistema
CREATE TABLE IF NOT EXISTS Rol (
    RolID INT AUTO_INCREMENT PRIMARY KEY,
    NombreRol VARCHAR(20)
);

insert into rol(NombreRol) values ("Administrador")