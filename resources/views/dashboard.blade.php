<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Sistema Tributario El Salvador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body { background: linear-gradient(135deg, #f0f2f5 0%, #e2e8f0 100%); }
        .dashboard-header { background: #1c1e4d; color: #fff; padding: 2.5rem 0 1.5rem; margin-bottom: 2rem; border-radius: 0 0 32px 32px; }
        .dashboard-header h1 { font-size: 2.7rem; font-weight: 700; }
        .dashboard-header p { font-size: 1.15rem; }
        .dashboard-cards { padding-left: 0.5rem; padding-right: 0.5rem; }
        .card { border-radius: 18px; box-shadow: 0 8px 24px rgba(0,0,0,0.10); }
        .card-body { min-height: 220px; }
        .dashboard-table-card { border-radius: 18px; box-shadow: 0 8px 24px rgba(0,0,0,0.10); margin-top: 2rem; }
        .table-responsive { padding: 1rem; }
        @media (max-width: 991px) {
            .dashboard-header h1 { font-size: 2rem; }
            .dashboard-header { padding: 1.5rem 0 1rem; }
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">Sistema Tributario</a>
            <div class="navbar-nav ms-auto">
                <form method="POST" action="{{ route('logout') }}" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-link nav-link">Cerrar Sesión</button>
                </form>
            </div>
        </div>
    </nav>
    <div class="container-fluid px-4">
        <div class="row dashboard-header text-center">
            <div class="col-12">
                <h1 class="fw-bold display-5 mb-2">Bienvenido al Sistema Tributario Municipal</h1>
                <p class="lead">Usuario: <span class="fw-semibold">{{ Auth::user()->name }}</span></p>
                <p class="mb-1">Municipio: <span class="fw-semibold">{{ Auth::user()->municipio ? ucfirst(str_replace('_', ' ', Auth::user()->municipio)) : 'No registrado' }}</span></p>
                <p class="mb-4">Distrito: <span class="fw-semibold">{{ Auth::user()->distrito ? ucfirst(str_replace('_', ' ', Auth::user()->distrito)) : 'No registrado' }}</span></p>
            </div>
        </div>
        <div class="row row-cols-1 row-cols-md-4 g-4 dashboard-cards">
            @php
                $modulos = [
                    ['key' => 'catastro', 'icon' => 'fa-map-location-dot', 'title' => 'Catastro Municipal', 'desc' => 'Gestión de bienes inmuebles y terrenos.'],
                    ['key' => 'cuentas', 'icon' => 'fa-wallet', 'title' => 'Cuentas Corrientes', 'desc' => 'Consulta y administración de cuentas municipales.'],
                    ['key' => 'colecturia', 'icon' => 'fa-cash-register', 'title' => 'Colecturía', 'desc' => 'Cobros, pagos y recibos municipales.'],
                    ['key' => 'mora', 'icon' => 'fa-exclamation-triangle', 'title' => 'Gestión de Mora', 'desc' => 'Control y seguimiento de morosidad.'],
                    ['key' => 'cartas', 'icon' => 'fa-file-signature', 'title' => 'Cartas de Venta', 'desc' => 'Emisión y control de cartas de venta.'],
                    ['key' => 'reportes', 'icon' => 'fa-file-export', 'title' => 'Reportes y Exportaciones', 'desc' => 'Generación de reportes en PDF y Excel.'],
                    ['key' => 'usuarios', 'icon' => 'fa-users-cog', 'title' => 'Gestión de Usuarios y Roles', 'desc' => 'Administración de usuarios y permisos.'],
                    ['key' => 'generales', 'icon' => 'fa-cubes', 'title' => 'Módulos generales', 'desc' => 'Acceso a módulos y configuraciones generales.'],
                    ['key' => 'bitacora', 'icon' => 'fa-clipboard-list', 'title' => 'Bitácora de Actividades', 'desc' => 'Registro de actividades y auditoría.'],
                ];
                $perfil = Auth::user()->perfil;
                $permitidos = $perfil === 'admin'
                    ? array_column($modulos, 'key')
                    : (Auth::user()->modulos
                        ? array_filter(array_map('trim', explode(',', Auth::user()->modulos)), function($v) { return $v !== '' && $v !== null; })
                        : []);
            @endphp
            @foreach ($modulos as $modulo)
                @if (in_array($modulo['key'], $permitidos))
                    <div class="col">
                        <div class="card h-100 shadow-lg border-0 text-center bg-white">
                            <div class="card-body py-4">
                                <div class="mb-3">
                                    <span class="bg-primary bg-gradient rounded-circle p-3 d-inline-block">
                                        <i class="fa-solid {{ $modulo['icon'] }} fa-2x text-white"></i>
                                    </span>
                                </div>
                                <h5 class="card-title fw-bold text-primary">{{ $modulo['title'] }}</h5>
                                <p class="card-text text-secondary small">{{ $modulo['desc'] }}</p>
                                @if ($modulo['key'] === 'bitacora')
                                    <a href="{{ route('bitacora.index') }}" class="btn btn-outline-danger btn-sm mt-2">Ver Bitácora</a>
                                @else
                                    <a href="#" class="btn btn-outline-primary btn-sm mt-2">Ir al módulo</a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
            {{-- El bloque Bitácora de Actividades ya está incluido en el array y filtrado por permisos --}}
        </div>
    </div>
</body>
</html>