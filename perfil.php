<?php
require 'app.php';

use App\Usuarios;
$usuariosBD = Usuarios::find(44);

use App\Clientes;
$clientesBD = Clientes::find(2);
$bandera = false;
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Perfil</title>
  <link rel="icon" href="img/favicon.jpg" type="image/jpg" sizes="32x32">
  <link rel="stylesheet" href="css/all.css" />
  <link rel="stylesheet" href="css/bootstrap.css" />
  <link rel="stylesheet" href="css/styles.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>

  <?php include 'components/menu.php' ?>
  <div class="fondo-encabezados py-2 mb-4">
    <div class="container">
      <div class="">
        <h1 class="fs-3 my-4">Perfil del cliente</h1>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-lg-3">
        <div class="list-group" id="v-pills-tab" role="tablist" aria-orientation="vertical">
          <button type="button" class="list-group-item list-group-item-action active" aria-current="true" id="v-pills-direccion-tab" data-bs-toggle="pill" data-bs-target="#v-pills-direccion" role="tab" aria-controls="v-pills-direccion" aria-selected="true">Mi dirección</button>
          <button type="button" class="list-group-item list-group-item-action" id="v-pills-configuracion-tab" data-bs-toggle="pill" data-bs-target="#v-pills-configuracion" role="tab" aria-controls="v-pills-seguridad" aria-selected="false">Configuración</button>
          <button type="button" class="list-group-item list-group-item-action" id="v-pills-cuenta-tab" data-bs-toggle="pill" data-bs-target="#v-pills-cuenta" type="button" role="tab" aria-controls="v-pills-cuenta" aria-selected="false">Cuenta</button>
        </div>
      </div>
      <div class="col-lg-9">
        <div id="messages"></div>
        <div class="card">
          <div class="card-body">
            <div class="tab-content" id="v-pills-tabContent">
              <div class="tab-pane fade show active" id="v-pills-direccion" role="tabpanel" aria-labelledby="v-pills-direccion-tab">
                <?php foreach ($clientesBD as $clienteView) : ?>
                  <form class="row g-3" id="formPerfil" method="post" action="cliente/actualizar.php" enctype="multipart/form-data">
                    <input type="hidden" class="form-control" id="inputIdClientes" name="aCliente[idclientes]" value="<?php echo $clienteView->idclientes; ?>">
                    <input type="hidden" class="form-control" id="inputIdUsuarios" name="aCliente[usuarios_idusuarios]" value="<?php echo $clienteView->usuarios_idusuarios; ?>">
                    <div class="col-12">
                      <label for="inputAddress" class="form-label">Dirección</label>
                      <input type="text" class="form-control" id="inputAddress" name="aCliente[direccion]" value="<?php echo $clienteView->direccion; ?>">
                    </div>
                    <div class="col-12">
                      <label for="inpuColonia" class="form-label">Colonia</label>
                      <input type="text" class="form-control" id="inputColonia" name="aCliente[colonia]" value="<?php echo $clienteView->colonia; ?>">
                    </div>
                    <div class="col-md-6">
                      <label for="inputCity" class="form-label">Ciudad</label>
                      <input type="text" class="form-control" id="inputCity" name="aCliente[ciudad]" value="<?php echo $clienteView->ciudad; ?>">
                    </div>
                    <div class="col-md-4">
                      <label for="inputState" class="form-label">Estado</label>
                      <select id="inputState" name="aCliente[estado]" class="form-select">
                        <option selected>Selecciona</option>
                        <option>Yucatan</option>
                        <option>Campeche</option>
                      </select>
                    </div>
                    <div class="col-md-2">
                      <label for="inputZip" class="form-label">Código Postal</label>
                      <input type="text" class="form-control" id="inputZip" name="aCliente[cp]" value="<?php echo $clienteView->cp; ?>">
                    </div>
                    <div class="col-12">
                      <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary btn-lg">Guadar</button>
                      </div>
                    </div>
                  </form>
                  <?php $bandera = 1; ?>
                <?php endforeach ?>

                <?php if (!$bandera) { ?>

                  <form class="row g-3" id="formPerfil" method="post" action="cliente/crear.php" enctype="multipart/form-data">
                    <?php foreach ($usuariosBD as $usuarioView) : ?>
                      <input type="text" class="form-control" id="inputId" name="aCliente[usuarios_idusuarios]" value="<?php echo $usuarioView->idusuarios; ?>">
                    <?php endforeach ?>
                    <div class="col-12">
                      <label for="inputAddress" class="form-label">Dirección</label>
                      <input type="text" class="form-control" id="inputAddress" name="aCliente[direccion]">
                    </div>
                    <div class="col-12">
                      <label for="inpuColonia" class="form-label">Colonia</label>
                      <input type="text" class="form-control" id="inputColonia" name="aCliente[colonia]">
                    </div>
                    <div class="col-md-6">
                      <label for="inputCity" class="form-label">Ciudad</label>
                      <input type="text" class="form-control" id="inputCity" name="aCliente[ciudad]">
                    </div>
                    <div class="col-md-4">
                      <label for="inputState" class="form-label">Estado</label>
                      <select id="inputState" name="aCliente[estado]" class="form-select">
                        <option selected>Selecciona</option>
                        <option>Yucatan</option>
                        <option>Campeche</option>
                      </select>
                    </div>
                    <div class="col-md-2">
                      <label for="inputZip" class="form-label">Código Postal</label>
                      <input type="text" class="form-control" id="inputZip" name="aCliente[cp]">
                    </div>
                    <div class="col-12">
                      <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary btn-lg">Guadar</button>
                      </div>
                    </div>
                  </form>


                <?php } ?>



              </div>
              <div class="tab-pane fade" id="v-pills-configuracion" role="tabpanel" aria-labelledby="v-pills-configuracion-tab">
                <form>
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Correo elctrónico</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text"><i class="fas fa-info-circle me-1"></i> Nunca compartiremos su correo electrónico con nadie más.</div>
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Cambiar Contraseña</label>
                    <input type="password" class="form-control" id="exampleInputPassword1">
                  </div>

                  <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary btn-lg">Guadar</button>
                  </div>
                </form>
              </div>

              <div class="tab-pane fade" id="v-pills-cuenta" role="tabpanel" aria-labelledby="v-pills-cuenta-tab">
                <h3 class="fs-4">Cuidado</h3>
                <p>Este apartado es para poder eliminar tu cuenta.</p>
                <button class="btn btn-lg btn-danger">Eliminar</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <script type="text/javascript">
    var frm = $('#formPerfil');
    frm.submit(function(e) {
      e.preventDefault();
      $.ajax({
        type: frm.attr('method'),
        url: frm.attr('action'),
        data: frm.serialize(),
        success: function(data) {
          console.log('Submission was successful.');
          console.log(data);
          $('#messages').html(data);
        },
        error: function(data) {
          console.log('An error occurred.');
          console.log(data);
        },
      });
    });
  </script>
</body>

</html>