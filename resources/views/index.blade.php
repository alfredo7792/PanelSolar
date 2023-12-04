<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PÁGINA PRINCIPAL</title>
</head>
<body>
    <h1>Datos de Node-RED</h1>

    @foreach ($datos as $dato)
        <p>
            Temperatura: {{ $dato->temperatura }}<br>
            Voltaje: {{ $dato->voltaje }}<br>
            Intensidad de Luz: {{ $dato->intensidad_luz }}<br>
            Distancia: {{ $dato->distancia }}<br>
            Fecha de actualización: {{ $dato->updated_at }}<br>
        </p>
        <hr>
    @endforeach
</body>
</html>