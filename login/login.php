<?php
require 'config.php';

if (isset($_POST['login'])) {
	$errMsg = '';

	// Get data from FORM
	$username = $_POST['username'];
	$password = $_POST['password'];

	if ($username == '')
		$errMsg = 'Ingrese un usuario';
	if ($password == '')
		$errMsg = 'ingrese una contraseña';

	if ($errMsg == '') {
		try {
			$stmt = $connect->prepare('SELECT id, fullname, username, password, secretpin FROM users WHERE username = :username');
			$stmt->execute(array(
				':username' => $username
			));
			$data = $stmt->fetch(PDO::FETCH_ASSOC);

			if ($data == false) {
				$errMsg = "Usuario $username no encontrado.";
			} else {
				if ($password == $data['password']) {
					$_SESSION['name'] = $data['fullname'];
					$_SESSION['username'] = $data['username'];
					$_SESSION['password'] = $data['password'];
					$_SESSION['secretpin'] = $data['secretpin'];

					header('Location: dashboard.php');
					exit;
				} else
					$errMsg = 'Contraseña Incorrecta.';
			}
		} catch (PDOException $e) {
			$errMsg = $e->getMessage();
		}
	}
}
?>

<html>

<head>
	<title>Ingreso</title>
</head>
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<link rel="stylesheet" href="assets/css/styleLogin.css">
<style>
	html,
	body {
		margin: 1px;
		border: 0;
	}
</style>

<body>
	<section class="contenedor5">

		<h2>Ingresa</h2>
		<span>
			<h2>o</h2> <br></h2> <a href="register.php">Registrate</a>
		</span><br><br>
		<form class="form" method="post">
			<div class="primer_contenedor">
				<input type="text" name="username" placeholder="usuario" value="<?php if (isset($_POST['username'])) echo $_POST['username'] ?>" autocomplete="off" class="box" /><br /><br />
			</div>
			<div class="segundo_contenedor">
				<input type="password" name="password" placeholder="contraseña" value="<?php if (isset($_POST['password'])) echo $_POST['password'] ?>" autocomplete="off" class="box" /><br /><br />
			</div>
			<div class="tercer_contenedor">
				<input type="submit" name='login' value="Ingresar" class='submit' /><br />
			</div>
		</form>
		<div class="olvidar">
			<span><a href="forgot.php">Olvido la Contraseña</a></span><br><br>
		</div>
		<div class="volver">
			<span><a href="index1.php">Volver al inicio</a></span>
		</div>

		<?php
		if (isset($errMsg)) {
			echo '<div style="color:#FF0000;text-align:center;font-size:17px;">' . $errMsg . '</div>';
		}
		?>

	</section>
</body>

</html>