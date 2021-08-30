<?php
session_start();
require_once 'includes/auth_validate.php';
require_once './config/config.php';
$del_id = filter_input(INPUT_POST, 'del_id');
if ($del_id && $_SERVER['REQUEST_METHOD'] == 'POST') {

    if ($_SESSION['admin_type'] != 'super') {
        $_SESSION['failure'] = "No tienes permiso para realizar esta acción.";
        header('location: movimiento.php');
        exit;
    }
    $movimiento_id = $del_id;

    $db = getDbInstance();
    $db->where('Codigo_Movimiento_', $movimiento_id);
    $status = $db->delete('movimiento');

    if ($status) {
        $_SESSION['info'] = "Activo eliminado exitosamente!";
        header('location: movimiento.php');
        exit;
    } else {
        $_SESSION['failure'] = "No se pudo borrar el movimiento";
        header('location: movimiento.php');
        exit;
    }
}
