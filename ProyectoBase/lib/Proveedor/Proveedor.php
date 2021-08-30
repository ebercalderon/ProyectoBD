<?php
class Proveedor
{
    /**
     *
     */
    public function __construct()
    {
    }

    /**
     *
     */
    public function __destruct()
    {
    }
    
    /**
     * Set friendly columns\' names to order tables\' entries
     */
    public function setOrderingValues()
    {
        $ordering = [
            'CodigoProveedor' => 'Codigo',
            'Nombre' => 'Nombres',
            'Rubro' => 'Rubro',
            'FechaCarga' => 'Carga',
        ];

        return $ordering;
    }
}
