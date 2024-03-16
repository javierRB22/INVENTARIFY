<html>
<head>
<title>Adicionar Datos</title>
</head>
<body>
<?php
include_once("config.php");
if(isset($_POST['Submit'])) {
$nombre = $_POST['nombre'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];

if(empty($nombre) || empty($direccion) || empty($telefono)) {
if(empty($nombre)) {
echo "<font color='red'>Campo: nombre esta
vacio.</font><br/>";
}
if(empty($direccion)) {
echo "<font color='red'>Campo: direccion esta
vacio.</font><br/>";
}
if(empty($telefono)) {
echo "<font color='red'>Campo: telefono esta
vacio.</font><br/>";
}
echo "<br/><a href='javascript:self.history.back();'>Volver</a>";
} else {

$sql = "INSERT INTO proveedores( nombre, direccion,telefono) VALUES(:nombre, :direccion, :telefono)";
$query = $dbConn->prepare($sql);
$query->bindparam(':nombre', $nombre);
$query->bindparam(':direccion', $direccion);
$query->bindparam(':telefono', $telefono);
$query->execute();
echo "<font color='green'>Registro Agregado Correctamente.";
echo "Cantidad de Registros Agregados: ".$query->rowCount()."<br>";
echo "<br/><a href='index3.php'>Ver Todos los Registros</a>";
}
}
?>
</body>
</html>
