@extends('layout')

@section('reportes')

    <div class="d-flex flex-column">

        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" id="stock-tab" data-bs-toggle="tab" href="#stock" role="tab" aria-controls="stock" aria-selected="true">Producto con más stock</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="ventas-tab" data-bs-toggle="tab" href="#ventas" role="tab" aria-controls="ventas" aria-selected="false">Producto más vendido</a>
            </li>
        </ul>

        <div class="tab-content pt-5">
            {{-- Tab - Producto con más stock --}}
            <div class="tab-pane fade show active" id="stock" role="tabpanel" aria-labelledby="stock-tab">
                <h3>Producto con más stock</h3>
                <table class="table">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Producto</th>
                                <th scope="col">Referencia</th>
                                <th scope="col">Stock</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mayorStock as $key => $item)
                                <tr>
                                    <td>{{ $item->nombre }} 
                                        @if ( $key == 0)
                                            <i 
                                            class="material-icons small" 
                                            style="color: #f5c242"
                                            >
                                            emoji_events
                                            </i>
                                        @else
                                            @if ($key == 1)
                                                <i 
                                                class="material-icons small" 
                                                style="color: #b4b6b9"
                                                >
                                                emoji_events
                                                </i>
                                            @else
                                                @if ($key == 2)
                                                    <i 
                                                    class="material-icons small" 
                                                    style="color: #cd7f32"
                                                    >
                                                    emoji_events
                                                    </i>
                                                @endif
                                            @endif
                                        @endif
                                    </td>
                                    <td>{{ $item->referencia }}</td>
                                    <td>{{ $item->stock }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </table>
                @if (count($mayorStock) == 0)
                    No hay productos disponibles
                @endif
                {{-- PAGINACION --}}
                <div class="pagination justify-content-center">
                    {{ $mayorStock->links() }}
                </div>
            </div>
    
            {{-- Tab - Producto más vendido --}}
            <div class="tab-pane fade" id="ventas" role="tabpanel" aria-labelledby="ventas-tab">
                <h3>Producto más vendido</h3>
                <table class="table">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Producto</th>
                            <th scope="col">Referencia</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Ganancias</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($mayorVentas as $key => $item)
                                <tr>
                                    <td>
                                        {{ $item->producto }}
                                        @if ( $key == 0)
                                        <i 
                                        class="material-icons small" 
                                        style="color: #f5c242"
                                        >
                                        emoji_events
                                        </i>
                                    @else
                                        @if ($key == 1)
                                            <i 
                                            class="material-icons small" 
                                            style="color: #b4b6b9"
                                            >
                                            emoji_events
                                            </i>
                                        @else
                                            @if ($key == 2)
                                                <i 
                                                class="material-icons small" 
                                                style="color: #cd7f32"
                                                >
                                                emoji_events
                                                </i>
                                            @endif
                                        @endif
                                    @endif
                                    </td>
                                    <td>{{ $item->referencia }}</td>
                                    <td>{{ $item->cantidad }}</td>
                                    <td>{{ $item->ganancias }}$</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </table>
                @if (count($mayorVentas) == 0)
                    No hay productos disponibles
                @endif
                {{-- PAGINACION --}}
                <div class="pagination justify-content-center">
                    {{ $mayorVentas->links() }}
                </div>
            </div>
        </div>
    
@endsection