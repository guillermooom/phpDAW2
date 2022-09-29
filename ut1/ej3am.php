<HTML>
<HEAD><TITLE> EJ3AM</TITLE></HEAD>
<BODY>
<?php
$cont="";
$res=0;
$arr=[[1,2,3],
	[4,5,6],
	[7,8,9],
	[10,11,12],
	[13,14,15]];
	
/*Mostrado por filas*/
for($i=0;$i<count($arr);$i++){
	for($j=0;$j<count($arr[$i]);$j++){
		$cont=$arr[$i][$j];
		echo "($i,$j) = $cont / ";
	}
}

echo "<br>";
echo "<br>";

/*Mostrado por columnas*/

for($i=0;$i<count($arr[0]);$i++){
	for($j=0;$j<count($arr);$j++){
		$cont=$arr[$j][$i];
		echo "($j,$i) = $cont / ";
	}
}
?>
</BODY>
</HTML>