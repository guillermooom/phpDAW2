<?php
//LIMPIA CARACTERES RAROS
function limpia($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
}

//GENERACION DE CARTAS RANDOM
function generar_cartas($c,$n){
	$dev=array();
	$i=-1;
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
	foreach($j as $nb) {
		foreach($nb as $pack => $car) {
			echo $pack;
			for($i=0;$i<$c;$i++){
				echo "<img src='./images/$car[$i].PNG' width='50px'>";
			}
			echo "<br>";
		}
	}
}

//COMPARAR CARTAS Y VER GANADORES
function comparar_cartas($j,$c,$premio){
	$nombre;
	$gan;
	$may=0;
	$banca=true;
	foreach($j as $nb) {
		foreach($nb as $pack => $car) {
			$nombre=$pack;
			
			//ORDENAMOS EL ARRAY
			asort($car);
			
			//LLAMAMOS A LA FUNCION COMPARAR
			$res=cartas_contadas($car,$c);
			if($res>$may){
				$may=$res;
				$gan=$nombre;
			}
		}
	}
	switch($may){
				case 4:
				echo "GANADOR $gan REALIZANDO UN Poker LLEVANDOSE $premio €";
				$banca=false;
				break;
				
				case 3:
				$premio=$premio*0.7;
				echo "GANADOR $gan REALIZANDO UN Trio LLEVANDOSE $premio €";
				$banca=false;
				break;
				
				case 2:
				$premio=$premio*0.5;
				echo "GANADOR $gan REALIZANDO UN Dobles Parejas LLEVANDOSE $premio €";
				$banca=false;
				break;
				
				
			}
	if($banca==true){
		echo "GANA LA BANCA";
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
	$letras=array("1","K","Q","J");
	
	for($i=0;$i<count($letras);$i++){
		$res=comparacion($car,$c,$letras[$i]);
		if($res==4){
			return 4;
		}
		if($res==3){
			return 3;
		}
		if(substr($car[0],0,1)==substr($car[1],0,1) && substr($car[2],0,1)==substr($car[3],0,1)){
			return 2;
		}
	}
	
}
?>