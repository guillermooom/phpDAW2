<HTML>
<HEAD><TITLE> EJ3A</TITLE></HEAD>
<style>
table,td{
	border: 1px solid black;
	border-collapse:collapse;
	text-align:left;
}
table,th{
	border: 1px solid black;
	width:300px;
	text-align:center;
}
</style>
<BODY>
<?php
echo "<table>";
echo "<tr>";
	echo "<th>Indice</th>";
	echo "<th>Binario</th>";
	echo "<th>Octal</th>";
echo "</tr>";

$bin=array();
$oct=array();
$suma=0;
$long=20;
$i=0;

while($i<=$long){
		$bin[$i]=decbin($i);
		$oct[$i]=decoct($i);
		echo "<tr>";
		echo "<td>$i</td>";
		echo "<td>$bin[$i]</td>";
		echo "<td>$oct[$i]</td>";
		echo "</tr>";
		$i++;
}

echo "</table>";


?>
</BODY>
</HTML>