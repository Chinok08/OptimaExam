<!DOCTYPE html>
<html>
<head>
    <title>Optima</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    @if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif
    <div class="card">
        <div class="card-header text-center font-weight-bold">
            <?= ($usuario->id == '') ? "Registro para solicitud de informacion" : "Actualizar informacion de solicitud"  ?>
        </div>
        <div class="card-body">
            <form name="add-user" id="add-user" method="post" action="{{url('user-form')}}">
                <span Style="Display:none;">
                    <div class="form-group">
                    <input type="text" id="id" name="id" class="form-control" required="" value= <?= ($usuario->id == '') ? "0" :  $usuario->id ?> >
                </div>
                </span>

                <div class="form-group">
                    <label for="exampleInputEmail1">Nombre</label>
                    <input type="text" id="nombre" name="nombre" class="form-control" required="" value= <?php echo $usuario->nombre ?> >
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Edad</label>
                    <input type="text" id="edad" name="edad" class="form-control" required="" value= <?php echo $usuario->edad ?>>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Telefono</label>
                    <input type="text" id="telefono" name="telefono" class="form-control" required="" value= <?php echo $usuario->telefono ?>>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Correo</label>
                    <input type="text" id="correo" name="correo" class="form-control" required="" value= <?php echo $usuario->correo ?>>
                </div>
                <div class="form-group">
                    <select class="form-group" id="marca" name="marca">
                        <option value="">- Seleccione Modelo-</option>
                        <?php
                        foreach($marcas as $marca) {
                        ?>
                            <option value="<?php echo $marca->id; ?>"><?php echo $marca->nombre; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <select  class="form-group" name="modelo" id="modelo">
                    </select>
                </div>
                <button type="submit" class="btn btn-primary"> <?= ($usuario->id == '') ? "Enviar" : "Actualizar"  ?> </button>
            </form>
        </div>
    </div>
</div>
</body>
</html>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function () {
        var modelo = document.getElementById("modelo");

        $('#marca').change(function (){
            var marca = $(this).val();
            var url = 'http://127.0.0.1:8000/list-models/'+marca;
            $.ajax({
                data: {marca:marca},
                datatype: 'html',
                type: 'GET',
                url: url,

            }).done(function (data){

                for (var i = modelo.options.length; i >= 0; i--) {
                    modelo.remove(i);
                }

                var aTag = document.createElement('option');
                aTag.setAttribute('value',0);
                aTag.innerHTML = 'Selecciona una opcion';
                modelo.appendChild(aTag);

                for(var i=0;i<=data.length;i++){
                    var aTag = document.createElement('option');
                    aTag.setAttribute('value',data[i].id);
                    aTag.innerHTML = data[i].nombre;
                    modelo.appendChild(aTag);
                }
            });
        });
    });
</script>
