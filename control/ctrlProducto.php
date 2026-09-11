<?php

// Importamos la clase Producto del modelo
require_once __DIR__ . "/../modelo/Producto.php";

/**
 * Clase ProductoController
 *
 * Se encarga de realizar las operaciones CRUD
 * relacionadas con los productos.
 */
class ProductoController
{
    // Variable para almacenar la conexión a la base de datos
    private $conexion;

    /**
     * Constructor del controlador.
     *
     * Recibe la conexión a la base de datos.
     */
    public function __construct($conexion)
    {
        $this->conexion = $conexion;
    }

    /**
     * Método para crear un nuevo producto.
     *
     * @param Producto $producto Producto que se desea registrar.
     */
    public function crear(Producto $producto): bool
    {
        // Consulta SQL para insertar el producto
        $sql = "INSERT INTO producto 
                (codigo, nombre, stock, valorUnitario)
                VALUES (?, ?, ?, ?)";

        // Preparamos la consulta
        $stmt = $this->conexion->prepare($sql);

        // Ejecutamos la consulta utilizando los datos del producto
        return $stmt->execute([
            $producto->getCodigo(),
            $producto->getNombre(),
            $producto->getStock(),
            $producto->getValorUnitario()
        ]);
    }

    /**
     * Método para listar todos los productos.
     *
     * @return array Lista de productos.
     */
    public function listar(): array
    {
        // Consulta para obtener todos los productos
        $sql = "SELECT codigo, nombre, stock, valorUnitario 
                FROM producto";

        // Ejecutamos la consulta
        $stmt = $this->conexion->query($sql);

        // Array donde almacenaremos los productos
        $productos = [];

        // Recorremos los resultados
        while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {

            // Creamos un nuevo objeto Producto
            $producto = new Producto();

            // Asignamos los datos obtenidos de la base de datos
            $producto->setCodigo($fila["codigo"]);
            $producto->setNombre($fila["nombre"]);
            $producto->setStock((int) $fila["stock"]);
            $producto->setValorUnitario((float) $fila["valorUnitario"]);

            // Agregamos el producto al arreglo
            $productos[] = $producto;
        }

        // Retornamos todos los productos
        return $productos;
    }

    /**
     * Método para buscar un producto por su código.
     *
     * @param string $codigo Código del producto.
     * @return Producto|null Producto encontrado o null si no existe.
     */
    public function buscar(string $codigo): ?Producto
    {
        // Consulta para buscar el producto
        $sql = "SELECT codigo, nombre, stock, valorUnitario
                FROM producto
                WHERE codigo = ?";

        // Preparamos la consulta
        $stmt = $this->conexion->prepare($sql);

        // Ejecutamos enviando el código
        $stmt->execute([$codigo]);

        // Obtenemos el resultado
        $fila = $stmt->fetch(PDO::FETCH_ASSOC);

        // Si no encontramos el producto, retornamos null
        if (!$fila) {
            return null;
        }

        // Creamos el objeto Producto
        $producto = new Producto();

        // Asignamos los datos
        $producto->setCodigo($fila["codigo"]);
        $producto->setNombre($fila["nombre"]);
        $producto->setStock((int) $fila["stock"]);
        $producto->setValorUnitario((float) $fila["valorUnitario"]);

        // Retornamos el producto encontrado
        return $producto;
    }

    /**
     * Método para actualizar un producto.
     *
     * @param Producto $producto Producto con los nuevos datos.
     */
    public function actualizar(Producto $producto): bool
    {
        // Consulta SQL para actualizar el producto
        $sql = "UPDATE producto
                SET nombre = ?,
                    stock = ?,
                    valorUnitario = ?
                WHERE codigo = ?";

        // Preparamos la consulta
        $stmt = $this->conexion->prepare($sql);

        // Ejecutamos la consulta
        return $stmt->execute([
            $producto->getNombre(),
            $producto->getStock(),
            $producto->getValorUnitario(),
            $producto->getCodigo()
        ]);
    }

    /**
     * Método para eliminar un producto.
     *
     * @param string $codigo Código del producto que se desea eliminar.
     */
    public function eliminar(string $codigo): bool
    {
        // Consulta SQL para eliminar el producto
        $sql = "DELETE FROM producto
                WHERE codigo = ?";

        // Preparamos la consulta
        $stmt = $this->conexion->prepare($sql);

        // Ejecutamos la consulta
        return $stmt->execute([$codigo]);
    }
}