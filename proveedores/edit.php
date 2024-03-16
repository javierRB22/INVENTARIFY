<?php
include_once("config.php");
if(isset($_POST['update']))
{
$id = $_POST['id'];
$nombre = $_POST['nombre'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];

if(empty($nombre) || empty($direccion) ||
empty($telefono)) {
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
} else {
$sql = "UPDATE proveedores SET nombre=:nombre, direccion=:direccion, telefono=:telefono WHERE
id=:id";
$query = $dbConn->prepare($sql);
$query->bindparam(':id', $id);
$query->bindparam(':nombre', $nombre);
$query->bindparam(':direccion', $direccion);
$query->bindparam(':telefono', $telefono);
$query->execute();
header("Location: index3.php");
}
}
?>
<?php
$id = $_GET['id'];
$sql = "SELECT * FROM proveedores WHERE id=:id";
$query = $dbConn->prepare($sql);
$query->execute(array(':id' => $id));
while($row = $query->fetch(PDO::FETCH_ASSOC))
{

$nombre = $row['nombre'];
$direccion = $row['direccion'];
$telefono = $row['telefono'];
}
?>
<html>
<head>
<title>Edit Data</title>
</head>
<body>
<a href="index3.php">Inicio</a>
<br/><br/>
<form name="form1" method="post" action="edit.php">
<table border="0">
<tr>
<td>Nombre</td>
<td><input type="text" name="nombre" value="<?php echo
$nombre;?>"></td>
</tr>
<tr>

<td>direccion</td>
<td><input type="text" name="direccion" value="<?php echo
$direccion;?>"></td>
</tr>
<tr>
<td>telefono</td>
<td><input type="text" name="telefono" value="<?php echo
$telefono;?>"></td>
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