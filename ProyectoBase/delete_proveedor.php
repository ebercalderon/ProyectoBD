<?php
session_start();
require_once 'includes/auth_validate.php';
require_once './config/config.php';
$del_id = filter_input(INPUT_POST, 'del_id');
if ($del_id && $_SERVER['REQUEST_METHOD'] == 'POST') {

    if ($_SESSION['admin_type'] != 'super') {
        $_SESSION['failure'] = "No tienes permiso para realizar esta acción.";
        header('location: proveedor.php');
        exit;
    }
    $proveedor_id = $del_id;

    $db = getDbInstance();
    $db->where('CodigoProveedor', $proveedor_id);
    $status = $db->delete('proveedor');

    if ($status) {
        $_SESSION['info'] = "Proveedor eliminado exitosamente!";
        header('location: proveedor.php');
        exit;
    } else {
        $_SESSION['failure'] = "No se pudo borrar el proveedor";
        header('location: proveedor.php');
        exit;
    }
}
