<?php
session_start();
require_once './config/config.php';
require_once 'includes/auth_validate.php';


// Sanitize if you want
$idBien = filter_input(INPUT_GET, 'idBien');
$operation = filter_input(INPUT_GET, 'operation', FILTER_SANITIZE_STRING);
($operation == 'edit') ? $edit = true : $edit = false;
$db = getDbInstance();

//Handle update request. As the form's action attribute is set to the same script, but 'POST' method, 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //Get proveedor id form query string parameter.
    $idBien = filter_input(INPUT_GET, 'idBien', FILTER_SANITIZE_STRING);

    //Get input data
    $actualizacion = filter_input_array(INPUT_POST);

    $actualizacion['FechaCarga'] = date('Y-m-d H:i:s');
    $db = getDbInstance();
    $db->where('CodigoBien', $idBien);
    $stat = $db->update('bien', $actualizacion);

    if ($stat) {
        $_SESSION['success'] = "¡Bien actualizado correctamente!";
        //Redirect to the listing page,
        header('location: bienes.php');
        //Important! Don't execute the rest put the exit/die. 
        exit();
    }
}


//If edit variable is set, we are performing the update operation.
if ($edit) {
    $db->where('CodigoBien', $idBien);
    //Get data to pre-populate the form.
    $bien = $db->getOne("bien");
}
?>


<?php
include_once 'includes/header.php';
?>
<div id="page-wrapper">
    <div class="row">
        <h2 class="page-header">Actualización de Bien</h2>
    </div>
    <!-- Flash messages -->
    <?php
    include('./includes/flash_messages.php')
    ?>

    <form class="" action="" method="post" enctype="multipart/form-data" id="contact_form">

        <?php
        //Include the common form for add and edit  
        require_once('./forms/bien_form.php');
        ?>
    </form>
</div>




<?php include_once 'includes/footer.php'; ?>