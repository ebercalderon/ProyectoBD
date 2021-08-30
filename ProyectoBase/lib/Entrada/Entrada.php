<?php
class Entrada
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
            'CodigoEntrada' => 'ID Entrada',
            'CodigoProveedor_' => 'ID Proveedor',
            'CodigoProyecto_' => 'ID Proyecto',
            'CodigoBien_' => 'ID Bien',
            'Fecha' => 'Fecha',
            'Factura' => 'Factura',
            'FechaCarga' => 'Carga',
        ];

        return $ordering;
    }
}
