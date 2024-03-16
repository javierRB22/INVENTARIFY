<?php
include("config.php");
$id = $_GET['id'];
$sql = "DELETE FROM proveedores WHERE id=:id";
$query = $dbConn->prepare($sql);
$query->execute(array(':id' => $id));
header("Location:index3.php");
?>