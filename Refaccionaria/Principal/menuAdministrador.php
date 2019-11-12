<!DOCTYPE html> 
<html>
<head>
<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <link rel="stylesheet" href="../css/estiloAdminUser.css">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<link rel="stylesheet" href="../vistas/bower_components/bootstrap/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="../vistas/bower_components/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="../vistas/bower_components/Ionicons/css/ionicons.min.css">
<link rel="stylesheet" href="../vistas/dist/css/AdminLTE.css">
<link rel="stylesheet" href="../vistas/dist/css/skins/_all-skins.min.css">
<link rel="stylesheet" href="../vistas/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="../vistas/bower_components/datatables.net-bs/css/responsive.bootstrap.min.css">
<link rel="stylesheet" href="../vistas/plugins/iCheck/all.css">
 <!-- Daterange picker -->
<link rel="stylesheet" href="../vistas/bower_components/bootstrap-daterangepicker/daterangepicker.css">
<!-- Morris chart -->
<link rel="stylesheet" href="../vistas/bower_components/morris.js/morris.css">
<script src="../vistas/bower_components/jquery/dist/jquery.min.js"></script>
<script src="../vistas/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="../vistas/bower_components/fastclick/lib/fastclick.js"></script>
<script src="../vistas/dist/js/adminlte.min.js"></script>
</head>    
<header>
		<div class="menu_bar">
			<a href="#" class="bt-menu"><span class="icon-list2"></span>Menu</a>
		</div>
 		<nav>
			<ul>
				<li class="<?php echo $pagina=='404.php'? 'active': ''; ?>"><a href="?p=404">
				<i class="fa fa-home"></i><span></span>Inicio</a></li>
				<li class="<?php echo $pagina=='contenedorProductos'? 'active': ''; ?>"><a href="?p=contenedorProductos">
				<i class="fa fa-product-hunt"></i><span></span>Productos</a></li>
				<li class="<?php echo $pagina=='contenedorEmpleado'? 'active': ''; ?>"><a href="?p=contenedorEmpleado">
				<i class="fa fa-users"></i><span></span>Gestión de empleados</a></li>
				<li class="<?php echo $pagina=='contenedorVentas'? 'active': ''; ?>"><a href="?p=contenedorVentas">
				<i class="fa fa-list-alt"></i><span></span>Registro de ventas</a></li>
				<li class="<?php echo $pagina=='contenedorUsuario'? 'active': ''; ?>"><a href="?p=contenedorUsuario">
				<i class="fa fa-users"></i><span></span>Gestión de usuarios</a></li>
				<li class="<?php echo $pagina=='404'? 'active': ''; ?>"><a href="?p=salir">
				<i class="fa fa-sign-out"></i><span></span>Cerrar sesión </a></li>
			</ul>
		</nav>
	</header>
<body class="hold-transition  skin-blue sidebar-collapse ">
<?php
$pagina=isset($_GET['p']) ? strtolower($_GET['p']): 'menuAdministrador';
require_once $pagina.'.php';
?>
</body>
</html>

