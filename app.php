<?php
require 'config/database.php';
require __DIR__.'/vendor/autoload.php';

use App\Productos;
use App\Clientes;
use App\Usuarios;
use App\Customers;

//Conectarnos a la base de datos
$db = conectarDB();

Productos::setDB($db);
Clientes::setDB($db);
Usuarios::setDB($db);
Customers::setDB($db);
