<html>
<head>
<title>Adicionar productos</title>
</head>
<body>
<?php
include_once("config.php");
if(isset($_POST['Submit'])) {
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$precio = $_POST['precio'];
$proveedor = $_POST['proveedor'];
$cantidad_inventario = $_POST['cantidad_inventario'];
if(empty($nombre) || empty($descripcion) || empty($precio) ||
empty($proveedor) || empty($cantidad_inventario)) {

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
echo "<font color='red'>Campo: estatus esta
vacio.</font><br/>";
}
echo "<br/><a href='javascript:self.history.back();'>Volver</a>";
} else {

$sql = "INSERT INTO productos( nombre, descripcion,
precio, proveedor, cantidad_inventario) VALUES(:nombre, :descripcion, :precio, :proveedor,
:cantidad_inventario)";
$query = $dbConn->prepare($sql);
$query->bindparam(':nombre', $nombre);
$query->bindparam(':descripcion', $descripcion);
$query->bindparam(':precio', $precio);
$query->bindparam(':proveedor', $proveedor);
$query->bindparam(':cantidad_inventario', $cantidad_inventario);
$query->execute();
echo "<font color='green'>Registro Agregado Correctamente.";
echo "Cantidad de Registros Agregados: ".$query->rowCount()."<br>";
echo "<br/><a href='index.php'>Ver Todos los Registros</a>";
}
}
?>
</body>
</html>
