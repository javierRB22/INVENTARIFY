<html>
<head>
<title>Adicionar Datos</title>
</head>
<body>
<?php
include_once("config.php");
if(isset($_POST['Submit'])) {
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$direccion = $_POST['direccion'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
if(empty($nombre) || empty($apellido) || empty($direccion) ||
empty($email) || empty($telefono)) {

if(empty($nombre)) {
echo "<font color='red'>Campo: nombre esta
vacio.</font><br/>";
}
if(empty($apellido)) {
echo "<font color='red'>Campo: apellido esta
vacio.</font><br/>";
}
if(empty($direccion)) {
echo "<font color='red'>Campo: direccion esta
vacio.</font><br/>";
}
if(empty($email)) {
echo "<font color='red'>Campo: email esta
vacio.</font><br/>";
}
if(empty($telefono)) {
echo "<font color='red'>Campo: telefono esta
vacio.</font><br/>";
}
echo "<br/><a href='javascript:self.history.back();'>Volver</a>";
} else {

$sql = "INSERT INTO cliente( nombre, apellido,
direccion, email, telefono) VALUES(:nombre, :apellido, :direccion, :email,
:telefono)";
$query = $dbConn->prepare($sql);
$query->bindparam(':nombre', $nombre);
$query->bindparam(':apellido', $apellido);
$query->bindparam(':direccion', $direccion);
$query->bindparam(':email', $email);
$query->bindparam(':telefono', $telefono);
$query->execute();
echo "<font color='green'>Registro Agregado Correctamente.";
echo "Cantidad de Registros Agregados: ".$query->rowCount()."<br>";
echo "<br/><a href='index.php'>Ver Todos los Registros</a>";
}
}
?>
</body>
</html>
