<?php
	require 'config.php';
	if(empty($_SESSION['name']))
		header('Location: login.php');
?>

<html>
	<head><title>Dashboard</title></head>
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
	<style>
	html, body {
		margin: 1px;
		border: 0;
	}
	</style>
<body>
	<div style="margin: 15px">
		<div align="center">
			<?php
					if(isset($errMsg)){
						echo '<div style="color:#FF0000;text-align:center;font-size:17px;">'.$errMsg.'</div>';
					}
				?>
			<div style=" border: solid 1px #079B96; " align="center">
				
				<div style="background-color:#006D9C; color:#FFFFFF; padding:10px;"><b><?php echo $_SESSION['name']; ?></b></div>
				<div style="margin: 15px">
					Bienvenido <?php echo $_SESSION['name']; ?> <br>
					<div class="enlace-marco">
					<a href="update.php">Actualizar</a> <br>
					<a href="logout.php">Salir</a><br>
					<a href="../ventas/index2.php">mostrar ventas</a><br>
					<a href="../proveedores/index3.php">mostrar proveedores</a><br>
					<a href="../productos/index.php">mostrar productos</a><br>
					<a href="../factura/index.php">mostrar facturas</a><br>
					<a href="../departamentos/index.php">mostrar departamentos</a><br>
					<a href="../cliente/index.php">mostrar clientes</a><br>
					<a href="../categoriaproductos/index.php">mostrar categoria_productos</a><br>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
