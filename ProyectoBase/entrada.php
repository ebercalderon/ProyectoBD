<?php
session_start();
require_once 'config/config.php';
require_once BASE_PATH . '/includes/auth_validate.php';

// Proveedor class
require_once BASE_PATH . '/lib/Entrada/Entrada.php';
$entrada = new Entrada();

// Get Input data from query string
$search_string = filter_input(INPUT_GET, 'search_string');
$filter_col = filter_input(INPUT_GET, 'filter_col');
$order_by = filter_input(INPUT_GET, 'order_by');

// Per page limit for pagination.
$pagelimit = 15;

// Get current page.
$page = filter_input(INPUT_GET, 'page');
if (!$page) {
    $page = 1;
}

// If filter types are not selected we show latest added data first
if (!$filter_col) {
    $filter_col = 'CodigoEntrada';
}
if (!$order_by) {
    $order_by = 'Asc';
}

//Get DB instance. i.e instance of MYSQLiDB Library
$db = getDbInstance();
$select = array('CodigoEntrada', 'CodigoProveedor_', 'CodigoProyecto_', 'CodigoBien_', 'Fecha', 'Factura' , 'FechaCarga');

//Start building query according to input parameters.
// If search string
if ($search_string) {
    $db->where('CodigoEntrada', '%' . $search_string . '%', 'like');
    $db->orwhere('CodigoProveedor_', '%' . $search_string . '%', 'like');
}

//If order by option selected
if ($order_by) {
    $db->orderBy($filter_col, $order_by);
}

// Set pagination limit
$db->pageLimit = $pagelimit;

// Get result of the query.
$rows = $db->arraybuilder()->paginate('entrada', $page, $select);
$total_pages = $db->totalPages;

include BASE_PATH . '/includes/header.php';
?>
<!-- Main container -->
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-6">
            <h1 class="page-header">Entrada</h1>
        </div>
        <div class="col-lg-6">
            <div class="page-action-links text-right">
                <a href="add_entrada.php?operation=create" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Agregar entrada</a>
            </div>
        </div>
    </div>
    <?php include BASE_PATH . '/includes/flash_messages.php'; ?>

    <!-- Filters -->
    <div class="well text-center filter-form">
        <form class="form form-inline" action="">
            <label for="input_search">Buscar</label>
            <input type="text" class="form-control" id="input_search" name="search_string" value="<?php echo xss_clean($search_string); ?>">
            <label for="input_order">Ordenar por</label>
            <select name="filter_col" class="form-control">
                <?php
                foreach ($entrada->setOrderingValues() as $opt_value => $opt_name) : ($order_by === $opt_value) ? $selected = 'selected' : $selected = '';
                    echo ' <option value="' . $opt_value . '" ' . $selected . '>' . $opt_name . '</option>';
                endforeach;
                ?>
            </select>
            <select name="order_by" class="form-control" id="input_order">
                <option value="Asc" <?php
                                    if ($order_by == 'Asc') {
                                        echo 'selected';
                                    }
                                    ?>>Asc</option>
                <option value="Desc" <?php
                                        if ($order_by == 'Desc') {
                                            echo 'selected';
                                        }
                                        ?>>Desc</option>
            </select>
            <button class="btn btn-primary" style='width:70px; height:30px'> <i class="glyphicon glyphicon-search"></i> </button>
            <!--<input type="submit" value="Go" class="btn btn-primary">-->
        </form>
    </div>
    <hr>
    <!-- //Filters -->


    <div id="export-section">
        <a href="./export/export_entrada_csv.php"><button class="btn btn-sm btn-primary">Exportar a CSV <i class="glyphicon glyphicon-export"></i></button></a>
    </div>

    <!-- Table -->
    <table class="table table-striped table-bordered table-condensed">
        <thead>
            <tr>
                <th width="10%">ID Entrada</th>
                <th width="20%">ID Proveedor</th>
                <th width="20%">ID Bien</th>
                <th width="20%">Fecha</th>
                <th width="10%">Factura</th>
                <th width="10%">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rows as $row) : ?>
                <tr>
                    <td><?php echo $row['CodigoEntrada']; ?></td>
                    <td><?php echo xss_clean($row['CodigoProveedor_']); ?></td>
                    <td><?php echo xss_clean($row['CodigoBien_']); ?></td>
                    <td><?php echo xss_clean($row['Fecha']); ?></td>
                    <td><?php echo xss_clean($row['Factura']); ?></td>
                    <td>
                        <a href="edit_entrada.php?entrada_id=<?php echo $row['CodigoEntrada']; ?>&operation=edit" class="btn btn-primary"><i class="glyphicon glyphicon-edit"></i></a>
                        <a href="#" class="btn btn-danger delete_btn" data-toggle="modal" data-target="#confirm-delete-<?php echo $row['CodigoEntrada']; ?>"><i class="glyphicon glyphicon-trash"></i></a>
                    </td>
                </tr>
                <!-- Delete Confirmation Modal -->
                <div class="modal fade" id="confirm-delete-<?php echo $row['CodigoEntrada']; ?>" role="dialog">
                    <div class="modal-dialog">
                        <form action="delete_entrada.php" method="POST">
                            <!-- Modal content -->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Confirmaci??n</h4>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" name="del_id" id="del_id" value="<?php echo $row['CodigoEntrada']; ?>">
                                    <p>??Est??s seguro de que quieres eliminar esta fila?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-default pull-left">S??</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- //Delete Confirmation Modal -->
            <?php endforeach; ?>
        </tbody>
    </table>
    <!-- //Table -->

    <!-- Pagination -->
    <div class="text-center">
        <?php echo paginationLinks($page, $total_pages, 'entrada.php'); ?>
    </div>
    <!-- //Pagination -->
</div>
<!-- //Main container -->
<?php include BASE_PATH . '/includes/footer.php'; ?>