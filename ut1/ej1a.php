<HTML>
<HEAD><TITLE> EJ1A</TITLE></HEAD>
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
	echo "<th>Valor</th>";
	echo "<th>Suma</th>";
echo "</tr>";

$arr=array();
$suma=0;
$long=20;
$num=0;
$i=0;

while($i<=$long){
	if($num%2!=0){
		$arr[$i]=$num;
		$suma=$suma+$arr[$i];
		echo "<tr>";
		echo "<td>$i</td>";
		echo "<td>$arr[$i]</td>";
		echo "<td>$suma</td>";
		echo "</tr>";
		$i++;
	}
	$num++;
}

echo "</table>";


?>
</BODY>
</HTML>