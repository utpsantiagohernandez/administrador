<?php
require 'config/database.php';
require __DIR__.'/vendor/autoload.php';
//Conectarnos a la base de datos
$db = conectarDB();
use App\Productos;
use App\Clientes;
use App\Usuarios;
Productos::setDB($db);
Clientes::setDB($db);
Usuarios::setDB($db);