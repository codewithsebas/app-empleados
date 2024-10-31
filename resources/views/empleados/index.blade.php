@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex align-items-center justify-content-between">
        <h2 class="mb-4">Lista de Empleados</h2>
        <a href="{{ route('empleados.create') }}" class="btn btn-primary"><i class="fa-solid fa-user-plus"
                style="margin-right: 5px;"></i> Crear</a>
    </div>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if($errors->any())
    <div class="alert alert-danger align-items-center">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <table class="table mt-2 table-striped">
        <thead>
            <tr>
                <th><i class="fa-solid fa-user me-2"></i> Nombre</th>
                <th><i class="fa-solid fa-at me-2"></i> Email</th>
                <th><i class="fa-solid fa-venus-mars me-2"></i> Sexo</th>
                <th><i class="fa-solid fa-briefcase me-2"></i> Área</th>
                <th><i class="fa-solid fa-envelope me-2"></i> Boletín</th>
                <th>Modificar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            @if($empleados->isEmpty())
            <tr>
                <td colspan="7" class="text-center">No hay empleados registrados.</td>
            </tr>
            @else
            @foreach($empleados as $empleado)
            <tr>
                <td>{{ $empleado->nombre }}</td>
                <td>{{ $empleado->email }}</td>
                <td>{{ $empleado->sexo }}</td>
                <td>{{ $empleado->area->nombre }}</td>
                <td>{{ $empleado->boletin ? 'Sí' : 'No' }}</td>
                <td>
                    <a href="{{ route('empleados.edit', $empleado->id) }}" class="btn p-0 ms-4">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </a>
                </td>
                <td>
                    <form action="{{ route('empleados.destroy', $empleado->id) }}" method="POST"
                        style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn p-0 ms-4">
                            <i class="fa-solid fa-trash-can"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
            @endif

        </tbody>
    </table>
</div>
@endsection