@extends('layouts.app')

@section('title', 'Editar Contacto')

@section('content')
<div class="container mt-4">
    <h1>Editar Contacto</h1>

    <form action="{{ route('contactos.update', $contacto->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $contacto->nombre }}" required>
        </div>
        <div class="mb-3">
            <label for="telefono" class="form-label">Teléfono</label>
            <input type="text" class="form-control" id="telefono" name="telefono" value="{{ $contacto->telefono }}">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $contacto->email }}">
        </div>
        <button type="submit" class="btn btn-success">Actualizar</button>
    </form>

    <a href="{{ route('contactos.index') }}" class="btn btn-primary mt-3">Volver a la lista</a>
</div>
@endsection
