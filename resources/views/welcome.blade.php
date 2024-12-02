@extends('layouts.app')

@section('title', 'Bienvenido')

@section('content')
    <div class="container mt-4 text-center">
        <!-- Bienvenida -->
        <h1 class="display-4">¡Bienvenido a la Agenda de Contactos!</h1>
        <p class="lead">Aquí puedes gestionar tus contactos fácilmente.</p>
        
        <!-- Botón para ir a la lista de contactos -->
        <a href="{{ route('contactos.index') }}" class="btn btn-primary btn-lg">
            <i class="fa fa-users"></i> Ir a Contactos
        </a>
    </div>
@endsection
