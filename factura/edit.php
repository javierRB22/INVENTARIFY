<?php
include_once("config.php");
if(isset($_POST['update']))
{
$id = $_POST['id'];
$fecha = $_POST['fecha'];
$cantidad_producto = $_POST['cantidad_producto'];
$cliente = $_POST['cliente'];

if(empty($fecha) || empty($cantidad_producto) ||
empty($cliente)) {
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

} else {
$sql = "UPDATE factura SET fecha=:fecha, cantidad_producto=:cantidad_producto, cliente=:cliente WHERE
id=:id";
$query = $dbConn->prepare($sql);
$query->bindparam(':id', $id);
$query->bindparam(':fecha', $fecha);
$query->bindparam(':cantidad_producto', $cantidad_producto);
$query->bindparam(':cliente', $cliente);

$query->execute();
header("Location: index.php");
}
}
?>
<?php
$id = $_GET['id'];
$sql = "SELECT * FROM factura WHERE id=:id";
$query = $dbConn->prepare($sql);
$query->execute(array(':id' => $id));
while($row = $query->fetch(PDO::FETCH_ASSOC))
{

$fecha = $row['fecha'];
$cantidad_producto = $row['cantidad_producto'];
$cliente = $row['cliente'];

}
?>
<html>
<head>
<title>Edit Data</title>
</head>
<body>
<a href="index.php">Inicio</a>
<br/><br/>
<form name="form1" method="post" action="edit.php">
<table border="0">
<tr>
<td>fecha</td>
<td><input type="text" name="fecha" value="<?php echo
$fecha;?>"></td>
</tr>
<tr>

<td>cantidad_producto</td>
<td><input type="text" name="cantidad_producto" value="<?php echo
$cantidad_producto;?>"></td>
</tr>
<tr>
<td>cliente</td>
<td><input type="text" name="cliente" value="<?php echo
$cliente;?>"></td>
</tr>

<tr>
<td><input type="hidden" name="id" value=<?php echo
$_GET['id'];?>></td>
<td><input type="submit" name="update"
value="Editar"></td>
</tr>
</table>
</form>
</body>
</html>