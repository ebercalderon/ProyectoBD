<!DOCTYPE html>
<html lang="es_PR">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Control de Activos</title>
    <link rel="shortcut icon" href="https://image.flaticon.com/icons/png/512/1849/1849554.png">

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />

    <!-- MetisMenu CSS -->
    <link href="assets/js/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="assets/css/sb-admin-2.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="assets/fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    <script src="assets/js/jquery.min.js" type="text/javascript"></script>

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] == true) : ?>
            <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="">Control de Activos</a>
                </div>
                <!-- /.navbar-header -->

                <ul class="nav navbar-top-links navbar-right">
                    <!-- /.dropdown -->

                    <!-- /.dropdown -->
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#"><i class="fa fa-user fa-fw"></i> Perfil de Usuario</a>
                            </li>
                            <li><a href="#"><i class="fa fa-gear fa-fw"></i> Configuración</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Cerrar Sesión</a>
                            </li>
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                    <!-- /.dropdown -->
                </ul>
                <!-- /.navbar-top-links -->

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li>
                                <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                            </li>

                            <li <?php echo (CURRENT_PAGE == "activo.php" || CURRENT_PAGE == "add_activo.php") ? 'class="active"' : ''; ?>>
                                <a href="#"><i class="fa fa-check fa-fw"></i> Activos<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="activo.php"><i class="fa fa-list fa-fw"></i> Ver todo</a>
                                    </li>
                                    <li>
                                        <a href="add_activo.php"><i class="fa fa-plus fa-fw"></i> Añadir</a>
                                    </li>
                                </ul>
                            </li>

                            <li <?php echo (CURRENT_PAGE == "bienes.php" || CURRENT_PAGE == "add_bienes.php") ? 'class="active"' : ''; ?>>
                                <a href="#"><i class="fa fa-archive fa-fw"></i> Bienes<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="bienes.php"><i class="fa fa-list fa-fw"></i> Ver todo</a>
                                    </li>
                                    <li>
                                        <a href="add_bienes.php"><i class="fa fa-plus fa-fw"></i> Añadir</a>
                                    </li>
                                </ul>
                            </li>

                            <li <?php echo (CURRENT_PAGE == "entrada.php" || CURRENT_PAGE == "add_entrada.php") ? 'class="active"' : ''; ?>>
                                <a href="#"><i class="fa fa-inbox fa-fw"></i> Entradas<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="entrada.php"><i class="fa fa-list fa-fw"></i> Ver todo</a>
                                    </li>
                                    <li>
                                        <a href="add_entrada.php"><i class="fa fa-plus fa-fw"></i> Añadir</a>
                                    </li>
                                </ul>
                            </li>    

                            <li <?php echo (CURRENT_PAGE == "movimiento.php" || CURRENT_PAGE == "add_movimiento.php") ? 'class="active"' : ''; ?>>
                                <a href="#"><i class="fa fa-flag fa-fw"></i> Movimiento<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="movimiento.php"><i class="fa fa-list fa-fw"></i> Ver todo</a>
                                    </li>
                                    <li>
                                        <a href="movimiento_detalle.php"><i class="fa fa-clock-o fa-fw"></i> Detalles</a>
                                    </li>
                                    <li>
                                        <a href="add_movimiento.php"><i class="fa fa-plus fa-fw"></i> Añadir</a>
                                    </li>
                                </ul>
                            </li>

                            <li <?php echo (CURRENT_PAGE == "proveedor.php" || CURRENT_PAGE == "add_proveedor.php") ? 'class="active"' : ''; ?>>
                                <a href="#"><i class="fa fa-user-circle fa-fw"></i> Proveedor<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="proveedor.php"><i class="fa fa-list fa-fw"></i> Ver todo</a>
                                    </li>
                                    <li>
                                        <a href="add_proveedor.php"><i class="fa fa-plus fa-fw"></i> Añadir</a>
                                    </li>
                                </ul>
                            </li>

                            <li <?php echo (CURRENT_PAGE == "proyecto.php" || CURRENT_PAGE == "add_proyecto.php") ? 'class="active"' : ''; ?>>
                                <a href="#"><i class="fa fa-subway fa-fw"></i> Proyecto<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="proyecto.php"><i class="fa fa-list fa-fw"></i> Ver todo</a>
                                    </li>
                                    <li>
                                        <a href="add_proyecto.php"><i class="fa fa-plus fa-fw"></i> Añadir</a>
                                    </li>
                                </ul>
                            </li>
                            <!--
                            <li>
                                <a href="admin_users.php"><i class="fa fa-users fa-fw"></i> Usuarios</a>
                            </li>
                            -->
                        </ul>
                    </div>
                    <!-- /.sidebar-collapse -->
                </div>
                <!-- /.navbar-static-side -->
            </nav>
        <?php endif; ?>
        <!-- The End of the Header -->