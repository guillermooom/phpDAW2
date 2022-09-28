<HTML>
<HEAD><TITLE> EJ5A</TITLE></HEAD>
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
<!-- APARTADO a -->
<?php
echo"<h3>a.-</h3>";
$arr1=array("Bases Datos","Entornos Desarrollo","Programacion");
$arr2=array("Sistemas Informaticos","FOL","Mecanizado");
$arr3=array("Desarrollo Web ES","Desarrollo Web EC","Despliegue","Desarrollo Interfaces","Inglés");
$arr=array();


$long1=count($arr1);
$long2=count($arr2);
$long3=count($arr3);

for($i=0;$i<$long1;$i++){
	$arr[$i]=$arr1[$i];	
}

for($i=0;$i<$long2;$i++){
	$arr[($i+$long1)]=$arr2[$i];	
}

for($i=0;$i<$long3;$i++){
	$arr[($i+$long2+$long1)]=$arr3[$i];	
}

$long=count($arr);
for($i=0;$i<$long;$i++){
	echo $arr[$i];
	echo "<br>";
}
?>
<!-- APARTADO b -->
<?php
echo"<h3>b.-</h3>";
$arr1=array("Bases Datos","Entornos Desarrollo","Programacion");
$arr2=array("Sistemas Informaticos","FOL","Mecanizado");
$arr3=array("Desarrollo Web ES","Desarrollo Web EC","Despliegue","Desarrollo Interfaces","Inglés");

print_r(array_merge($arr1,$arr2,$arr3));

?>
<!-- APARTADO c -->
<?php
echo"<h3>c.-</h3>";
$arr1=array("Bases Datos","Entornos Desarrollo","Programacion");
$arr2=array("Sistemas Informaticos","FOL","Mecanizado");
$arr3=array("Desarrollo Web ES","Desarrollo Web EC","Despliegue","Desarrollo Interfaces","Inglés");
$arr=array();

$long1=count($arr1);
$long2=count($arr2);
$long3=count($arr3);


for($i=0;$i<$long1;$i++){
	array_push($arr,$arr1[$i]);
}

for($i=0;$i<$long2;$i++){
	array_push($arr,$arr2[$i]);
}

for($i=0;$i<$long3;$i++){
	array_push($arr,$arr3[$i]);
}

print_r($arr);

?>
</BODY>
</HTML>