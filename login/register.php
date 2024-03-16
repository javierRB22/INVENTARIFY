<?php
require 'config.php';

if (isset($_POST['register'])) {
	$errMsg = '';

	// Get data from FROM
	$fullname = $_POST['fullname'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$secretpin = $_POST['secretpin'];

	if ($fullname == '')
		$errMsg = 'Ingrese su Nombre Completo';
	if ($username == '')
		$errMsg = 'Ingrese su Usuario';
	if ($password == '')
		$errMsg = 'Ingrese su Contraseña';
	if ($secretpin == '')
		$errMsg = 'Ingrese su recordatorio';

	if ($errMsg == '') {
		try {
			$stmt = $connect->prepare('INSERT INTO users (fullname, username, password, secretpin) VALUES (:fullname, :username, :password, :secretpin)');
			$stmt->execute(array(
				':fullname' => $fullname,
				':username' => $username,
				':password' => $password,
				':secretpin' => $secretpin
			));
			header('Location: register.php?action=joined');
			exit;
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}
}

if (isset($_GET['action']) && $_GET['action'] == 'joined') {
	$errMsg = 'Registro Exitoso!!. Ahora puede Ingresar <a href="login.php">Ingreso</a>';
}
?>

<html>

<head>
	<title>Registro</title>
</head>
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<link rel="stylesheet" href="assets/css/styleRegistro.css">
<style>
	html,
	body {
		margin: 1px;
		border: 0;
	}
</style>

<body>
	<section class="contenedor">
		<form class="contenedor1" action="" method="post">
			<div class="contenedor.nombre">
				<input type="text" name="fullname" placeholder="Nombre Completo" value="<?php if (isset($_POST['fullname'])) echo $_POST['fullname'] ?>" autocomplete="off" class="box" /><br /><br />
			</div>
			<div class="contenedor.usuario">
				<input type="text" name="username" placeholder="Ususario" value="<?php if (isset($_POST['username'])) echo $_POST['username'] ?>" autocomplete="off" class="box" /><br /><br />
			</div>
			<div class="contenedor.contraseña">
				<input type="password" name="password" placeholder="Contraseña" value="<?php if (isset($_POST['password'])) echo $_POST['password'] ?>" class="box" /><br /><br />
			</div>
			<div class="contenedor.pin">
				<input type="text" name="secretpin" placeholder="Pin secreto (numeros)" value="<?php if (isset($_POST['secretpin'])) echo $_POST['secretpin'] ?>" autocomplete="off" class="box" /><br /><br />
			</div>
			<div class="contenedor.registro">
				<input type="submit" name='register' value="Registro" class='submit' /><br />
			</div>

			<div class="volver">
		<span><a href="index1.php">Volver al inicio</a></span></div>
		
		</form>
		
		
		<?php
		if (isset($errMsg)) {
			echo '<div style="color:#FF0000;text-align:center;font-size:17px;">' . $errMsg . '</div>';
		}
		?>


	</section>

</body>

</html>