@extends('layouts.app')

@section('title', 'Detalles del Contacto')

@section('content')
<div class="container mt-4">
    <h1>Detalles del Contacto</h1>
    <div class="card">
        <div class="card-header">
            {{ $contacto->nombre }}
        </div>
        <div class="card-body">
            <p><strong>Teléfono:</strong> {{ $contacto->telefono }}</p>
            <p><strong>Email:</strong> {{ $contacto->email }}</p>
        </div>
    </div>

    <a href="{{ route('contactos.index') }}" class="btn btn-primary mt-3">Volver a la lista</a>
    <a href="{{ route('contactos.edit', $contacto->id) }}" class="btn btn-warning mt-3">Editar</a>
</div>
@endsection
