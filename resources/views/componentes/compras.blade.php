@extends('layout')

@section('compras')
    <div>
        <h4>Seleccione un producto</h4>
    </div>
    <hr>
    @if (session('success'))
        <div class="alert alert-success" id="success-alert">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger" id="error-alert">
            {{ session('error') }}
        </div>
    @endif
    <div class="row pt-5">
        @foreach ($productos as $producto)
            <div class="col-md-3 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $producto->nombre }}</h5>
                        <hr>
                        <p class="card-text"><strong>Precio:</strong> {{ $producto->precio }}$</p>
                        <p class="card-text"><strong>Categoría:</strong> {{ $producto->categoria->nombre }}</p>
                        <p class="card-text"><strong>Stock:</strong> {{ $producto->stock }}</p>
                        <p class="card-text"><strong>Peso:</strong> {{ $producto->peso }}g</p>
                        <p class="card-text"><strong>Referencia:</strong> {{ $producto->referencia }}</p>
                            
                        @if ($producto->stock > 0)
                            <form action="{{ route('guardarCompra') }}" method="POST">
                                @csrf
                                <div class="form-group pb-3">
                                    <label for="cantidad"><strong>Cantidad:</strong></label>
                                    <input type="number" class="form-control" id="cantidad" name="cantidad" max="{{ $producto->stock }}">
                                    <input type="hidden" name="producto_id" id="producto_id" value="{{ $producto->id }}">
                                </div>
                                <button type="submit" class="btn btn-primary">Comprar</button>
                            </form>
                        @else
                            <strong style="color: brown"><p class="card-text">Producto sin stock disponible</p></strong> 
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    @if (count($productos) == 0)
        No hay productos disponibles, por favor crear productos <br>
        <a href="/productos" class="btn btn-primary mt-3">Crear producto</a>
    @endif
    <div class="pagination justify-content-center">
        {{ $productos->links() }}
    </div>

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