@extends('layouts.app')

@section('title', 'Contactos')

@section('content')
<div class="container mt-4">
    <h1 class="text-center mb-3">Contactos</h1>

    <!-- Mensaje de éxito -->
    @if(session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif

    <!-- Encabezado: Total de contactos y botón de agregar -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">Total de contactos: {{ $contactos->count() }}</h2>
        <a href="{{ route('contactos.create') }}" class="btn btn-primary">
            <i class="fa fa-plus"></i> Agregar Contacto
        </a>
    </div>

    <!-- Tabla de contactos -->
    <div class="table-responsive">
        <table id="contactos-table" class="table table-striped table-bordered">
            <thead class="text-center">
                <tr>
                    <th>Apellido paterno</th>
                    <th>Apellido materno</th>
                    <th>Nombre</th>
                    <th>Teléfono</th>
                    <th>Email</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contactos as $contacto)
                    <tr>
                        <td>{{ $contacto->apellido_paterno }}</td>
                        <td>{{ $contacto->apellido_materno }}</td>
                        <td>{{ $contacto->nombre }}</td>
                        <td>{{ $contacto->telefono }}</td>
                        <td>{{ $contacto->email }}</td>
                        <td class="text-center">
                            <a href="{{ route('contactos.edit', $contacto->id) }}" class="btn btn-warning btn-sm">
                                <i class="fa fa-edit"></i>
                            </a>
                        </td>
                        <td class="text-center">
                            <form action="{{ route('contactos.destroy', $contacto->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este contacto?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Paginación -->
    @if ($contactos instanceof \Illuminate\Pagination\LengthAwarePaginator)
        <div class="d-flex justify-content-between align-items-center mt-3">
            <div>Mostrando {{ $contactos->firstItem() }} a {{ $contactos->lastItem() }} de {{ $contactos->total() }} entradas</div>
            <div>
                {{ $contactos->links() }}
            </div>
        </div>
    @endif
</div>

<!-- Script para DataTables -->
<script>
    $(document).ready(function() {
        $('#contactos-table').DataTable({
            "language": {
                "lengthMenu": "Mostrar _MENU_ entradas",
                "zeroRecords": "No se encontraron resultados",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ entradas",
                "infoEmpty": "Mostrando 0 a 0 de 0 entradas",
                "infoFiltered": "(filtrado de _MAX_ entradas totales)",
                "search": "Buscar:",
                "paginate": {
                    "first": "Primero",
                    "last": "Último",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            }
        });
    });
</script>
@endsection
