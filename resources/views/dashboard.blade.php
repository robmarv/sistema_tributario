<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Sistema Tributario El Salvador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
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
    <div class="container mt-5">
        <h1 class="mb-4">Bienvenido al Dashboard</h1>
        <p class="mb-4">Usuario: {{ Auth::user()->name }}</p>
        <div class="row row-cols-1 row-cols-md-4 g-4">
            <div class="col">
                <div class="card h-100 shadow border-0 text-center bg-gradient bg-primary text-white">
                    <div class="card-body">
                        <i class="fa-solid fa-map-location-dot fa-2x mb-3"></i>
                        <h5 class="card-title">Catastro Municipal</h5>
                        <p class="card-text">Gestión de bienes inmuebles y terrenos.</p>
                        <a href="#" class="btn btn-light btn-sm">Ir al módulo</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100 shadow border-0 text-center bg-gradient bg-success text-white">
                    <div class="card-body">
                        <i class="fa-solid fa-wallet fa-2x mb-3"></i>
                        <h5 class="card-title">Cuentas Corrientes</h5>
                        <p class="card-text">Consulta y administración de cuentas municipales.</p>
                        <a href="#" class="btn btn-light btn-sm">Ir al módulo</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100 shadow border-0 text-center bg-gradient bg-warning text-dark">
                    <div class="card-body">
                        <i class="fa-solid fa-cash-register fa-2x mb-3"></i>
                        <h5 class="card-title">Colecturía</h5>
                        <p class="card-text">Cobros, pagos y recibos municipales.</p>
                        <a href="#" class="btn btn-dark btn-sm">Ir al módulo</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100 shadow border-0 text-center bg-gradient bg-danger text-white">
                    <div class="card-body">
                        <i class="fa-solid fa-exclamation-triangle fa-2x mb-3"></i>
                        <h5 class="card-title">Gestión de Mora</h5>
                        <p class="card-text">Control y seguimiento de morosidad.</p>
                        <a href="#" class="btn btn-light btn-sm">Ir al módulo</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100 shadow border-0 text-center bg-gradient bg-info text-white">
                    <div class="card-body">
                        <i class="fa-solid fa-file-signature fa-2x mb-3"></i>
                        <h5 class="card-title">Cartas de Venta</h5>
                        <p class="card-text">Emisión y control de cartas de venta.</p>
                        <a href="#" class="btn btn-light btn-sm">Ir al módulo</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100 shadow border-0 text-center bg-gradient bg-secondary text-white">
                    <div class="card-body">
                        <i class="fa-solid fa-file-export fa-2x mb-3"></i>
                        <h5 class="card-title">Reportes y Exportaciones</h5>
                        <p class="card-text">Generación de reportes en PDF y Excel.</p>
                        <a href="#" class="btn btn-light btn-sm">Ir al módulo</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100 shadow border-0 text-center bg-gradient bg-dark text-white">
                    <div class="card-body">
                        <i class="fa-solid fa-users-cog fa-2x mb-3"></i>
                        <h5 class="card-title">Gestión de Usuarios y Roles</h5>
                        <p class="card-text">Administración de usuarios y permisos.</p>
                        <a href="#" class="btn btn-light btn-sm">Ir al módulo</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100 shadow border-0 text-center bg-gradient bg-light text-dark">
                    <div class="card-body">
                        <i class="fa-solid fa-cubes fa-2x mb-3"></i>
                        <h5 class="card-title">Módulos generales</h5>
                        <p class="card-text">Acceso a módulos y configuraciones generales.</p>
                        <a href="#" class="btn btn-primary btn-sm">Ir al módulo</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>