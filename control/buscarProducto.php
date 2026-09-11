<?php

require_once __DIR__ . "/../modelo/conexion.php";
require_once __DIR__ . "/ctrlProducto.php";

// Recibimos el código enviado desde el HTML
$codigo = $_GET["codigo"];

// Creamos el controlador
$controlador = new ProductoController($conexion);

// Buscamos el producto
$producto = $controlador->buscar($codigo);

// Indicamos que devolveremos JSON
header("Content-Type: application/json");

// Si no existe
if ($producto === null) {

    echo json_encode(null);

} else {

    $datos = [
        "codigo" => $producto->getCodigo(),
        "nombre" => $producto->getNombre(),
        "stock" => $producto->getStock(),
        "valorUnitario" => $producto->getValorUnitario()
    ];

    echo json_encode($datos);

}