<?php

function conectarDB() : mysqli {
    $db = new mysqli('localhost', 'root', '', 'despensa');

    if (!$db) {
        echo "Error: No se pudo conectar a MySQL.";
        exit;
    }

    return $db;
}