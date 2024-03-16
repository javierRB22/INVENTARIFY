<!DOCTYPE html>
<html lang="en">
 <head>
 <meta charset="UTF-8" />
 <meta name="viewport" content="width=device-width, initial-scale=1.0" />
 <title>Bienvenidos</title>
 </head>
 <body>
 <form action="index2.php">
 <input type="submit" value="Submit " /><br />
 </form>
 </body>
</html>

<?php
include_once("config.php");
$result = $dbConn->query("SELECT * FROM ventas ORDER BY id ASC");
?>
<html>
<head>
<title> Listado de ventas</title>
</head>
<body>
<a href="add.html">Adicionar ventas</a><br/><br/>
<table width='80%' border=0>
<tr bgcolor='#CCCCCC'>
<td>fecha_venta</td>
<td>total_ventas</td>

</tr>
<?php 
while($row = $result->fetch(PDO::FETCH_ASSOC)) { 
echo "<tr>";
echo "<td>".$row['fecha_venta']."</td>";
echo "<td>".$row['total_ventas']."</td>";

echo "<td><a href=\"edit.php?id=$row[id]\">Editar</a> | <a 
href=\"delete.php?id=$row[id]\" 
onClick=\"return confirm('Esta seguro de elimar el 
registro?')\">Eliminar</a></td>";
}
?>
</table>

<a href="../login/dashboard.php">volver a menu</a>
</body>
</html>