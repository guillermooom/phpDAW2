<HTML>
<HEAD><TITLE> EJ4AM</TITLE></HEAD>
<BODY>
<?php
$cont="";
$res=0;
$arr=[[1,2,3],
	[7,16,15],
	[13,8,9],
	[10,11,12],
	[4,5,20]];
	
/*Mostrado por filas*/
$may=0;
for($i=0;$i<count($arr);$i++){
	for($j=0;$j<count($arr[$i]);$j++){
		$cont=$arr[$i][$j];
		if($cont>$may){
			$may=$cont;
		}
		echo "($i,$j) = $cont / ";
	}
	echo "Elemento mayor: $may <br>";
	$may=0;
}

echo "<br>";
echo "<br>";

/*Mostrado por columnas*/
$may=0;
for($i=0;$i<count($arr[0]);$i++){
	for($j=0;$j<count($arr);$j++){
		$cont=$arr[$j][$i];
		if($cont>$may){
			$may=$cont;
		}
		echo "($j,$i) = $cont / ";
	}
	echo "Elemento mayor: $may <br>";
	$may=0;
}
?>
</BODY>
</HTML>
