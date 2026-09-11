<?php

/**
 * Clase Producto
 *
 * Representa un producto dentro del sistema.
 */
class Producto
{
    // Atributos privados de la clase
    private string $codigo;
    private string $nombre;
    private int $stock;
    private float $valorUnitario;

    /**
     * Constructor de la clase Producto.
     *
     * Inicializa los atributos con valores predeterminados.
     */
    public function __construct()
    {
        $this->codigo = "";
        $this->nombre = "";
        $this->stock = 0;
        $this->valorUnitario = 0.0;
    }

    /**
     * Obtiene el código del producto.
     *
     * @return string Código del producto.
     */
    public function getCodigo(): string
    {
        return $this->codigo;
    }

    /**
     * Obtiene el nombre del producto.
     *
     * @return string Nombre del producto.
     */
    public function getNombre(): string
    {
        return $this->nombre;
    }

    /**
     * Obtiene la cantidad disponible del producto.
     *
     * @return int Cantidad de productos disponibles.
     */
    public function getStock(): int
    {
        return $this->stock;
    }

    /**
     * Obtiene el valor unitario del producto.
     *
     * @return float Valor de un producto.
     */
    public function getValorUnitario(): float
    {
        return $this->valorUnitario;
    }

    /**
     * Modifica el código del producto.
     *
     * @param string $codigo Nuevo código del producto.
     */
    public function setCodigo(string $codigo): void
    {
        $this->codigo = $codigo;
    }

    /**
     * Modifica el nombre del producto.
     *
     * @param string $nombre Nuevo nombre del producto.
     */
    public function setNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }

    /**
     * Modifica el stock del producto.
     *
     * @param int $stock Nueva cantidad disponible.
     */
    public function setStock(int $stock): void
    {
        $this->stock = $stock;
    }

    /**
     * Modifica el valor unitario del producto.
     *
     * @param float $valorUnitario Nuevo valor unitario.
     */
    public function setValorUnitario(float $valorUnitario): void
    {
        $this->valorUnitario = $valorUnitario;
    }
}
