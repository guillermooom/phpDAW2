<HTML>
<HEAD><TITLE> EJ4A</TITLE></HEAD>
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
	echo "<th>Binario Reves</th>";
echo "</tr>";

$bin=array();
$oct=array();
$resves=array();
$suma=0;
$long=20;
$rev=$long;
$i=0;

while($i<=$long){
		$bin[$i]=decbin($i);
		$oct[$i]=decoct($i);
		$i++;
}
$i=0;
while($i<=$long){
		$reves[$i]=$bin[$rev];
		echo "<tr>";
		echo "<td>$i</td>";
		echo "<td>$bin[$i]</td>";
		echo "<td>$oct[$i]</td>";
		echo "<td>$reves[$i]</td>";
		echo "</tr>";
		$i++;
		$rev--;
}

echo "</table>";


?>
</BODY>
</HTML>