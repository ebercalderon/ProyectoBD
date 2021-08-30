<?php
session_start();
require_once 'includes/auth_validate.php';
require_once './config/config.php';
$del_id = filter_input(INPUT_POST, 'del_id');
if ($del_id && $_SERVER['REQUEST_METHOD'] == 'POST') {

    if ($_SESSION['admin_type'] != 'super') {
        $_SESSION['failure'] = "No tienes permiso para realizar esta acción.";
        header('location: activo.php');
        exit;
    }
    $activo_id = $del_id;

    $db = getDbInstance();
    $db->where('CodigoActivo', $activo_id);
    $status = $db->delete('activo');

    if ($status) {
        $_SESSION['info'] = "Activo eliminado exitosamente!";
        header('location: activo.php');
        exit;
    } else {
        $_SESSION['failure'] = "No se pudo borrar el activo";
        header('location: activo.php');
        exit;
    }
}
