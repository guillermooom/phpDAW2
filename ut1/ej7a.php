<HTML>
<HEAD><TITLE> EJ7A</TITLE></HEAD>
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
/* APARTADO a */
echo"<h3>a.-</h3>";
$arr=array("Raul"=>10, "Maria"=>20,"Cristina"=>15,"Jaime"=>7,"Alex"=>2);

foreach ($arr as $nb => $edad) {
    echo "Nombre: $nb / Edad: $edad<br>";
}

/* APARTADO b */
echo"<h3>b.-</h3>";
$cont=1;
foreach ($arr as $nb => $edad) {
	if($cont==2){
		echo "Nombre: $nb / Edad: $edad<br>";
	}
    $cont++;
}

/* APARTADO c */
echo"<h3>c.-</h3>";
$cont=1;
foreach ($arr as $nb => $edad) {
	if($cont==3){
		echo "Nombre: $nb / Edad: $edad<br>";
	}
    $cont++;
}

/* APARTADO d */
echo"<h3>d.-</h3>";
$cont=1;
$long=count($arr);
foreach ($arr as $nb => $edad) {
	if($cont==$long){
		echo "Nombre: $nb / Edad: $edad<br>";
	}
    $cont++;
}

/* APARTADO e */
echo"<h3>e.-</h3>";
$cont=1;
$long=count($arr);
foreach ($arr as $nb => $edad) {
	asort($arr);
}

foreach ($arr as $nb => $edad) {
	if($cont==1 || $cont==$long){
		echo "Nombre: $nb / Edad: $edad<br>";
	}
	$cont++;
}
?>
</BODY>
</HTML>