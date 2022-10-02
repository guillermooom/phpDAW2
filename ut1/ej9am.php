<HTML>
<HEAD><TITLE> EJ9AM</TITLE></HEAD>
<BODY>
<?php
$cont="";
$copia=array(
	array(0,0,0,0),
	array(0,0,0,0),
	array(0,0,0,0)
);

$arr=array(
	array(2,0,1),
	array(3,0,0),
	array(5,1,1),
	array(4,9,4)
);

/*Rellenado por columnas*/
for($i=0;$i<count($arr[0]);$i++){
	for($j=0;$j<count($arr);$j++){
		$copia[$i][$j]=$arr[$j][$i];
	}
}

/*Mostrado por filas arr*/
echo "Array 3x4 <br>";
for($i=0;$i<count($arr);$i++){
	for($j=0;$j<count($arr[$i]);$j++){
		$cont=$arr[$i][$j];
		echo "$cont ";
	}
	echo "<br>";
}

echo "<br>";

/*Mostrado por filas copia*/
echo "Array anterior cambiado a 4x3 <br>";
for($i=0;$i<count($copia);$i++){
	for($j=0;$j<count($copia[$i]);$j++){
		$cont=$copia[$i][$j];
		echo "$cont ";
	}
	echo "<br>";
}
?>
</BODY>
</HTML>