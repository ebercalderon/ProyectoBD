<?php
class Movimiento
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
            'Codigo_Movimiento_ ' => 'Codigo Movimiento',
            'Descripcion' => 'Descripcion',
            'Fecha' => 'Fecha',
            'Codigo_Proyecto_' => 'Codigo Proyecto',
            'FechaCarga' => 'Carga',
        ];

        return $ordering;
    }
}
