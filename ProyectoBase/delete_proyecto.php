<?php
session_start();
require_once 'includes/auth_validate.php';
require_once './config/config.php';
$del_id = filter_input(INPUT_POST, 'del_id');
if ($del_id && $_SERVER['REQUEST_METHOD'] == 'POST') {

    if ($_SESSION['admin_type'] != 'super') {
        $_SESSION['failure'] = "No tienes permiso para realizar esta acción.";
        header('location: proyecto.php');
        exit;
    }
    $proyecto_id = $del_id;

    $db = getDbInstance();
    $db->where('CodigoProyecto', $proyecto_id);
    $status = $db->delete('proyecto');

    if ($status) {
        $_SESSION['info'] = "Proyecto eliminado exitosamente!";
        header('location: proyecto.php');
        exit;
    } else {
        $_SESSION['failure'] = "No se pudo borrar el proyecto";
        header('location: proyecto.php');
        exit;
    }
}
