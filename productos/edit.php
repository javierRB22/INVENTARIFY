<?php
include_once("config.php");
if(isset($_POST['update']))
{
$id = $_POST['id'];
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$precio = $_POST['precio'];
$proveedor = $_POST['proveedor'];
$cantidad_inventario = $_POST['cantidad_inventario'];
if(empty($nombre) || empty($descripcion) ||
empty($precio) || empty($proveedor) || empty($cantidad_inventario)) {
if(empty($nombre)) {
echo "<font color='red'>Campo: nombre esta
vacio.</font><br/>";
}
if(empty($descripcion)) {
echo "<font color='red'>Campo: descripcion esta
vacio.</font><br/>";
}
if(empty($precio)) {
echo "<font color='red'>Campo: precio esta
vacio.</font><br/>";
}
if(empty($proveedor)) {
echo "<font color='red'>Campo: proveedor esta
vacio.</font><br/>";
}

if(empty($cantidad_inventario)) {
echo "<font color='red'>Campo: cantidad_inventario esta
vacio.</font><br/>";
}
} else {
$sql = "UPDATE productos SET nombre=:nombre, descripcion=:descripcion, precio=:precio, proveedor=:proveedor, cantidad_inventario=:cantidad_inventario WHERE
id=:id";
$query = $dbConn->prepare($sql);
$query->bindparam(':id', $id);
$query->bindparam(':nombre', $nombre);
$query->bindparam(':descripcion', $descripcion);
$query->bindparam(':precio', $precio);
$query->bindparam(':proveedor', $proveedor);
$query->bindparam(':cantidad_inventario', $cantidad_inventario);
$query->execute();
header("Location: index.php");
}
}
?>
<?php
$id = $_GET['id'];
$sql = "SELECT * FROM productos WHERE id=:id";
$query = $dbConn->prepare($sql);
$query->execute(array(':id' => $id));
while($row = $query->fetch(PDO::FETCH_ASSOC))
{

$nombre = $row['nombre'];
$descripcion = $row['descripcion'];
$precio = $row['precio'];
$proveedor = $row['proveedor'];
$cantidad_inventario = $row['cantidad_inventario'];
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
<td>precio</td>
<td><input type="text" name="precio" value="<?php echo
$precio;?>"></td>
</tr>
<tr>
<td>proveedor</td>
<td><input type="text" name="proveedor" value="<?php echo
$proveedor;?>"></td>
</tr>
<tr>
<td>cantidad_inventario</td>
<td><input type="text" name="cantidad_inventario" value="<?php echo
$cantidad_inventario;?>"></td>
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