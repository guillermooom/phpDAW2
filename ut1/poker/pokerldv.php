<HTML>
<HEAD><TITLE>Resultados</TITLE><meta name="author" content="Guille" />
<style>
*{
	margin:5;
}
a{
		opacity:0.9;
		font-family:calibri;
		padding:10px;
		color:white;
		text-decoration:none;
		border: 0.5px solid #F47C3C;
		width: 100px;
		border-color:black;
		border-radius: 10px;
		background-color:rgb(114, 113, 113);
		color:white;
}
table{
	width:500px;
	height:400px;
	border:solid 3px green;
	border-radius: 10px;
}

</style>
<BODY>
<h1>RESULTADOS POKER</h1>
<?php
//AVISO
//SI SOLO HACES UNA PAREJA NO LLEVARAS PREMIO, PARA PREMIAR NECESITAS MINIMOS DOBLES PAREJAS
require("pokerldv_fun.php");

$j_maximos=8;
$j_minimos=4;
$cont_j=0;
$cartas_generadas=4;
$bote_min=10;
$jugadores=array();
$nb;

//Nombre de las imagenes de cartas
$cartas=array(  "1C1","1C2","1D1","1D2","1P1","1P2","1T1","1T2",
				"JC1","JC2","JD1","JD2","JP1","JP2","JT1","JT2",
				"QC1","QC2","QD1","QD2","QP1","QP2","QT1","QT2",
				"KC1","KC2","KD1","KD2","KP1","KP2","KT1","KT2");

if ($_SERVER["REQUEST_METHOD"]== "POST"){
	
	//COMPROBAMOS QUE EXISTA UN BOTE
	if(empty($_POST["bote"])){
		echo "<h3>NO HA BOTE PARA EMPEZAR A JUGAR</h3>";
	}
	else{
		//COMPROBAR BOTE VALIDO
		$bote=validar_bote($_POST["bote"]);
		if(is_numeric($bote)){
			//COMPROBAMOS QUE EL BOTE ES MINIMO 1€
			if($bote>=$bote_min){
				
				//CONTAMOS EL NUMERO DE JUGADORES
				for($i=0;$i<$j_maximos;$i++){
					if(!empty($_POST["nombre$i"])){
						$cont_j++;
						
						//GENERAMOS UN RANDOM DE CARTAS
						$dev=generar_cartas($cartas,$cartas_generadas);
						
						//SI EXISTE EL JUGADOR LO METEMOS EN UN ARRAY DE JUGADORES
						$nb=[limpia($_POST["nombre$i"]) => $dev];
						$jugadores[$cont_j]=$nb;
					}
				}
				
				//COMPROBAMOS QUE LOS JUGADORES SON MAYORES QUE EL MINIMO
				if($cont_j<$j_minimos){
					echo "<h3>NO HAY SUFICIENTES JUGADORES PARA JUGAR</h3>";
				}else{
					//VEMOS JUGADORES Y SUS CARTAS
					cartas_jugadores($jugadores,$cartas_generadas);

					echo "<br>";

					//MOSTRAMOS LOS RESULTADOS
					comparar_cartas($jugadores,$cartas_generadas,$bote);
				}
			}else{
				echo "<h3>EL BOTE MINIMO PARA EMPEZAR A JUGAR ES $bote_min €</h3>";
			}	
		}else{
			echo "<h3>BOTE NO VALIDO</h3>";
		}
	}
}

//BOTON NUEVA TIRADA
echo "<br><br><a href='pokerldv.html'>NUEVA TIRADA</a>";

?>

</BODY>
</HTML>