<?php
session_start();
require_once './config/config.php';
require_once './includes/auth_validate.php';


//serve POST method, After successful insert, redirect to entrada.php page.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //Mass Insert Data. Keep "name" attribute in html form same as column name in mysql table.
    $creacion = array_filter($_POST);

    //Insert timestamp
    $creacion['FechaCarga'] = date('Y-m-d H:i:s');
    $db = getDbInstance();

    $last_id = $db->insert('entrada', $creacion);

    if ($last_id) {
        $_SESSION['success'] = "Entrada agregado exitosamente!";
        header('location: entrada.php');
        exit();
    } else {
        echo 'insert failed: ' . $db->getLastError();
        exit();
    }
}

//We are using same form for adding and editing. This is a create form so declare $edit = false.
$edit = false;

require_once 'includes/header.php';
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">Agregar Entrada</h2>
        </div>

    </div>
    <form class="form" action="" method="post" id="entrada_form" enctype="multipart/form-data">
        <?php include_once('./forms/entrada_form.php'); ?>
    </form>
</div>


<script type="text/javascript">
    $(document).ready(function() {
        $("#entrada_form").validate({
            rules: {
                CodigoEntrada: {
                    required: true,
                    minlength: 3
                },
                Factura: {
                    required: true,
                    minlength: 3
                },
            }
        });
    });
</script>

<?php include_once 'includes/footer.php'; ?>