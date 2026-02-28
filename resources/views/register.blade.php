<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Registro de Usuario - Sistema Tributario El Salvador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body { background: linear-gradient(135deg, #f0f2f5 0%, #e2e8f0 100%); }
        .card { border-radius: 16px; box-shadow: 0 8px 24px rgba(0,0,0,0.10); }
        .card-header { background: #1c1e4d; color: #fff; border-radius: 16px 16px 0 0; }
        .form-label { font-weight: 500; color: #1c1e4d; }
        .form-control, .form-select { border-radius: 10px; }
        .btn-success { background: #1c1e4d; border: none; border-radius: 10px; font-weight: 500; }
        .btn-success:hover { background: #14163a; }
        .table-striped > tbody > tr:nth-of-type(odd) { background-color: #f8f9fa; }
        .table th, .table td { vertical-align: middle; }
        .btn-edit { background: #ffc107; color: #1c1e4d; border-radius: 8px; font-weight: 500; }
        .btn-edit:hover { background: #e0a800; color: #fff; }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10">
                <div class="card mb-4">
                    <div class="card-header">
                        <h3>Registrar Usuario</h3>
                    </div>
                    <div class="card-body">
                        <form id="registerForm" method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="name" class="form-label"><i class="fa fa-user"></i> Nombre</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="email" class="form-label"><i class="fa fa-envelope"></i> Correo Electrónico</label>
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
                                    <label for="municipio" class="form-label">Municipio</label>
                                    <select class="form-select" id="municipio" name="municipio" required>
                                        <option value="">Seleccione el municipio</option>
                                        <option value="onchagua">Onchagua</option>
                                        <option value="el_carmen">El Carmen</option>
                                        <option value="intipuca">Intipucá</option>
                                        <option value="la_union">La Unión</option>
                                        <option value="meanguera_del_golfo">Meanguera del Golfo</option>
                                        <option value="san_alejo">San Alejo</option>
                                        <option value="yayantique">Yayantique</option>
                                        <option value="yucuaitin">Yucuaitin</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="distrito" class="form-label">Distrito</label>
                                    <select class="form-select" id="distrito" name="distrito" required>
                                        <option value="">Seleccione el distrito</option>
                                        <option value="onchagua">Onchagua</option>
                                        <option value="el_carmen">El Carmen</option>
                                        <option value="intipuca">Intipucá</option>
                                        <option value="la_union">La Unión</option>
                                        <option value="meanguera_del_golfo">Meanguera del Golfo</option>
                                        <option value="san_alejo">San Alejo</option>
                                        <option value="yayantique">Yayantique</option>
                                        <option value="yucuaitin">Yucuaitin</option>
                                    </select>
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
                            <div class="mb-3">
                                <label for="perfil" class="form-label">Perfil</label>
                                <select class="form-select" id="perfil" name="perfil" required>
                                    <option value="usuario">Usuario</option>
                                    <option value="admin">Administrador</option>
                                    <option value="colecturia">Colecturía</option>
                                    <option value="catastro">Catastro</option>
                                    <option value="reportes">Reportes</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="modulos" class="form-label">Módulos permitidos</label>
                                <select class="form-select" id="modulos" name="modulos[]" multiple>
                                    <option value="catastro">Catastro Municipal</option>
                                    <option value="cuentas">Cuentas Corrientes</option>
                                    <option value="colecturia">Colecturía</option>
                                    <option value="mora">Gestión de Mora</option>
                                    <option value="cartas">Cartas de Venta</option>
                                    <option value="reportes">Reportes y Exportaciones</option>
                                    <option value="usuarios">Gestión de Usuarios y Roles</option>
                                    <option value="generales">Módulos generales</option>
                                    <option value="bitacora">Bitácora de Actividades</option>
                                </select>
                                <small class="text-muted">Solo para perfiles distintos de administrador</small>
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
                                        <button class="btn btn-edit btn-sm" onclick="editUser({{ $user->id }})"><i class="fa fa-edit"></i> Editar</button>
                                        <button class="btn btn-danger btn-sm" onclick="deleteUser({{ $user->id }})"><i class="fa fa-trash"></i> Eliminar</button>
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

    <!-- Modal de edición de usuario fuera de la card -->
    <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editUserModalLabel">Editar Usuario</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
          </div>
          <div class="modal-body">
            <form id="editUserForm">
              <input type="hidden" id="edit_id" name="id">
              <div class="row mb-3">
                <div class="col-md-6">
                  <label for="edit_name" class="form-label">Nombre</label>
                  <input type="text" class="form-control" id="edit_name" name="name" required>
                </div>
                <div class="col-md-6">
                  <label for="edit_email" class="form-label">Correo Electrónico</label>
                  <input type="email" class="form-control" id="edit_email" name="email" required>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-md-6">
                  <label for="edit_dui" class="form-label">DUI</label>
                  <input type="text" class="form-control" id="edit_dui" name="dui" required>
                </div>
                <div class="col-md-6">
                  <label for="edit_nit" class="form-label">NIT</label>
                  <input type="text" class="form-control" id="edit_nit" name="nit" required>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-md-6">
                  <label for="edit_fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
                  <input type="date" class="form-control" id="edit_fecha_nacimiento" name="fecha_nacimiento" required>
                </div>
                <div class="col-md-6">
                  <label for="edit_municipio" class="form-label">Municipio</label>
                  <select class="form-select" id="edit_municipio" name="municipio" required>
                    <option value="onchagua">Onchagua</option>
                    <option value="el_carmen">El Carmen</option>
                    <option value="intipuca">Intipucá</option>
                    <option value="la_union">La Unión</option>
                    <option value="meanguera_del_golfo">Meanguera del Golfo</option>
                    <option value="san_alejo">San Alejo</option>
                    <option value="yayantique">Yayantique</option>
                    <option value="yucuaitin">Yucuaitin</option>
                  </select>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-md-6">
                  <label for="edit_distrito" class="form-label">Distrito</label>
                  <select class="form-select" id="edit_distrito" name="distrito" required>
                    <option value="onchagua">Onchagua</option>
                    <option value="el_carmen">El Carmen</option>
                    <option value="intipuca">Intipucá</option>
                    <option value="la_union">La Unión</option>
                    <option value="meanguera_del_golfo">Meanguera del Golfo</option>
                    <option value="san_alejo">San Alejo</option>
                    <option value="yayantique">Yayantique</option>
                    <option value="yucuaitin">Yucuaitin</option>
                  </select>
                </div>
                <div class="col-md-6">
                  <label for="edit_telefono" class="form-label">Teléfono</label>
                  <input type="text" class="form-control" id="edit_telefono" name="telefono">
                </div>
              </div>
              <div class="mb-3">
                <label for="edit_direccion" class="form-label">Dirección</label>
                <textarea class="form-control" id="edit_direccion" name="direccion" rows="2"></textarea>
              </div>
              <div class="mb-3">
                <label for="edit_tipo_contribuyente" class="form-label">Tipo de Contribuyente</label>
                <select class="form-select" id="edit_tipo_contribuyente" name="tipo_contribuyente" required>
                  <option value="persona_natural">Persona Natural</option>
                  <option value="persona_juridica">Persona Jurídica</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="edit_perfil" class="form-label">Perfil</label>
                <select class="form-select" id="edit_perfil" name="perfil" required>
                  <option value="usuario">Usuario</option>
                  <option value="admin">Administrador</option>
                  <option value="colecturia">Colecturía</option>
                  <option value="catastro">Catastro</option>
                  <option value="reportes">Reportes</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="edit_modulos" class="form-label">Módulos permitidos</label>
                <select class="form-select" id="edit_modulos" name="modulos[]" multiple>
                  <option value="catastro">Catastro Municipal</option>
                  <option value="cuentas">Cuentas Corrientes</option>
                  <option value="colecturia">Colecturía</option>
                  <option value="mora">Gestión de Mora</option>
                  <option value="cartas">Cartas de Venta</option>
                  <option value="reportes">Reportes y Exportaciones</option>
                  <option value="usuarios">Gestión de Usuarios y Roles</option>
                  <option value="generales">Módulos generales</option>
                  <option value="bitacora">Bitácora de Actividades</option>
                </select>
                <small class="text-muted">Solo para perfiles distintos de administrador</small>
              </div>
              <button type="submit" class="btn btn-success">Guardar cambios</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Función para eliminar usuario con confirmación -->
    <script>
        window.deleteUser = function(id) {
            Swal.fire({
                title: '¿Estás seguro?',
                text: 'Esta acción eliminará el usuario de forma permanente.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/users/' + id + '/delete',
                        type: 'POST',
                        data: {
                            _token: $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Usuario eliminado',
                                text: 'El usuario ha sido eliminado correctamente.'
                            }).then(() => {
                                window.location.reload();
                            });
                        },
                        error: function(xhr) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: xhr.responseText || 'No se pudo eliminar el usuario.'
                            });
                        }
                    });
                }
            });
        };
    </script>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#usersTable').DataTable();

            // Restringir selección de Bitácora según perfil
            function toggleBitacoraOption(perfilSelector, modulosSelector) {
                var perfil = $(perfilSelector).val();
                if (perfil === 'admin' || perfil === 'colecturia') {
                    $(modulosSelector + ' option[value="bitacora"]').prop('disabled', false).show();
                } else {
                    $(modulosSelector + ' option[value="bitacora"]').prop('disabled', true).hide();
                    // Si está seleccionada, quitarla
                    var selected = $(modulosSelector).val() || [];
                    var filtered = selected.filter(function(val) { return val !== 'bitacora'; });
                    $(modulosSelector).val(filtered);
                }
            }

            // Registro
            $('#perfil').on('change', function() {
                toggleBitacoraOption('#perfil', '#modulos');
            });
            toggleBitacoraOption('#perfil', '#modulos');

            // Edición
            $('#edit_perfil').on('change', function() {
                toggleBitacoraOption('#edit_perfil', '#edit_modulos');
            });
            toggleBitacoraOption('#edit_perfil', '#edit_modulos');

            $('#registerForm').on('submit', function(e) {
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

            // Editar usuario: abrir modal y cargar datos
            window.editUser = function(id) {
                $.get('/users/' + id, function(user) {
                    $('#edit_id').val(user.id);
                    $('#edit_name').val(user.name);
                    $('#edit_email').val(user.email);
                    $('#edit_dui').val(user.dui);
                    $('#edit_nit').val(user.nit);
                    $('#edit_fecha_nacimiento').val(user.fecha_nacimiento);
                    $('#edit_municipio').val(user.municipio);
                    $('#edit_distrito').val(user.distrito);
                    $('#edit_telefono').val(user.telefono);
                    $('#edit_direccion').val(user.direccion);
                    $('#edit_tipo_contribuyente').val(user.tipo_contribuyente);
                    $('#edit_perfil').val(user.perfil);
                    if (user.modulos) {
                        let mods = user.modulos.split(',');
                        $('#edit_modulos').val(mods);
                    } else {
                        $('#edit_modulos').val([]);
                    }
                    toggleBitacoraOption('#edit_perfil', '#edit_modulos');
                    var modalEl = document.getElementById('editUserModal');
                    if (modalEl) {
                        var modal = bootstrap.Modal.getOrCreateInstance(modalEl);
                        modal.show();
                    }
                });
            };

            // Guardar cambios de usuario
            $('#editUserForm').on('submit', function(e) {
                e.preventDefault();
                var id = $('#edit_id').val();
                var data = $(this).serialize();
                // Agregar el token CSRF manualmente
                data += '&_token=' + $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: '/users/' + id,
                    type: 'POST', // Laravel acepta POST con _method=PUT
                    data: data + '&_method=PUT',
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Usuario actualizado',
                            text: 'Los datos del usuario han sido actualizados.'
                        }).then(() => {
                            window.location.reload();
                        });
                    },
                    error: function(xhr) {
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
                                text: xhr.responseText || 'No se pudo actualizar el usuario.'
                            });
                        }
                    }
                });
            });
        });
    </script>
</body>
</html>