@extends('layouts.app')

@section('titulo', 'Vendedores registrados - CodaCom')

@section('contenido')
<section id="lista-vendedores">
    <h2>Vendedores registrados</h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre completo</th>
                <th>CI</th>
                <th>Teléfono</th>
                <th>Negocio</th>
                <th>Tipo</th>
                <th>Stock</th>
                <th>Código verificación</th>
                <th>Estado</th>
                <th>Registrado</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($vendedores as $vendedor)
                <tr>
                    <td>{{ $vendedor->id }}</td>
                    <td>{{ $vendedor->nombre_completo }}</td>
                    <td>{{ $vendedor->ci }}</td>
                    <td>{{ $vendedor->telefono }}</td>
                    <td>{{ $vendedor->nombre_negocio }}</td>
                    <td>{{ $vendedor->tipo_producto }}</td>
                    <td>{{ $vendedor->stock }}</td>
                    <td>{{ $vendedor->codigo_verificacion }}</td>
                    <td>{{ $vendedor->estado }}</td>
                    <td>{{ $vendedor->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</section>
@endsection