<HTML>
<HEAD><TITLE> BINGO</TITLE></HEAD>
<BODY>
<?php
/* HECHO POR GUILLE */
$gan=60;
$jug=0;
$cart=0;

// Metemos el array en un variable y lo mezclamos
echo "<br>BOLAS<br>";
$arr=arr_bolas();
ver_arr($arr);

// JUGADOR 1
echo "<br>JUGADOR 1<br>";

//carton 1
$carton=carton();
ver_carton($carton);
echo "<br>";
echo "<br>";
//ganador
$j1=ganador($carton,$arr);
if($j1<$gan){
	$gan=$j1;
	$jug=1;
	$cart=1;
}


//carton 2
$carton=carton();
ver_carton($carton);
echo "<br>";
echo "<br>";
//ganador
$j1=ganador($carton,$arr);
if($j1<$gan){
	$gan=$j1;
	$jug=1;
	$cart=2;
}


//carton 3
$carton=carton();
ver_carton($carton);
echo "<br>";
echo "<br>";
//ganador
$j1=ganador($carton,$arr);
if($j1<$gan){
	$gan=$j1;
	$jug=1;
	$cart=3;
}



//JUGADOR 2
echo "<br>JUGADOR 2<br>";

//carton 1
$carton=carton();
ver_carton($carton);
echo "<br>";
echo "<br>";
//ultima pos
$j2=ganador($carton,$arr);
if($j2<$gan){
	$gan=$j2;
	$jug=2;
	$cart=1;
}


//carton 2
$carton=carton();
ver_carton($carton);
echo "<br>";
echo "<br>";
//ultima pos
$j2=ganador($carton,$arr);
if($j2<$gan){
	$gan=$j2;
	$jug=2;
	$cart=2;
}


//carton 3
$carton=carton();
ver_carton($carton);
echo "<br>";
echo "<br>";
//ultima pos
$j2=ganador($carton,$arr);
if($j2<$gan){
	$gan=$j2;
	$jug=2;
	$cart=3;
}


//JUGADOR 3
echo "<br>JUGADOR 3<br>";

//carton 1
$carton=carton();
ver_carton($carton);
echo "<br>";
echo "<br>";
//ultima pos
$j3=ganador($carton,$arr);
if($j3<$gan){
	$gan=$j3;
	$jug=3;
	$cart=1;
}


//carton 2
$carton=carton();
ver_carton($carton);
echo "<br>";
echo "<br>";
//ultima pos
$j3=ganador($carton,$arr);
if($j3<$gan){
	$gan=$j3;
	$jug=3;
	$cart=2;
}


//carton 3
$carton=carton();
ver_carton($carton);
echo "<br>";
echo "<br>";
//ultima pos
$j3=ganador($carton,$arr);
if($j3<$gan){
	$gan=$j3;
	$jug=3;
	$cart=3;
}


//JUGADOR 4
echo "<br>JUGADOR 4<br>";

//carton 1
$carton=carton();
ver_carton($carton);
echo "<br>";
echo "<br>";
//ganador
$j4=ganador($carton,$arr);
if($j4<$gan){
	$gan=$j4;
	$jug=4;
	$cart=1;
}


//carton 2
$carton=carton();
ver_carton($carton);
echo "<br>";
echo "<br>";
//ganador
$j4=ganador($carton,$arr);
if($j4<$gan){
	$gan=$j4;
	$jug=4;
	$cart=2;
}


//carton 3
$carton=carton();
ver_carton($carton);
echo "<br>";
echo "<br>";
//ganador
$j4=ganador($carton,$arr);
if($j4<$gan){
	$gan=$j4;
	$jug=4;
	$cart=3;
}


//BINGO

echo "<br>!BINGO del Jugador $jug en el carton $cart"; 



//crear array
function arr_bolas(){
	$bolas=array();
	for($i=0;$i<60;$i++){
		$bolas[$i]=($i+1);
	}
	shuffle($bolas);
	return $bolas;
}

//mostramos el array
function ver_arr($ver){
	for($i=0;$i<count($ver);$i++){
		echo "$ver[$i]<br>";
	}
}

//crear carton
function carton(){
	$car=array();
	$num=0;
	$cont=0;
	while($cont<15){
		$num=rand(1,60);
		if(!in_array($num,$car)){
			array_push ($car,$num);
			$cont++;
		}
	}
	sort($car);
	return $car;
}

//mostramos el carton
function ver_carton($ver){
	for($i=0;$i<count($ver);$i++){
		echo "$ver[$i] ";
	}
}

//ultima posicion
function ulti_pos($ver){
	$pos=0;
	for($i=0;$i<count($ver);$i++){
		$pos=$ver[count($ver)-1];
	}
	return $pos;
}

//comprobar carton
function ganador($carton,$bolas){
	$cont=0;
	$rep=0;
	while($cont!=15){
		for($i=0;$i<count($bolas);$i++){
			for($j=0;$j<count($carton);$j++){
				if($carton[$j]==$bolas[$i]){
					$cont++;
				}
			}
			if($cont!=15){
				$rep++;
			}
		}
	}
	return $rep;
}

?>
</BODY>
</HTML>