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
$arr=array(20);
$cont=20;
$suma=0;

echo "<table>";
echo "<tr>";
	echo "<th>Indice</th>";
	echo "<th>Valor</th>";
	echo "<th>Suma</th>";
echo "</tr>";

$indice=0;

//rellenamos el array
for($i=1;$indice<=$cont;$i++){ //EMPEZAMOS DESDE EL 1 PERO TAMBIEN SIRVE EMPEZAR DESDE EL 0
	if(primos($i)){
		$arr[$indice]=$i;//le metemos en la posicion del contador ya que $i es el numero primo
		$indice++;
	}
}

$long=count($arr)-1;

for($i=0;$i<=$long;$i++){
	$suma=$suma+$arr[$i];
	echo "<tr>";
	echo "<td>$i</td>";
	echo "<td>$arr[$i]</td>";
	echo "<td>$suma</td>";
	echo "</tr>";
}

echo "</table>";


//Funcion para calcular si es primo
function primos($num){
$primo=true;
$indice=2;
    while($primo && $indice<=($num/2)){
        if($num%$indice==0){
            $primo=false;
        }
        $indice++;
    }
	return $primo;
}

?>
</BODY>
</HTML>