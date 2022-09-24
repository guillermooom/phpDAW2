<HTML>
<HEAD><TITLE> EJ5B – Tabla Multiplicar con TD</TITLE></HEAD>
<style>
table,tr,th{
	border: 1px solid black;
	border-collapse:collapse;
	width:200px;
	text-align:left;
}
</style>
<BODY>
<?php
$num="8";
$cont="1";
$res;

echo "<table>";
while($cont!=11){
	echo "<tr>";
	$res= $cont * $num;
	echo "<th>$num x $cont</th>";
	echo "<th>$res</th>";
	$cont++;
	echo "</tr>";
}
echo "</table>";
?>
</BODY>
</HTML>