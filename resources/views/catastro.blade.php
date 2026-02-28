<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catastro Municipal - Sistema Tributario</title>
    
    <!-- Bootstrap & FontAwesome (Mismos recursos que el dashboard) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    
    <style>
        /* Estilos base heredados del proyecto */
        body { background: linear-gradient(135deg, #f0f2f5 0%, #e2e8f0 100%); font-family: system-ui, -apple-system, sans-serif; }
        
        /* Header del módulo con el color institucional */
        .module-header { background: #1c1e4d; color: #fff; padding: 2rem 0; margin-bottom: 2rem; border-radius: 0 0 32px 32px; }
        
        /* Tarjetas con diseño limpio */
        .card { border-radius: 16px; box-shadow: 0 8px 24px rgba(0,0,0,0.08); border: none; transition: transform 0.2s; }
        .stat-card:hover { transform: translateY(-5px); }
        
        /* Iconos y colores de estado */
        .icon-box { width: 48px; height: 48px; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 1.25rem; }
        .bg-primary-soft { background-color: rgba(28, 30, 77, 0.1); color: #1c1e4d; }
        .bg-success-soft { background-color: rgba(25, 135, 84, 0.1); color: #198754; }
        .bg-warning-soft { background-color: rgba(255, 193, 7, 0.1); color: #ffc107; }
        
        /* Botones personalizados */
        .btn-primary-custom { background-color: #1c1e4d; border-color: #1c1e4d; color: white; }
        .btn-primary-custom:hover { background-color: #14163a; border-color: #14163a; color: white; }
        
        /* Tabla */
        .table th { font-weight: 600; color: #6c757d; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px; }
        .badge-soft { padding: 0.5em 0.8em; border-radius: 6px; font-weight: 500; }
    </style>
</head>
<body>
    <!-- Navbar simplificado para navegación rápida -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ url('/dashboard') }}" style="color: #1c1e4d;">
                <i class="fa-solid fa-building-columns me-2"></i>Sistema Tributario
            </a>
            <div class="d-flex gap-2">
                <a href="{{ url('/dashboard') }}" class="btn btn-outline-secondary btn-sm">
                    <i class="fa-solid fa-arrow-left me-1"></i> Volver al Dashboard
                </a>
            </div>
        </div>
    </nav>

    <!-- Encabezado del Módulo -->
    <div class="container-fluid px-0">
        <div class="module-header text-center">
            <h1 class="fw-bold display-6 mb-2">Catastro Municipal</h1>
            <p class="lead mb-0 opacity-75">Gestión de Inmuebles, Propietarios y Valuaciones</p>
        </div>
    </div>

    <div class="container mb-5">
        <!-- Tarjetas de Resumen (KPIs) -->
        <div class="row g-4 mb-4">
            <div class="col-md-4">
                <div class="card stat-card h-100">
                    <div class="card-body d-flex align-items-center">
                        <div class="icon-box bg-primary-soft me-3">
                            <i class="fa-solid fa-house-chimney"></i>
                        </div>
                        <div>
                            <h6 class="text-muted mb-1">Total Inmuebles</h6>
                            <h4 class="fw-bold mb-0">1,245</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card stat-card h-100">
                    <div class="card-body d-flex align-items-center">
                        <div class="icon-box bg-success-soft me-3">
                            <i class="fa-solid fa-money-bill-trend-up"></i>
                        </div>
                        <div>
                            <h6 class="text-muted mb-1">Recaudación Mes</h6>
                            <h4 class="fw-bold mb-0">$45,230.00</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card stat-card h-100">
                    <div class="card-body d-flex align-items-center">
                        <div class="icon-box bg-warning-soft me-3">
                            <i class="fa-solid fa-file-circle-exclamation"></i>
                        </div>
                        <div>
                            <h6 class="text-muted mb-1">Trámites Pendientes</h6>
                            <h4 class="fw-bold mb-0">28</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Barra de Herramientas y Filtros -->
        <div class="card mb-4">
            <div class="card-body p-3">
                <div class="row g-3 align-items-center">
                    <div class="col-md-4">
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0"><i class="fa fa-search text-muted"></i></span>
                            <input type="text" class="form-control bg-light border-start-0" placeholder="Buscar por clave, propietario o dirección...">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <select class="form-select bg-light">
                            <option value="">Filtrar por Zona</option>
                            <option value="urbana">Zona Urbana</option>
                            <option value="rural">Zona Rural</option>
                            <option value="comercial">Zona Comercial</option>
                        </select>
                    </div>
                    <div class="col-md-5 text-md-end">
                        <button class="btn btn-primary-custom"><i class="fa fa-plus me-2"></i>Nuevo Inmueble</button>
                        <button class="btn btn-outline-dark ms-2"><i class="fa fa-print me-2"></i>Reporte</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabla de Datos -->
        <div class="card">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th class="ps-4 py-3">Clave Catastral</th>
                                <th class="py-3">Propietario</th>
                                <th class="py-3">Ubicación</th>
                                <th class="py-3">Tipo</th>
                                <th class="py-3">Avalúo</th>
                                <th class="py-3">Estado</th>
                                <th class="text-end pe-4 py-3">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Ejemplo de Fila 1 -->
                            <tr>
                                <td class="ps-4 fw-semibold text-primary">101-002-0345</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar rounded-circle bg-light text-dark d-flex align-items-center justify-content-center me-2" style="width:35px;height:35px;font-size:0.8rem;">JP</div>
                                        <div>
                                            <div class="fw-medium">Juan Pérez</div>
                                            <div class="small text-muted">DUI: 02345678-9</div>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="d-inline-block text-truncate" style="max-width: 200px;">Barrio El Centro, Av. Libertad #12</span></td>
                                <td><span class="badge bg-light text-dark border">Urbano</span></td>
                                <td>$125,000.00</td>
                                <td><span class="badge bg-success-soft badge-soft">Solvente</span></td>
                                <td class="text-end pe-4">
                                    <div class="btn-group">
                                        <button class="btn btn-sm btn-light" title="Ver Detalle"><i class="fa fa-eye"></i></button>
                                        <button class="btn btn-sm btn-light" title="Editar"><i class="fa fa-pen"></i></button>
                                        <button class="btn btn-sm btn-light text-danger" title="Generar Cobro"><i class="fa fa-file-invoice-dollar"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <!-- Aquí irían más filas dinámicas -->
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer bg-white py-3">
                <small class="text-muted">Mostrando 1 a 10 de 1,245 registros</small>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>