<HTML>
<HEAD><TITLE> EJ2AM</TITLE></HEAD>
<style>
table,td{
	border: 1px solid black;
	border-collapse:collapse;
	text-align:center;
	width:150px;
}

</style>
<BODY>
<?php
$cont="";
$res=0;
$arr=[[2,4,6],
	[8,10,12],
	[14,16,18]];
	
$col=[0,0,0];
$row=[0,0,0];
echo "<table>";
for($i=0;$i<count($arr);$i++){
	echo "<tr>";
	for($j=0;$j<count($arr[$i]);$j++){
		$cont=$arr[$i][$j];
		$res+=$cont;
		echo "<td>$cont</td>";
		$row[$i]+=$arr[1][$i];
	}
	$col[$i]=$res;
	$res=0;
}
echo "</table>";

echo "<br>";

echo "Suma por Filas: <table>";
for($i=0;$i<count($col);$i++){
	echo "<tr>";
	echo "<td>$col[$i]</td>";
}
echo "</table>";

echo "<br>";

echo "Suma por Columnas: <table>";
	echo "<tr>";
for($i=0;$i<count($row);$i++){
	echo "<td>$row[$i]</td>";
}
echo "</table>";
?>
</BODY>
</HTML>