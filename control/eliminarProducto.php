<?php

require_once __DIR__ . "/../modelo/conexion.php";
require_once __DIR__ . "/ctrlProducto.php";

// Recibimos el código
$codigo = $_POST["codigo"];

// Creamos el controlador
$controlador = new ProductoController($conexion);

// Eliminamos el producto
if ($controlador->eliminar($codigo)) {

    echo "Producto eliminado correctamente";

} else {

    echo "No se pudo eliminar el producto";

}