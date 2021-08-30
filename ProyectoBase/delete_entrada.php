<?php
session_start();
require_once 'includes/auth_validate.php';
require_once './config/config.php';
$del_id = filter_input(INPUT_POST, 'del_id');
if ($del_id && $_SERVER['REQUEST_METHOD'] == 'POST') {

    if ($_SESSION['admin_type'] != 'super') {
        $_SESSION['failure'] = "No tienes permiso para realizar esta acción.";
        header('location: entrada.php');
        exit;
    }
    $entrada_id = $del_id;

    $db = getDbInstance();
    $db->where('CodigoEntrada', $entrada_id);
    $status = $db->delete('entrada');

    if ($status) {
        $_SESSION['info'] = "Entrada eliminada exitosamente!";
        header('location: entrada.php');
        exit;
    } else {
        $_SESSION['failure'] = "No se pudo borrar la entrada";
        header('location: entrada.php');
        exit;
    }
}
