<?php
session_start();
require_once 'includes/auth_validate.php';
require_once './config/config.php';
$del_id = filter_input(INPUT_POST, 'del_id');
if ($del_id && $_SERVER['REQUEST_METHOD'] == 'POST') {

    if ($_SESSION['admin_type'] != 'super') {
        $_SESSION['failure'] = "No tienes permiso para realizar esta acción.";
        header('location: bienes.php');
        exit;
    }
    $CodigoBien = $del_id;

    $db = getDbInstance();
    $db->where('CodigoBien', $CodigoBien);
    $status = $db->delete('bien');

    if ($status) {
        $_SESSION['info'] = "Bien eliminado exitosamente!";
        header('location: bienes.php');
        exit;
    } else {
        $_SESSION['failure'] = "No se pudo borrar el bien";
        header('location: bienes.php');
        exit;
    }
}
