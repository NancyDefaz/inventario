<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario de Prendas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="my-4 text-center">Inventario de Prendas</h1>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Prenda</th>
                    <th>Talla</th>
                    <th>Cantidad Inicial</th>
                    <th>Ventas del Día</th>
                    <th>Cantidad actual</th>
                    <th>Añadir Stock</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($prendas as $prenda)
                <tr>
                    <form action="{{ route('inventario.actualizar', $prenda->id) }}" method="POST">
                        @csrf
                        <td>{{ $prenda->nombre }}</td>
                        <td>{{ $prenda->talla }}</td>
                        <td>{{ $prenda->cantidad_inicial }}</td>

                        <td>
                            <input type="number" name="ventas_del_dia" class="form-control" value="0">
                        </td>
                        <td>{{ $prenda->sobrante_del_dia_anterior }}</td>
                        <td>
                            <input type="number" name="cantidad_a_añadir" class="form-control" value="0">
                        </td>
                        <td>
                            <div class="btn-group">
                                <button type="submit" class="btn btn-primary btn-sm">Actualizar</button>
                                <a href="#" class="btn btn-warning btn-sm">Editar</a>
                         <!-- Botón para abrir el modal de confirmación -->
                          <button type="button" class="btn btn-danger btn-sm" 
                          data-bs-toggle="modal" 
                          data-bs-target="#confirmDeleteModal"
                          onclick="setDeleteModal('{{ $prenda->nombre }}', '{{ route('inventario.eliminar', $prenda->id) }}')">
                          Eliminar
                          </button>
                                
                                <a href="#" class="btn btn-secondary btn-sm">Deshacer</a>
                            </div>
                        </td>
                    </form>
                </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{ route('inventario.create') }}" class="btn btn-success mt-4">Añadir Nueva Prenda</a>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Modal de confirmación de eliminación -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirmar Eliminación</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p id="deleteMessage"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <!-- Formulario para eliminar -->
                <form id="deleteForm" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function setDeleteModal(prendaNombre, deleteUrl) {
        // Actualizar el mensaje de confirmación con el nombre de la prenda
        document.getElementById('deleteMessage').textContent = '¿Estás seguro de que deseas eliminar la prenda "' + prendaNombre + '"?';
        
        // Establecer la acción del formulario de eliminación con la URL correcta
        document.getElementById('deleteForm').action = deleteUrl;
    }
</script>


</body>
</html>