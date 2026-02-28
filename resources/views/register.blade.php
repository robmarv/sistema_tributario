<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario - Sistema Tributario El Salvador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mb-4">
                    <div class="card-header">
                        <h3>Registrar Usuario</h3>
                    </div>
                    <div class="card-body">
                        <form id="registerForm" method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="name" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Correo Electrónico</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="dui" class="form-label">DUI</label>
                                    <input type="text" class="form-control" id="dui" name="dui" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="nit" class="form-label">NIT</label>
                                    <input type="text" class="form-control" id="nit" name="nit" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
                                    <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="telefono" class="form-label">Teléfono</label>
                                    <input type="text" class="form-control" id="telefono" name="telefono">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="direccion" class="form-label">Dirección</label>
                                <textarea class="form-control" id="direccion" name="direccion" rows="2"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="tipo_contribuyente" class="form-label">Tipo de Contribuyente</label>
                                <select class="form-select" id="tipo_contribuyente" name="tipo_contribuyente" required>
                                    <option value="persona_natural">Persona Natural</option>
                                    <option value="persona_juridica">Persona Jurídica</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Contraseña</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <button type="submit" class="btn btn-success">Registrar</button>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h3>Administrar Usuarios</h3>
                    </div>
                    <div class="card-body">
                        <table id="usersTable" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Email</th>
                                    <th>DUI</th>
                                    <th>NIT</th>
                                    <th>Teléfono</th>
                                    <th>Tipo</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->dui }}</td>
                                    <td>{{ $user->nit }}</td>
                                    <td>{{ $user->telefono }}</td>
                                    <td>{{ $user->tipo_contribuyente }}</td>
                                    <td>
                                        <button class="btn btn-danger btn-sm" onclick="deleteUser({{ $user->id }})">Eliminar</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#usersTable').DataTable();

            $('#registerForm').on('submit', function(e) {
                // Evita submit inmediato
                e.preventDefault();
                var form = this;
                $.post($(form).attr('action'), $(form).serialize())
                    .done(function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Usuario registrado',
                            text: 'El usuario ha sido registrado exitosamente.'
                        }).then(() => {
                            window.location.reload();
                        });
                    })
                    .fail(function(xhr) {
                        if (xhr.status === 422 && xhr.responseJSON && xhr.responseJSON.errors) {
                            let errors = Object.values(xhr.responseJSON.errors).flat().join('\n');
                            Swal.fire({
                                icon: 'error',
                                title: 'Error de validación',
                                text: errors
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'No se pudo registrar el usuario.'
                            });
                        }
                    });
            });

        });

        function deleteUser(id) {
            Swal.fire({
                title: '¿Estás seguro?',
                text: 'Esta acción no se puede deshacer.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.post('/users/' + id + '/delete', {_token: '{{ csrf_token() }}'})
                        .done(function(response) {
                            Swal.fire('Eliminado', 'El usuario ha sido eliminado.', 'success').then(() => {
                                window.location.reload();
                            });
                        })
                        .fail(function() {
                            Swal.fire('Error', 'No se pudo eliminar el usuario.', 'error');
                        });
                }
            });
        }
    </script>
</body>
</html>