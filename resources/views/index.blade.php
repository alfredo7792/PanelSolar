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
                        }
                
                        h1 {
                            color: silver;
                            text-align: center;
                            margin-bottom: 30px;
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
                
                    <div class="container">
                        <h1>PANEL SOLAR 1</h1>
                
                        @foreach ($datos as $dato)
                            <div class="data-card">
                                <p>
                                    <strong>Temperatura:</strong> {{ $dato->temperatura }}°C<br>
                                    <strong>Voltaje:</strong> {{ $dato->voltaje }}V<br>
                                    <strong>Intensidad de Luz:</strong> {{ $dato->intensidad_luz }} Lux<br>
                                    <strong>Distancia:</strong> {{ $dato->distancia }} metros<br>
                                    <strong>Fecha de actualización:</strong> {{ $dato->updated_at }}<br>
                                </p>
                
                                <div class="text-center">
                                    <img class="mx-auto d-block" style="width: 40%; height: 40%;" src="{{ asset('img/panel2.png') }}" alt="Panel Solar">
                                </div>
                            </div>
                        @endforeach
                    </div>
                
                    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
                    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
                    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
