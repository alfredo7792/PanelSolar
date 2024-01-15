import numpy as np
import matplotlib.pyplot as plt
import mysql.connector
from datetime import datetime
import os

# Conectar a la base de datos
conexion = mysql.connector.connect(
    host='localhost',
    user='root',
    password='',
    database='bd_panel_solar'
)

cursor = conexion.cursor()

# Ejemplo de consulta SQL
consulta_sql = "SELECT created_at, temperature FROM sensor_data"
cursor.execute(consulta_sql)

# Obtener resultados de la consulta
resultados = cursor.fetchall()

# Procesar resultados en arrays NumPy
fechas = np.array([resultado[0] for resultado in resultados])
temperatura = np.array([resultado[1] for resultado in resultados])

# Extraer la hora del día de la columna 'created_at'
hora_del_dia = np.array([datetime.strptime(str(fecha), "%Y-%m-%d %H:%M:%S").hour for fecha in fechas])

# Crear un array 2D con la hora del día como única característica para la predicción de temperatura
X = hora_del_dia.reshape(-1, 1)

# Ajustar un modelo de regresión lineal usando NumPy
A = np.column_stack([X, np.ones_like(X)])
modelo, residuos, _, _ = np.linalg.lstsq(A, temperatura, rcond=None)

# Realizar predicciones para la hora del día
hora_prediccion = np.linspace(min(hora_del_dia), max(hora_del_dia), 100)
temperatura_prediccion = modelo[0] * hora_prediccion + modelo[1]

# Visualizar los resultados con Matplotlib
plt.scatter(hora_del_dia, temperatura, label='Datos reales')
plt.plot(hora_prediccion, temperatura_prediccion, color='red', label='Predicción')
plt.xlabel('Hora del día')
plt.ylabel('Temperatura')
plt.legend()
#plt.show()

# Obtener el directorio actual del script
script_directory = os.path.dirname(os.path.abspath(__file__))

# Construir la ruta completa del archivo de imagen
imagen_path = os.path.join(script_directory, 'grafica_prediccion.png')

# Guardar la gráfica en el archivo de imagen
plt.savefig(imagen_path)
# Cerrar la conexión a la base de datos
cursor.close()
conexion.close()
