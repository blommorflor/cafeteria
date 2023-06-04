@extends('layout')

@section('categorias')
    <div>
        <h3>Categorias</h3>
    </div>
    <div class="pt-3">
        <table class="table">
            <thead>
                <tr>
                <th scope="col">Nombre</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categorias as $categoria )
                    <tr>
                        <td>{{ $categoria->nombre }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection