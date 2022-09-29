<HTML>
<HEAD><TITLE> EJ6AM</TITLE></HEAD>
<BODY>
<?php
$cont="";
$arr=array(
	array(0,0,0),
	array(0,0,0),
	array(0,0,0)
);
$maxarr=array(0,0,0);
$media=array(0,0,0);

for($i=0;$i<count($arr);$i++){
	for($j=0;$j<count($arr[$i]);$j++){
		$arr[$i][$j]=random_int(0,50);
	}
}

/*Valor maximo por cada fila*/
$max=0;
for($i=0;$i<count($arr);$i++){
	for($j=0;$j<count($arr[$i]);$j++){
		if($max<$arr[$i][$j]){
			$max=$arr[$i][$j];
		}
	}
	$maxarr[$i]=$max;
	$max=0;
}

/*Media por cada fila*/
$med=0;
for($i=0;$i<count($arr);$i++){
	for($j=0;$j<count($arr[$i]);$j++){
		$med=$med+$arr[$i][$j];
	}
	$med=$med/count($arr);
	$media[$i]=round($med);
	$med=0;
}

/* ver Array*/
echo "Array: <br>";
for($i=0;$i<count($arr);$i++){
	for($j=0;$j<count($arr[$i]);$j++){
		$cont=$arr[$i][$j];
		echo " $cont ";
	}
	echo "<br>";
}

/*ver Array maximo valor*/
echo "<br>Valores Maximos<br>";
for($i=0;$i<count($maxarr);$i++){
		$cont=$maxarr[$i];
		echo " $cont ";
}

/*ver Array media*/
echo "<br><br>Media<br>";
for($i=0;$i<count($media);$i++){
		$cont=$media[$i];
		echo " $cont ";
}
?>
</BODY>
</HTML>