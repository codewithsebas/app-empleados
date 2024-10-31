@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex align-items-center justify-content-between">
        <h2>Editar Empleado</h2>
        <a href="{{ route('empleados.index') }}" class="btn btn-light d-flex align-items-center gap-2">
            <i class="fa-solid fa-chevron-left pr-2"></i> Volver
        </a>
    </div>
    @if($errors->any())
    <div class="alert alert-primary mt-3">
        Los campos con asteriscos (*) son obligatorios
    </div>
    @endif
    <form action="{{ route('empleados.update', $empleado->id) }}" class="mt-4 d-flex flex-column gap-3" method="POST" id="empleadoForm">
        @csrf
        @method('PUT')
        <div class="form-group d-flex gap-5">
            <label for="nombre" class="mt-1 w-25">
                <b class="fw-bold d-flex justify-content-end pr-5 text-nowrap">Nombre Completo *</b>
            </label>
            <div class="container p-0">
                <input type="text" value="{{ old('nombre', $empleado->nombre) }}" name="nombre"
                    placeholder="Nombre completo del empleado" class="container form-control">
                @error('nombre')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>
        <div class="form-group d-flex gap-5">
            <label for="email" class="mt-1 w-25">
                <b class="fw-bold d-flex justify-content-end pr-5 text-nowrap">Correo Electrónico *</b>
            </label>
            <div class="container p-0">
                <input type="email" value="{{ old('email', $empleado->email) }}" name="email"
                    placeholder="Correo electrónico" class="form-control">
                @error('email')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

        </div>
        <div class="form-group d-flex gap-5">
            <label for="sexo" class="mt-1 w-25">
                <b class="fw-bold d-flex justify-content-end pr-5 text-nowrap">Sexo *</b>
            </label>

            <div class="container p-0">
                <div class="d-flex flex-column gap-1">
                    <div class="d-flex align-items-center gap-2">
                        <input type="radio" name="sexo" value="M" id="M" class="form-check-input" {{ $empleado->sexo ==
                        'M' ? 'checked' : '' }}>
                        <label for="M" class="form-check-label">Masculino</label>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <input type="radio" name="sexo" value="F" id="F" class="form-check-input" {{ $empleado->sexo ==
                        'F' ? 'checked' : '' }}>
                        <label for="F" class="form-check-label">Femenino</label>
                    </div>
                </div>

                @error('sexo')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="form-group d-flex gap-5">
            <label for="area_id" class="mt-1 w-25">
                <b class="fw-bold d-flex justify-content-end pr-5 text-nowrap">Área *</b>
            </label>
            <div class="container p-0">
                <select name="area_id" class="form-control">
                    @foreach($areas as $area)

                    <option value="{{ $area->id }}" {{ $empleado->area_id == $area->id ? 'selected' : '' }}>{{
                        $area->nombre }}</option>
                    @endforeach
                </select>
                @error('area')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

        </div>
        <div class="form-group d-flex gap-5">
            <label for="descripcion" class="mt-1 w-25">
                <b class="fw-bold d-flex justify-content-end pr-5 text-nowrap">Descripción *</b>
            </label>

            <div class="container p-0">
                <textarea name="descripcion" placeholder="Descripción de la experiencia del empleado" class="form-control">{{ old('descripcion', $empleado->descripcion) }}</textarea>
                @error('descripcion')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

        </div>
        <div class="form-group d-flex  gap-5">
            <div class="mt-1 w-25"></div>
            <div class="container p-0 d-flex gap-2">
                <input class="form-check-input" type="checkbox" name="boletin" value="1" {{ $empleado->boletin ? 'checked' : '' }} id="boletin">
                <label for="boletin">¿Desea recibir boletín?</label>
            </div>
        </div>
        <div class="form-group d-flex gap-5">
            <label class="mt-1 w-25 text-end" for="roles">
                <b class="fw-bold d-flex justify-content-end pr-5 text-nowrap">Roles *</b>
            </label>

            <div class="container p-0">

                @foreach($roles as $rol)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="roles[]"
                        value="{{ old('$rol->id', $rol->id) }}" id="rol{{ $rol->id }}" {{
                        $empleado->roles->contains($rol->id) ? 'checked' : '' }}>
                    <label class="form-check-label" for="rol{{ $rol->id }}">
                        {{ $rol->nombre }}
                    </label>
                </div>
                @endforeach
                @error('roles')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

        </div>
        <div class="form-group d-flex gap-5">
            <div class="mt-1 w-25"></div>
            <div class="container p-0">
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
        </div>

    </form>
</div>
@endsection