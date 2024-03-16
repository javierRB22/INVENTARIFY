<html>
<head>
<title>Adicionar Datos</title>
</head>
<body>
<?php
include_once("config.php");
if(isset($_POST['Submit'])) {
$fecha_venta = $_POST['fecha_venta'];
$total_ventas = $_POST['total_ventas'];

if(empty($fecha_venta) || empty($total_ventas) ) {
if(empty($fecha_venta)) {
echo "<font color='red'>Campo: fecha_venta esta 
vacio.</font><br/>";
}
if(empty($total_ventas)) {
echo "<font color='red'>Campo: total_ventas esta 
vacio.</font><br/>";
}
echo "<br/><a href='javascript:self.history.back();'>Volver</a>";
} else { 

$sql = "INSERT INTO ventas(fecha_venta, total_ventas) VALUES(:fecha_venta, :total_ventas)";
$query = $dbConn->prepare($sql);
$query->bindparam(':fecha_venta', $fecha_venta);
$query->bindparam(':total_ventas', $total_ventas);
$query->execute();
echo "<font color='green'>Registro Agregado Correctamente.";
echo "Cantidad de Registros Agregados: ".$query->rowCount()."<br>";
echo "<br/><a href='index2.php'>Ver Todos los Registros</a>";
}
}
?>
</body>
</html>