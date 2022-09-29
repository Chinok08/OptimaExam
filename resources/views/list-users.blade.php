<!DOCTYPE html>
<html>
<head>
    <title>Optima</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    <div class="card">
        <div class="card-header text-center font-weight-bold">
            Lista de usuarios interesados
        </div>
        <table>
            <tr>
                <th>Nombre</th>
                <th>Edad</th>
                <th>Telefono</th>
                <th>Correo</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
            <?php
            foreach ($usuarios as $usuario){?>
                <tr>
                    <td> <?php echo $usuario->nombre ?> </td>
                    <td> <?php echo $usuario->edad ?> </td>
                    <td> <?php echo $usuario->telefono ?> </td>
                    <td> <?php echo $usuario->correo ?> </td>
                    <td> <?php echo $usuario->marca ?> </td>
                    <td> <?php echo $usuario->modelo ?> </td>
                    <td>
                        <form action="{{ url('edit-user/'.$usuario->id) }}" method="get">
                            <button type="submit" class="btn"><img src="/icons/edit.png" width="25" height="25"></button>
                        </form>
                    </td>
                    <td>
                        <form action="{{ url('delete-user/'.$usuario->id) }}" method="get">
                            <button type="submit" class="btn"><img src="/icons/remove.png" width="25" height="25"></button>
                        </form>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>
</div>
</body>
</html>
