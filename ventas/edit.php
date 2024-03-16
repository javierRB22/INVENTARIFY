<?php
include_once("config.php");
if(isset($_POST['update']))
{
$id = $_POST['id'];
$fecha_venta = $_POST['fecha_venta'];
$total_ventas = $_POST['total_ventas'];
if(empty($fecha_venta) || empty($total_ventas) ) {
if(empty($fecha_venta)) {
echo "<font color='red'>Campo: fecha_venta esta 
vacio.</font><br/>";
}
if(empty($total_ventas)) {
echo "<font color='red'>Campo:total_ventas esta 
vacio.</font><br/>";
}

} else {
$sql = "UPDATE ventas SET fecha_venta=:fecha_venta, 
total_ventas=:total_ventas WHERE 
id=:id";
$query = $dbConn->prepare($sql);
$query->bindparam(':id', $id);
$query->bindparam(':fecha_venta', $fecha_venta);
$query->bindparam(':total_ventas', $total_ventas);
$query->execute();
header("Location: index2.php");
}
}
?>
<?php
$id = $_GET['id'];
$sql = "SELECT * FROM ventas WHERE id=:id";
$query = $dbConn->prepare($sql);
$query->execute(array(':id' => $id));
while($row = $query->fetch(PDO::FETCH_ASSOC))
{
 $fecha_venta = $row['fecha_venta'];
$total_ventas = $row['total_ventas'];

}
?>
<html>
<head>
<title>Edit Data</title>
</head>
<body>
<a href="index2.php">Inicio</a>
<br/><br/>
<form name="form1" method="post" action="edit.php">
<table border="0">
<tr> 
<td>fecha_venta</td>
<td><input type="text" name="fecha_venta" 
value="<?php echo $fecha_venta;?>"></td>
</tr>
<tr> 
<td>total_ventas</td>
<td><input type="text" name="total_ventas" value="<?php echo 
$total_ventas;?>"></td>
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