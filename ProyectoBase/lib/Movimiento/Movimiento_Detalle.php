<?php
class Movimiento_Detalle
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
            'CodigoMovimiento' => 'Codigo Movimiento',
            'CodigoActivo__' => 'Codigo Activo',
        ];

        return $ordering;
    }
}
