<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight"></h2>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


                
                    <div class="container">
                        <center>
                            <h1 id="panel-title">Comentario del usuario</h1>
                        </center>
                        <form action="#">
                            <label for="nombre" class="form-label">Nombres</label>
                            <input type="text" id="nombre" placeholder="Ingresa tus nombres" class="form-control"><br>
                            <label for="apellidos" class="form-label">Apellidos</label>
                            <input type="text" id="apellidos" placeholder="Ingresa tus apellidos" class="form-control"><br>
                            <label for="carrera" class="form-label">Escuela profesional</label>
                            <input type="text" id="carrera" placeholder="Ingresa tu carrera profesional" class="form-control" value="Escuela de "><br>
                            <label for="carrera" class="form-label">Comentario (Max. 200 letras)</label>
                            <textarea type="textarea" id="carrera" class="form-control" placeholder="Ingresa tu opinion o comentarios acerca de el presente sistema" maxlength="250" rows="3" cols="50" style="width: 60%"></textarea><br>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Autorizo el uso de mis datos para uso academico</label>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                
                    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
                    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
                    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
