<?php
class Bienes
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
            'CodigoBien' => 'ID',
            'Descripcion' => 'Descripcion',
            'UM' => 'UM',
            'Cantidad' => 'Cantidad',
            'Monto' => 'Monto',
            'FechaCarga' => 'Carga',
        ];

        return $ordering;
    }
}
