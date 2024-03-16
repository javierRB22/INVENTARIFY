<?php
include("config.php");
$id = $_GET['id'];
$sql = "DELETE FROM factura WHERE id=:id";
$query = $dbConn->prepare($sql);
$query->execute(array(':id' => $id));
header("Location:index.php");
?>