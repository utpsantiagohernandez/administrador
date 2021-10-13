<?php
	require 'app.php';
	use App\Productos;
	$propiedades = Productos::all();
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
    
    <div class="container">
    <h1>Productos de la base de datos</h1>
        <div class="row">
            <?php foreach( $propiedades as $propiedad ): ?>
                <div class="col-4">
                    <img src="img/trix.jpg" alt="" class="img-fluid">
                    <h3><?php echo $propiedad->descripcion; ?></h3>
                    <p><?php echo $propiedad->precio; ?></p>
                </div>
            <?php endforeach ?>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-4">
                <img src="img/panke.jpg" alt="" class="img-fluid">
                <h3>Pierna</h3>
                <p>$12.50</p>
            </div>
            <div class="col-4">
                <img src="img/panke.jpg" alt="" class="img-fluid">
                <h3>Pechuga</h3>
                <p>$10.0</p>
            </div>
            <div class="col-4">
                <img src="img/panke.jpg" alt="" class="img-fluid">
                <h3>Lomo</h3>
                <p>$50.0</p>
            </div>
        </div>
    </div>

<script src="js/bootstrap.js"></script>
</body>

</html>