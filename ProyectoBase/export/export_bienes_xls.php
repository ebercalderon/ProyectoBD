<?php

session_start();
require_once '../config/config.php';

$link = conectarse();

$query="SELECT * FROM bien";
$result=mysqli_query($link, $query);

$docu = "detalles.xls";

header('Content-type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename=' . $docu);
header('Pragma: no-cache');
header('Expires: 0');

echo '<table border=1>';
echo '<tr>';
echo '<th colspan=6>Reporte de detalle de bienes</th>';
echo '</tr>';
echo '<tr><th>COD</th><th>Descripcion</th><th>UM</th><th>Cantidad</th><th>Monto</th><th>Fecha Carga</th></tr>';


while ($row = mysqli_fetch_array($result)) {
    echo '<tr>';
    echo '<td>' . $row['CodigoBien'] . '</td>';
    echo '<td>' . $row['Descripcion'] . '</td>';
    echo '<td>' . $row['UM'] . '</td>';
    echo '<td>' . $row['Cantidad'] . '</td>';
    echo '<td>' . $row['Monto'] . '</td>';
    echo '<td>' . $row['FechaCarga'] . '</td>';
    echo '</tr>';
}

echo '</table>';

