<?php

try {

    $conexion = new PDO(
        "mysql:host=localhost;dbname=facturas;charset=utf8mb4",
        "root",
        ""
    );

    $conexion->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
    );

} catch (PDOException $e) {

    die("Error de conexion: " . $e->getMessage());

}