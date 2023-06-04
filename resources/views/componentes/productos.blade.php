@extends('layout')

@section('productos')
    <div class="d-flex justify-content-between">
        <h3>Productos</h3>
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#agregarProductoModal">+ Agregar producto</button>
    </div>
    @if (session('success'))
        <div class="alert alert-success" id="success-alert">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-warning" id="error-alert">
            {{ session('error') }}
        </div>
    @endif

    <div class="pt-3">
        <table class="table">
            <thead>
                <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Referencia</th>
                <th scope="col">Categoría</th>
                <th scope="col">Precio</th>
                <th scope="col">Peso (g)</th>
                <th scope="col">Stock</th>
                <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productos as $producto )
                    <tr>
                        <td>{{ $producto->nombre }}</td>
                        <td>{{ $producto->referencia }}</td>
                        <td>{{ $producto->categoria->nombre }}</td>
                        <td>{{ $producto->precio }}</td>
                        <td>{{ $producto->peso }}g</td>
                        <td>{{ $producto->stock }}</td>
                        <td>
                            <button 
                            class="btn btn-transparent" 
                            type="button"
                            data-bs-toggle="modal" 
                            data-bs-target="#editarProductoModal" 
                            data-nombre="{{ $producto->nombre }}" 
                            data-referencia="{{ $producto->referencia }}" 
                            data-categoria="{{ $producto->categoria_id }}" 
                            data-precio="{{ $producto->precio }}" 
                            data-peso="{{ $producto->peso }}" 
                            data-stock="{{ $producto->stock }}"
                            data-id="{{ $producto->id }}" >
                                <i class="material-icons medium" style="color: #024cbd">edit</i>
                            </button>

                            <button 
                            class="btn btn-transparent" 
                            data-bs-toggle="modal" 
                            data-bs-target="#confirmModal"
                            data-id="{{ $producto->id }}">
                                <i class="material-icons medium" style="color: rgb(168, 9, 9)">delete</i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @if (count($productos) == 0)
            No hay productos disponibles
        @endif
        <div class="pagination justify-content-center">
            {{ $productos->links() }}
        </div>
    </div>

    {{-- MODAL CREAR PRODUCTO --}}
    <div class="modal fade" id="agregarProductoModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('guardarProducto') }}" method="POST">
                @csrf

                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">Agregar Producto</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                    </div>

                    <div class="modal-body">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre">
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="precio" class="form-label">Precio</label>
                                    <input type="number" class="form-control" id="precio" name="precio">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="peso" class="form-label">Peso (g)</label>
                                    <input type="text" class="form-control" id="peso" name="peso">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="referencia" class="form-label">Referencia</label>
                                <input type="text" class="form-control" id="referencia" name="referencia">
                            </div>
                            <div class="mb-3">
                                <label for="categoria" class="form-label">Categoría</label>
                                <select class="form-control" id="categoria_id" name="categoria_id">
                                    @foreach ($categorias as $categoria)
                                        <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="stock" class="form-label">Stock</label>
                                <input type="number" class="form-control" id="stock" name="stock">
                            </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button class="btn btn-primary" type="submit">Guardar</button>
                    </div>

                </div>
            </form>
        </div>
    </div>
            
    {{-- MODAL EDITAR PRODUCTO --}}
    <div class="modal fade" id="editarProductoModal" tabindex="-1" aria-labelledby="edicionModal" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('actualizarProducto') }}" method="POST">
                @csrf

                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title" id="edicionModal">Editar Producto</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                    </div>

                    <div class="modal-body">
                            <input type="hidden" name="id" id="id">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="nombreEdit" name="nombre">
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="precio" class="form-label">Precio</label>
                                    <input type="number" class="form-control" id="precioEdit" name="precio">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="peso" class="form-label">Peso (g)</label>
                                    <input type="text" class="form-control" id="pesoEdit" name="peso">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="referencia" class="form-label">Referencia</label>
                                <input type="text" class="form-control" id="referenciaEdit" name="referencia">
                            </div>
                            <div class="mb-3">
                                <label for="categoria" class="form-label">Categoría</label>
                                <select class="form-control" id="categoria_id_edit" name="categoria_id">
                                    @foreach ($categorias as $categoria)
                                        <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="stock" class="form-label">Stock</label>
                                <input type="number" class="form-control" id="stockEdit" name="stock">
                            </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button class="btn btn-primary" type="submit">Guardar</button>
                    </div>

                </div>
            </form>
        </div>
    </div>

    {{-- MODAL ELIMINAR PRODUCTO --}}
    <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('eliminarProducto') }}" method="POST">
                @csrf

                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmModalLabel">Confirmación</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                    </div>

                    <div class="modal-body">
                        <p>¿Estás seguro de que deseas eliminar el producto?</p>

                        <input type="hidden" name="id" id="idDel">

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-danger">Aceptar</button>
                    </div>

                </div>
            </form>
        </div>
    </div>
  
  <script>
    // Obtener el modal y los campos
    var modalEdit = document.getElementById('editarProductoModal');

    var modalDelete = document.getElementById('confirmModal');

    // Escuchar el evento de mostrar el modal de editar
    modalEdit.addEventListener('show.bs.modal', function (event) {
        // Obtener el botón que abrió el modal
        var button = event.relatedTarget;

        var nombreInput = document.getElementById('nombreEdit');
        var referenciaInput = document.getElementById('referenciaEdit');
        var categoriaInput = document.getElementById('categoria_id_edit');
        var precioInput = document.getElementById('precioEdit');
        var pesoInput = document.getElementById('pesoEdit');
        var stockInput = document.getElementById('stockEdit');
        var productoIdInput = document.getElementById('id');
  
        // Obtener los datos del producto desde los atributos data-*
        var nombre = button.getAttribute('data-nombre');
        var referencia = button.getAttribute('data-referencia');
        var categoria = button.getAttribute('data-categoria');
        var precio = button.getAttribute('data-precio');
        var peso = button.getAttribute('data-peso');
        var stock = button.getAttribute('data-stock');
        var id = button.getAttribute('data-id');

        // Poner los datos en los campos del formulario
        nombreInput.value = nombre;
        referenciaInput.value = referencia;
        categoriaInput.value = categoria;
        precioInput.value = precio;
        pesoInput.value = peso;
        stockInput.value = stock;
        productoIdInput.value = id;

    });

    // Escuchar el evento de mostrar el modal de eliminar
    modalDelete.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;
        var productoIdInput = document.getElementById('idDel');
        var id = button.getAttribute('data-id');
        productoIdInput.value = id;
    });
  </script>
  
  <script>
        // Esperar 5 segundos y ocultar el mensaje de éxito
        setTimeout(function() {
            document.getElementById('success-alert').style.display = 'none';
        }, 5000);

        setTimeout(function() {
            document.getElementById('error-alert').style.display = 'none';
        }, 5000);
    </script>
      
@endsection