<html>
<head>
<title>Adicionar factura</title>
</head>
<body>
<?php
include_once("config.php");
if(isset($_POST['Submit'])) {
$fecha = $_POST['fecha'];
$cantidad_producto = $_POST['cantidad_producto'];
$cliente = $_POST['cliente'];

if(empty($fecha) || empty($cantidad_producto) || empty($cliente)) {
if(empty($fecha)) {
echo "<font color='red'>Campo: fecha esta
vacio.</font><br/>";
}
if(empty($cantidad_producto)) {
echo "<font color='red'>Campo: cantidad_producto esta
vacio.</font><br/>";
}
if(empty($cliente)) {
echo "<font color='red'>Campo: cliente esta
vacio.</font><br/>";
}

echo "<br/><a href='javascript:self.history.back();'>Volver</a>";
} else {

$sql = "INSERT INTO factura( fecha, cantidad_producto,
cliente) VALUES(:fecha, :cantidad_producto, :cliente)";
$query = $dbConn->prepare($sql);
$query->bindparam(':fecha', $fecha);
$query->bindparam(':cantidad_producto', $cantidad_producto);
$query->bindparam(':cliente', $cliente);

$query->execute();
echo "<font color='green'>Registro Agregado Correctamente.";
echo "Cantidad de Registros Agregados: ".$query->rowCount()."<br>";
echo "<br/><a href='index.php'>Ver Todos los Registros</a>";
}
}
?>
</body>
</html>
