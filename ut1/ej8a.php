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
$arr=array("Raul"=>4, "Maria"=>7,"Cristina"=>9,"Jaime"=>6,"Alex"=>2);

foreach ($arr as $nb => $nota) {
	asort($arr);
}

$cont=1;
foreach ($arr as $nb => $edad) {
	if($cont==1){
		echo "Menor Nota<br>Nombre: $nb / Nota: $edad<br>";
	}
	$cont++;
}

/* APARTADO b */
echo"<h3>b.-</h3>";

foreach ($arr as $nb => $nota) {
	arsort($arr);
}

$cont=1;
foreach ($arr as $nb => $edad) {
	if($cont==1){
		echo "Mayor Nota<br>Nombre: $nb / Nota: $edad<br>";
	}
	$cont++;
}

/* APARTADO c */
echo"<h3>c.-</h3>";
$med=0;

foreach ($arr as $nb => $nota) {
	$med+=$nota;
}

$long=count($arr);
$med=$med/$long;
echo"Media de Notas: $med";

?>
</BODY>
</HTML>