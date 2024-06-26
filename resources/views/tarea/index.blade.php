<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Tareas</title>

    <!-- Bootstrap CSS v5.3.2 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            max-width: 800px;
            margin: 30px auto;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            border-radius: 10px;
            background-color: #fff;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .title {
            margin: 0;
            font-size: 28px;
        }
        .login-register-btns {
            text-align: right;
        }
        .task-form {
            margin-bottom: 20px;
        }
        .table {
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            border-radius: 10px;
        }
        .table th, .table td {
            vertical-align: middle;
        }
        .table-actions {
            text-align: center;
        }
        .action-btn {
            margin: 0 5px;
            padding: 8px 12px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2 class="title">Lista de Tareas</h2>
            <div class="login-register-btns">
                @auth
                    <span class="me-2">Hola, {{ Auth::user()->name }}</span>
                    <a href="{{ route('profile.show') }}" class="btn btn-outline-secondary me-2 action-btn">Perfil</a>
                    <form method="POST" action="{{ route('logout') }}" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger action-btn">Cerrar sesión</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="btn btn-outline-primary me-2 action-btn">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-outline-success action-btn">Registro</a>
                @endauth
            </div>
        </div>

        <form action="{{ route('tareas.store') }}" method="POST" class="task-form">
            @csrf
            <div class="input-group">
                <input type="text" class="form-control" id="title" name="title" placeholder="Escribe una nueva tarea...">
                <button type="submit" class="btn btn-primary">Agregar</button>
            </div>
        </form>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Tarea</th>
                        <th scope="col" style="width: 120px;">Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($titles as $title)
                    <tr>
                        <td>{{ $title->title }}</td>
                        <td class="table-actions">
                            <a href="{{ route('tareas.edit', $title->id) }}" class="btn btn-primary btn-sm action-btn" data-toggle="tooltip" data-placement="top" title="Editar tarea"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('tareas.destroy', $title->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm action-btn" data-toggle="tooltip" data-placement="top" title="Eliminar tarea"><i class="fas fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
    <!-- Font Awesome Icons -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>

    <!-- Initialize tooltips -->
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</body>
</html>
