<?php
class Proyecto
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
            'CodigoProyecto' => 'Codigo',
            'Nombre' => 'Descripcion',
            'Encargado' => 'Encargado',
            'FechaCarga' => 'Carga',
        ];

        return $ordering;
    }
}
