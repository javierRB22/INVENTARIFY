<!DOCTYPE html>
<html lang="en">
 <head>
 <meta charset="UTF-8" />
 <meta name="viewport" content="width=device-width, initial-scale=1.0" />

 <style>
	html, body {
		margin: 1px;
		border: 0;
	}
	</style>
 <title>Bienvenidos</title>
 </head>
 <body>
 <form action="index.php">
 <input type="submit" value="Submit " /><br />
 </form>
 </body>
</html>


<?php
include_once("config.php");
$result = $dbConn->query("SELECT * FROM productos ORDER BY id ASC");
?>
<html>
<head>
<title> Listado de productos</title>
</head>
<body>
<a href="add.html">Adicionar productos</a><br/><br/>
<table width='80%' border=0>
<tr bgcolor='#CCCCCC'>
<td>Nombre</td>
<td>descripcion</td>
<td>precio</td>
<td>proveedor</td>
<td>cantidad_inventario</td>

</tr>
<?php
while($row = $result->fetch(PDO::FETCH_ASSOC)) {
echo "<tr>";
echo "<td>".$row['nombre']."</td>";
echo "<td>".$row['descripcion']."</td>";
echo "<td>".$row['precio']."</td>";
echo "<td>".$row['proveedor']."</td>";
echo "<td>".$row['cantidad_inventario']."</td>";
echo "<td><a href=\"edit.php?id=$row[id]\">Editar</a> | <a
href=\"delete.php?id=$row[id]\"
onClick=\"return confirm('Esta seguro de eliminar el
registro?')\">Eliminar</a></td>";
}
?>
</table>
<a href="../login/dashboard.php">volver a menu</a>
</body>
</html>
