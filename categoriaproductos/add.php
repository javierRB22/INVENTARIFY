<html>
<head>
<title>Adicionar Datos</title>
</head>
<body>
<?php
include_once("config.php");
if(isset($_POST['Submit'])) {
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
echo "<br/><a href='javascript:self.history.back();'>Volver</a>";
} else {

$sql = "INSERT INTO categoriaproductos ( nombre, descripcion) VALUES(:nombre, :descripcion)";
$query = $dbConn->prepare($sql);
$query->bindparam(':nombre', $nombre);
$query->bindparam(':descripcion', $descripcion);

$query->execute();
echo "<font color='green'>Registro Agregado Correctamente.";
echo "Cantidad de Registros Agregados: ".$query->rowCount()."<br>";
echo "<br/><a href='index.php'>Ver Todos los Registros</a>";
}
}
?>
</body>
</html>
