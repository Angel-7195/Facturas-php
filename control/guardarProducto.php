<?php

require_once __DIR__ . "/../modelo/conexion.php";
require_once __DIR__ . "/ctrlProducto.php";

// Recibimos los datos enviados por el formulario
$codigo = $_POST["codigo"];
$nombre = $_POST["nombre"];
$stock = (int) $_POST["stock"];
$valorUnitario = (float) $_POST["valorUnitario"];

// Creamos el producto
$producto = new Producto();

$producto->setCodigo($codigo);
$producto->setNombre($nombre);
$producto->setStock($stock);
$producto->setValorUnitario($valorUnitario);

// Creamos el controlador
$controlador = new ProductoController($conexion);

// Guardamos el producto
if ($controlador->crear($producto)) {

    echo "Producto creado correctamente";

} else {

    echo "No se pudo crear el producto";

}