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
                <form class="col-lg-5">
                      <img src="img/logotipo.png" alt="logotipo.png" class="logotipo d-flex justify-content-center"
                        aling="center">
                    <div class="card p-3 p-lg-4">
                        <h1 class="text-center fs-4 my-3">Inicia sesión en tu cuenta</h1>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Correo electrónico</label>
                                <input type="email" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                                <div id="emailHelp" class="form-text small"><i class="fas fa-info-circle me-1"></i>Nunca
                                    compartiremos su correo electrónico con nadie</div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                                <input type="password" class="form-control" id="exampleInputPassword1">
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Recordarme</label>
                            </div>
                            <div class="d-grid gap-2">
                                <a href="index.php" class="btn btn-primary" id="boton-sesion">Iniciar sesión</a>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <a href="#" class="btn btn-link">¿Olvidó su contraseña?</a>
                                <a href="registro.php" class="btn btn-link">Crear su cuenta</a>
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
    <script src="js/bootstrap.js"></script>
    <script>
        document.getElementById("boton-sesion").addEventListener("click", paginaPrincipal);
        function paginaPrincipal() {
            window.location.href = 'http://www.google.com'; 
        }

    </script>
</body>

</html>