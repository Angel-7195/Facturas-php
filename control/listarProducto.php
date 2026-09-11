<?php

require_once __DIR__ . "/../modelo/conexion.php";
require_once __DIR__ . "/ctrlProducto.php";

// Creamos el controlador
$controlador = new ProductoController($conexion);

// Obtenemos los productos
$productos = $controlador->listar();

// Arreglo que enviaremos al HTML
$datos = [];

// Recorremos los productos
foreach ($productos as $producto) {

    $datos[] = [
        "codigo" => $producto->getCodigo(),
        "nombre" => $producto->getNombre(),
        "stock" => $producto->getStock(),
        "valorUnitario" => $producto->getValorUnitario()
    ];
}

// Indicamos que la respuesta será JSON
header("Content-Type: application/json");

// Convertimos el arreglo a JSON
echo json_encode($datos);