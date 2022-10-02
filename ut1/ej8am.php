<HTML>
<HEAD><TITLE> EJ8AM</TITLE></HEAD>
<BODY>
<?php
$cont="";
$arr=array(
	array(0,0,0),
	array(0,0,0),
	array(0,0,0)
);
$mul=array(
	array(0,0,0),
	array(0,0,0),
	array(0,0,0)
);
$arr1=array(
	array(2,0,1),
	array(3,0,0),
	array(5,1,1)
);
$arr2=array(
	array(1,0,1),
	array(1,2,1),
	array(1,1,0)
);

/*Mostrado por filas*/
echo "Matriz 1 <br>";
for($i=0;$i<count($arr1);$i++){
	for($j=0;$j<count($arr1[$i]);$j++){
		$cont=$arr1[$i][$j];
		echo "$cont ";
	}
	echo "<br>";
}

echo "<br>";

/*Mostrado por filas*/
echo "Matriz 2 <br>";
for($i=0;$i<count($arr2);$i++){
	for($j=0;$j<count($arr2[$i]);$j++){
		$cont=$arr2[$i][$j];
		echo "$cont ";
	}
	echo "<br>";
}

echo "<br>";

/*Suma por filas*/
echo "Suma de Matriz 1 y Matriz 2<br>";
for($i=0;$i<count($arr);$i++){
	for($j=0;$j<count($arr[$i]);$j++){
		$arr[$i][$j]=$arr1[$i][$j]+$arr2[$i][$j];
		$cont=$arr[$i][$j];
		echo "$cont ";
	}
	echo "<br>";
}

echo "<br>";

/*multiplicacion por filas*/
echo "Producto de Matriz 1 y Matriz 2<br>";
for($i=0;$i<count($mul);$i++){
	for($j=0;$j<count($mul);$j++){
		for($k=0;$k<count($mul);$k++){
			$mul[$i][$j]+=$arr1[$i][$k]*$arr2[$k][$j];
		}
		$cont=$mul[$i][$j];
		echo "$cont ";
	}
	echo "<br>";
}
?>
</BODY>
</HTML>