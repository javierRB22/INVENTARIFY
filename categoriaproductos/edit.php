<?php
include_once("config.php");
if(isset($_POST['update']))
{
$id = $_POST['id'];
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];


if(empty($nombre) || empty($descripcion)) {
if(empty($nombre)) {
echo "<font color='red'>Campo: nombre esta
vacio.</font><br/>";
}
if(empty($descripcion)) {
echo "<font color='red'>Campo: descripcion esta
vacio.</font><br/>";
}

} else {
$sql = "UPDATE categoriaproductos SET nombre=:nombre, descripcion=:descripcion WHERE
id=:id";
$query = $dbConn->prepare($sql);
$query->bindparam(':id', $id);
$query->bindparam(':nombre', $nombre);
$query->bindparam(':descripcion', $descripcion);
$query->execute();
header("Location: index.php");
}
}
?>
<?php
$id = $_GET['id'];
$sql = "SELECT * FROM categoriaproductos WHERE id=:id";
$query = $dbConn->prepare($sql);
$query->execute(array(':id' => $id));
while($row = $query->fetch(PDO::FETCH_ASSOC))
{

$nombre = $row['nombre'];
$descripcion = $row['descripcion'];

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
<td>Nombre</td>
<td><input type="text" name="nombre" value="<?php echo
$nombre;?>"></td>
</tr>
<tr>

<td>descripcion</td>
<td><input type="text" name="descripcion" value="<?php echo
$descripcion;?>"></td>
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