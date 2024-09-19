<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir Nueva Prenda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #c3d0e3; /* Fondo suave y claro para la página */
        }
        .container {
            background-color: #f7dfdf; /* Fondo blanco para el contenedor principal */
            border-radius: 8px; /* Bordes redondeados */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Sombra sutil */
            padding: 20px;
            margin-top: 20px;
            max-width: 600px; /* Ancho máximo del contenedor */
            margin-left: auto; /* Centrando horizontalmente */
            margin-right: auto; /* Centrando horizontalmente */
        }
        h1 {
            color: #333333; /* Color del título */
        }
        .btn-secondary {
            background-color: #6c757d; /* Color del botón secundario */
            border-color: #6c757d; /* Borde del botón secundario */
        }
        .btn-secondary:hover {
            background-color: #5a6268; /* Color de fondo al pasar el ratón */
            border-color: #545b62; /* Borde del botón al pasar el ratón */
        }
        .btn-success {
            background-color: #28a745; /* Color del botón de éxito */
            border-color: #28a745; /* Borde del botón de éxito */
        }
        .btn-success:hover {
            background-color: #218838; /* Color de fondo al pasar el ratón */
            border-color: #1e7e34; /* Borde del botón al pasar el ratón */
        }
        .form-control {
            background-color: #f8f9fa; /* Fondo más claro para los campos del formulario */
            border-color: #ced4da; /* Borde más claro para los campos del formulario */
            max-width: 100%; /* Ancho máximo del campo de entrada */
        }
        .form-control:focus {
            border-color: #80bdff; /* Color del borde cuando el campo está en foco */
            box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0.25); /* Sombra al enfocar el campo */
        }
        .form-group {
            margin-bottom: 1rem; /* Espacio entre los campos del formulario */
        }
        .btn-group {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Título de la página -->
        <h1 class="my-4 text-center">Añadir Prendas</h1>
        
        <!-- Botones para navegación -->
        <div class="d-flex justify-content-center mb-4">
            <!-- Botón para regresar -->
            <a href="{{ route('inventario.index', ['localId' => $local->id]) }}" class="btn btn-secondary me-3">Regresar</a>
            
            <!-- Botón para ir al Dashboard -->
            <a href="{{ route('dashboard') }}" class="btn btn-secondary">Inicio</a>
        </div>

        <form action="{{ route('inventario.store', ['localId' => $local->id]) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nombre">Nombre de la Prenda</label>
                <input type="text" name="nombre" id="nombre" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="talla">Talla</label>
                <input type="text" name="talla" id="talla" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="cantidad_inicial">Cantidad Inicial</label>
                <input type="number" name="cantidad_inicial" id="cantidad_inicial" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-success mt-3">Guardar Prenda</button>
            <a href="{{ route('inventario.index', ['localId' => $local->id]) }}" class="btn btn-secondary mt-3">Cancelar</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
