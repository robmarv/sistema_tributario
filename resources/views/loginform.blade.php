<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Inicie sesión en el Sistema Tributario del Ministerio de Hacienda de El Salvador">
    <title>Iniciar Sesión - Sistema Tributario | Ministerio de Hacienda</title>
    
    <!-- Bootstrap 5.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <!-- Google Fonts - tipografía más moderna y legible -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary:    #1c1e4d;    /* Azul oscuro institucional (aprox Pantone 281 C) */
            --primary-dark:#14163a;
            --accent:     #c9a892;    /* Color secundario del manual de marca gov */
            --gray-dark:  #313945;
            --light-bg:   #f8f9fa;
        }

        body {
            font-family: 'Roboto', system-ui, -apple-system, sans-serif;
            background: linear-gradient(135deg, #f0f2f5 0%, #e2e8f0 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
        }

        .login-container {
            max-width: 420px;
            width: 100%;
            margin: 1.5rem auto;
        }

        .card {
            border: none;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.12);
            transition: transform 0.25s ease;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card-header {
            background: var(--primary);
            color: white;
            text-align: center;
            padding: 2rem 1.5rem 1.5rem;
            border-bottom: none;
        }

        .card-header h1 {
            font-size: 1.75rem;
            font-weight: 700;
            margin-bottom: 0.35rem;
        }

        .card-header .subtitle {
            font-size: 0.95rem;
            opacity: 0.9;
            margin: 0;
        }

        .logo-container {
            width: 140px;
            margin: 0 auto 1.25rem;
        }

        .logo-container img {
            width: 100%;
            height: auto;
        }

        .card-body {
            padding: 2rem 2.25rem;
        }

        .form-label {
            font-weight: 500;
            color: var(--gray-dark);
        }

        .form-control {
            border-radius: 10px;
            padding: 0.75rem 1.1rem;
            border: 1px solid #ced4da;
            transition: all 0.2s;
        }

        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 0.25rem rgba(28,30,77,0.15);
        }

        .btn-primary {
            background: var(--primary);
            border: none;
            border-radius: 10px;
            padding: 0.75rem 1.5rem;
            font-weight: 500;
            font-size: 1.05rem;
            transition: all 0.25s;
        }

        .btn-primary:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
        }

        .alert {
            border-radius: 10px;
            margin-bottom: 1.5rem;
        }

        .text-muted-small {
            font-size: 0.85rem;
            color: #6c757d;
        }

        .links-footer {
            text-align: center;
            margin-top: 1.5rem;
            font-size: 0.9rem;
        }

        .links-footer a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 500;
        }

        .links-footer a:hover {
            text-decoration: underline;
        }

        @media (max-width: 576px) {
            .card-body { padding: 1.75rem 1.5rem; }
        }
    </style>
</head>
<body>

    <div class="login-container">
        <div class="card">
            <div class="card-header">
                <!-- Idealmente descarga el logo oficial y colócalo en tu proyecto -->
                <!-- Puedes buscar "logo Ministerio de Hacienda El Salvador" y usar la versión PNG oficial -->
               
                <h1>Iniciar Sesión</h1>
                <p class="subtitle">Sistema Tributario – Ministerio de Hacienda</p>
            </div>

            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error:</strong>
                        <ul class="mb-0 mt-1 ps-3">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="email" class="form-label">Correo electrónico</label>
                        <input type="email" 
                               class="form-control" 
                               id="email" 
                               name="email" 
                               value="{{ old('email') }}" 
                               required 
                               autocomplete="email"
                               autofocus>
                    </div>

                    <div class="mb-4">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" 
                               class="form-control" 
                               id="password" 
                               name="password" 
                               required 
                               autocomplete="current-password">
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-lg">
                            Iniciar Sesión
                        </button>
                    </div>
                </form>

                <div class="links-footer mt-4">
                    <a href="#">¿Olvidó su contraseña?</a>
                    <span class="mx-2">•</span>
                    <a href="#">Soporte técnico</a>
                </div>

                <div class="text-center mt-4 text-muted-small">
                    © {{ date('Y') }} Ministerio de Hacienda – República de El Salvador
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (para alert dismissible) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>