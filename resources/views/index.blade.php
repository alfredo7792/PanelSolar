<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight"></h2>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <style>
                        body {
                            font-family: 'Arial', sans-serif;
                            background-color: #2c3e50;
                            color: #ecf0f1;
                            margin: 20px;
                            display: flex;
                            justify-content: center;
                            align-items: center;
                            min-height: 100vh;
                        }
                
                        .container {
                            background-color: #34495e;
                            border-radius: 10px;
                            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
                            padding: 20px;
                            width: 80%;
                            margin-bottom: 10%
                        }
                
                        #panel-title {
                            color: silver;
                            text-align: center;
                            margin-bottom: 30px;
                        }

                        #prediccion-title {
                            color: #34495e;
                            text-align: center;
                            margin-bottom: 10px;
                        }
                
                        .data-card {
                            border: 1px solid #3498db;
                            border-radius: 8px;
                            padding: 15px;
                            margin-bottom: 20px;
                            background-color: #2c3e50;
                            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
                            color: #ecf0f1; /* Color de texto en las tarjetas de datos */
                        }
                
                        .data-card p {
                            margin-bottom: 0;
                        }
                
                        .data-card strong {
                            color: #e74c3c;
                        }
                
                        .logout-container {
                            position: fixed;
                            top: 20px;
                            right: 20px;
                        }
                
                        /* Color de texto en el botón de cerrar sesión */
                        .btn-danger {
                            color: #fff;
                        }
                    </style>
                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                    <script>
                        var $j = jQuery.noConflict();
                        function actualizarDatos() {
                            $j.ajax({
                                url: '/mostrar',
                                type: 'GET',
                                dataType: 'json',
                                success: function(data) {
                                    // Actualiza los elementos de tu interfaz de usuario con los nuevos datos
                                    $('#temperatura').text(data.temperature);
                                    $('#voltaje').text(data.voltage);
                                    $('#distancia').text(data.proximity);
                                    $('#intensidad').text(data.luminosity);
                                    var fechaActualizacion = new Date(data.updated_at);
                                    var opcionesFecha = { year: 'numeric', month: 'numeric', day: 'numeric' };
                                    var opcionesHora = { hour: 'numeric', minute: 'numeric', second: 'numeric' };
                                    var fechaFormateada = fechaActualizacion.toLocaleDateString('es-ES', opcionesFecha);
                                    var horaFormateada = fechaActualizacion.toLocaleTimeString('es-ES', opcionesHora);

                                    // Actualiza el elemento con la fecha y hora formateada
                                    $('#fecha-actualizacion').text(fechaFormateada + ' ' + horaFormateada);
                                },
                                error: function(xhr, status, error) {
                                    console.error('Error al obtener datos: ' + error);
                                }
                            });
                        }
                        
                        // Llama a la función automáticamente cada cierto tiempo (por ejemplo, cada 5 segundos)
                        setInterval(actualizarDatos, 1500); // 5000 milisegundos = 5 segundos
                        // Llama a la función de actualización al cargar la página
                        actualizarDatos();
                    </script>


                
                    <div class="container">
                        <h1 id="panel-title">PANEL SOLAR 1</h1>
                            <div class="data-card">
                                <p>
                                    <strong>Temperatura:</strong> <span id="temperatura">{{$temperatura}}</span><br>
                                    <strong>Voltaje:</strong> <span id="voltaje">{{$voltaje}}</span><br>
                                    <strong>Intensidad de Luz:</strong> <span id="intensidad">{{$distancia}}</span><br>
                                    <strong>Distancia:</strong> <span  id="distancia">{{$intensidad}}</span><br>
                                    <strong>Fecha de actualización:</strong> <span id="fecha-actualizacion">{{$fechaActual}}</span><br>
                                </p>
                
                                <div class="text-center">
                                    <img class="mx-auto d-block" style="width: 40%; height: 40%;" src="{{ asset('img/panel2.png') }}" alt="Panel Solar">
                                </div>
                            </div>
                        
                    </div>
                    <div>
                        <h1 id="prediccion-title">PREDICCION</h1>
                        <img src="img/grafica_prediccion.png" alt="grafica de prediccion">
                    </div>
                
                    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
                    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
                    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
