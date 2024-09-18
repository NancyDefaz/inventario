<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir Nueva Prenda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <a href="{{ route('inventario.create', ['localId' => $local->id]) }}" class="btn btn-success mt-4">Añadir Nueva Prenda</a>
        
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
