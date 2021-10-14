<?php
require '../app.php';
use App\Clientes;

$db = conectarDB();

//Consultar para obtener los clientes
$consulta ="SELECT * from clientes";
$resultado = mysqli_query($db, $consulta);

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $clientesObj = new Clientes($POST['aClientes']);
}