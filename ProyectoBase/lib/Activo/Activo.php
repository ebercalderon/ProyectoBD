<?php
class Activo
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
            'CodigoActivo' => 'Codigo',
            'Estado' => 'Estado',
            'Codigo_Bien' => 'ID Bien',
            'FechaCarga' => 'Carga',
        ];

        return $ordering;
    }
}
