@extends('layouts.app')
@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="mb-0"><i class="fa fa-clipboard-list"></i> Bitácora de Actividades</h3>
                <a href="{{ route('dashboard') }}" class="btn btn-outline-light btn-sm">
                    <i class="fa fa-arrow-left"></i> Volver al Dashboard
                </a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="bitacoraTable">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Usuario</th>
                        <th>Acción</th>
                        <th>Módulo</th>
                        <th>Descripción</th>
                        <th>IP</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bitacoras as $b)
                    <tr>
                        <td>{{ $b->fecha }}</td>
                        <td>{{ $b->usuario ? $b->usuario->name : $b->usuario_id }}</td>
                        <td>{{ $b->accion }}</td>
                        <td>{{ $b->modulo }}</td>
                        <td>{{ $b->descripcion }}</td>
                        <td>{{ $b->ip }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-3">
                {{ $bitacoras->links() }}
            </div>
        </div>
    </div>
</div>
<link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
        $('#bitacoraTable').DataTable({
            "order": [[0, "desc"]]
        });
    });
</script>
@endsection
