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
    <section>
        <div class="container">
            <div class="row justify-content-lg-center">
                <form class="col-lg-5" id="formRegistro" method="post" action="usuario/crear.php" enctype="multipart/form-data">
                    <img src="img/logotipo.png" alt="logotipo.png" class="logotipo d-flex justify-content-center" aling="center">
                    <div class="card p-3 p-lg-4">
                        <h1 class="text-center fs-4 my-3">Crear tu incríble cuenta</h1>
                        <div id="messages"></div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="nombre" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" id="nombre" name="aUsuarios[nombres]"  aria-describedby="Nombre">
                                </div>
                                <div class="mb-3">
                                    <label for="correo" class="form-label">Correo electrónico</label>
                                    <input type="email" class="form-control" id="correo" name="aUsuarios[correo]" aria-describedby="emailHelp">
                                    <div id="emailHelp" class="form-text small"><i class="fas fa-info-circle me-1"></i>Nunca
                                        compartiremos su correo electrónico con nadie</div>
                                </div>
                                <div class="mb-3">
                                    <label for="contrasenia" class="form-label">Contraseña</label>
                                    <input type="password" class="form-control" id="contrasenia" name="aUsuarios[contrasenia]">
                                </div>
                                <div class="mb-3">
                                    <label for="contraseniaConfirm" class="form-label">Confirmar Contraseña</label>
                                    <input type="password" class="form-control" id="contraseniaConfirm">
                                </div>
                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-primary">Registrarse</button>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <a href="#" class="btn btn-link">¿Olvidó su contraseña?</a>
                                    <a href="login.php" class="btn btn-link">Iniciar sesión</a>
                                </div>
                            </div>
                    </div>
                </form>
            </div>
            <div class="row justify-content-lg-center text-center mt-3">
                <div class="col-lg-5">
                    <div class="row justify-content-center">
                        <div class="col-6 col-lg-5">
                            <a href="#" class="btn btn-link seguridad-legal">Aviso de privavidad</a>
                        </div>
                        <div class="col-6 col-lg-5">
                            <a href="#" class="btn btn-link seguridad-legal">Términos y condiciones</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer>
        <div class="container mt-4 text-center small">
            <p>Al utilizar los productos o servicios de la <a href="index.html" class="btn-link">Universidad Tecnológica del Poniente</a>, está de acuerdo con nuestro aviso de privacidad y términos del servicio</p>
            <p>© 2021 Atlassian Ltd. Todos los derechos reservados</p>
        </div>
    </footer>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script type="text/javascript">
        var frm = $('#formRegistro');
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
                    var x=$('#exito').val();
                    if(x==1){
                        window.location.replace("http://localhost/administrador/index.php");
                    }
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