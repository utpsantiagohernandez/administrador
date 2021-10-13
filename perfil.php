<?php
	require 'app.php';
	use App\Clientes;
	$propiedades = Clientes::all();
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Administrador</title>
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
        <div class="card">
          <div class="card-body">
            <div class="tab-content" id="v-pills-tabContent">

            <?php foreach( $propiedades as $propiedad ): ?>
              
              <div class="tab-pane fade show active" id="v-pills-direccion" role="tabpanel" aria-labelledby="v-pills-direccion-tab">
                  <form class="row g-3">
                    <div class="col-12">
                      <label for="inputAddress" class="form-label">Dirección</label>
                      <input type="text" class="form-control" id="inputAddress" value="<?php echo $propiedad->direccion; ?>">
                    </div>
                    <div class="col-12">
                      <label for="inputAddress2" class="form-label">Colonia y Cruzamientos</label>
                      <input type="text" class="form-control" id="inputAddress2" value="<?php echo $propiedad->colonia; ?>">
                    </div>
                    <div class="col-md-6">
                      <label for="inputCity" class="form-label">Ciudad</label>
                      <input type="text" class="form-control" id="inputCity" value="<?php echo $propiedad->ciudad; ?>">
                    </div>
                    <div class="col-md-4">
                      <label for="inputState" class="form-label">Estado</label>
                      <select id="inputState" class="form-select">
                        <option selected>Selecciona</option>
                        <option>Yucatan</option>
                        <option>Campeche</option>
                      </select>
                    </div>
                    <div class="col-md-2">
                      <label for="inputZip" class="form-label">Código Postal</label>
                      <input type="text" class="form-control" id="inputZip" value="<?php echo $propiedad->cp; ?>">
                    </div>
                    <div class="col-12">
                      <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary btn-lg">Guadar</button>
                      </div>
                    </div>
                  </form>
                </div>

                <div class="tab-pane fade" id="v-pills-configuracion" role="tabpanel" aria-labelledby="v-pills-configuracion-tab">
                  <form>
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Dirección</label>
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

            <?php endforeach ?>



          </div>

        </div>



      </div>
    </div>
  </div>







  <script src="js/bootstrap.js"></script>
</body>

</html>