<?php
session_start();
require_once './config/config.php';
require_once 'includes/auth_validate.php';


// Sanitize if you want
$activo_id = filter_input(INPUT_GET, 'activo_id');
$operation = filter_input(INPUT_GET, 'operation', FILTER_SANITIZE_STRING);
($operation == 'edit') ? $edit = true : $edit = false;
$db = getDbInstance();

//Handle update request. As the form's action attribute is set to the same script, but 'POST' method, 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //Get activo id form query string parameter.
    $activo_id = filter_input(INPUT_GET, 'activo_id', FILTER_SANITIZE_STRING);

    //Get input data
    $actualizacion = filter_input_array(INPUT_POST);

    $actualizacion['FechaCarga'] = date('Y-m-d H:i:s');
    $db = getDbInstance();
    $db->where('CodigoActivo', $activo_id);
    $stat = $db->update('activo', $actualizacion);

    if ($stat) {
        $_SESSION['success'] = "¡Activo actualizado correctamente!";
        //Redirect to the listing page,
        header('location: activo.php');
        //Important! Don't execute the rest put the exit/die. 
        exit();
    }
}


//If edit variable is set, we are performing the update operation.
if ($edit) {
    $db->where('CodigoActivo', $activo_id);
    //Get data to pre-populate the form.
    $activo = $db->getOne("activo");
}
?>


<?php
include_once 'includes/header.php';
?>
<div id="page-wrapper">
    <div class="row">
        <h2 class="page-header">Actualización de Activo</h2>
    </div>
    <!-- Flash messages -->
    <?php
    include('./includes/flash_messages.php')
    ?>

    <form class="" action="" method="post" enctype="multipart/form-data" id="contact_form">

        <?php
        //Include the common form for add and edit  
        require_once('./forms/activo_form.php');
        ?>
    </form>
</div>




<?php include_once 'includes/footer.php'; ?>