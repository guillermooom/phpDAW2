<?php
//LIMPIA CARACTERES RAROS
function limpia($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
}

//COMPROBAR BUTE BIEN ESCRITO
function validar_bote($b){
	$b=str_replace(",",".",$b);
	return $b;
}

//GENERACION DE CARTAS RANDOM
function generar_cartas($c,$n){
	$dev=array();
	$i=0;
	while($i<$n){	//HASTA QUE TODAS LAS CARTAS ESTEN BIEN RELLENADAS
		$g=rand(1,(count($c)-1));
		
		//VERIFICAMOS QUE LA CARTA NO EST REPARTIDA AUN
		if(strcmp($c[$g],""!=0)){
			$dev[$i]=$c[$g];
			$c[$g]="";
			$i++;
		}
		
		//SI ESTA REPARTIDA SE GENERA OTRA NUEVA CARTA
		else{
			$g=rand(1,(count($c)-1));
		}
	}
	return $dev;
}

//VEMOS LSA CARTAS DE MANERA RANDOM
function ver_cartas($c){
	for($i=0;$i<count($c);$i++){
		echo "<img src='./images/$c[$i].PNG' width='50px'>";
	}
}

//VER JUGADORES Y SUS RESPECTIVSA CARTAS
function cartas_jugadores($j,$c){
	echo "<table>";
	foreach($j as $nb) {
		foreach($nb as $pack => $car) {
			echo "<tr>";
			echo "<th>$pack</th>";
			for($i=0;$i<$c;$i++){
				echo "<td><img src='./images/$car[$i].PNG' width='50px'></td>";
			}
			echo "</tr>";
		}
	}
	echo "</table>";
}

//COMPARAR CARTAS Y VER GANADORES
function comparar_cartas($j,$c,$premio){
	$nombre;
	$varios_g="";
	$gan;
	$may=0;
	foreach($j as $nb) {
		foreach($nb as $pack => $car) {
			$nombre=$pack;
			
			//ORDENAMOS EL ARRAY
			asort($car);
			//var_dump($car);
			
			//LLAMAMOS A LA FUNCION COMPARAR
			$res=cartas_contadas($car,$c);
			if($res==$may){
				$varios_g=$varios_g." ,".$nombre;
			}
			if($res>$may){
				$may=$res;
				$varios_g=$nombre;
			}
		}
	}
	switch($may){
				case 4:
				echo "GANADOR <b>$varios_g</b> REALIZANDO UN <b>Poker</b> LLEVANDOSE <b>$premio €</b>";
				break;
				
				case 3:
				$premio=$premio*0.7;
				echo "GANADOR <b>$varios_g</b> REALIZANDO UN <b>Trio</b> LLEVANDOSE <b>$premio €</b>";
				break;
				
				case 2:
				$premio=$premio*0.5;
				echo "GANADOR <b>$varios_g</b> REALIZANDO UN <b>Dobles Parejas</b> LLEVANDOSE <b>$premio €</b>";
				break;
				
				default:
				echo "GANADOR/ES <b>$varios_g</b> REALIZANDO UNA <b>Pareja SIN PREMIO</b>";
				break;
				
			}
}

//COMPARAR CARTAS SEPARADAS
function comparacion($arr,$c,$l){
	$cont=0;
	for($i=0;$i<$c;$i++){
		if(substr($arr[$i],0,1)==$l){
			$cont++;
		}
	}
	
	return $cont++;
}

//VER EL RESULTADO DE DICHO JUGADOR
function cartas_contadas($car,$c){
	$letras=array("1","K","J","Q");
	$ca=array();
	$resultado=array_merge($ca,$car);
	
	for($i=0;$i<count($letras);$i++){
		$res=comparacion($car,$c,$letras[$i]);
		if($res==4){
			return 4;
		}
		if($res==3){
			return 3;
		}
		if($res==2){
			return 1;
		}
		if(substr($resultado[0],0,1)==substr($resultado[1],0,1) && substr($resultado[2],0,1)==substr($resultado[3],0,1)){
			return 2;
		}
	}
	
}
?>