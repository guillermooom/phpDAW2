<HTML>
<HEAD><TITLE>Resultados</TITLE><meta name="author" content="Guille" />
<style>
a{
		opacity:0.9;
		font-family:calibri;
		padding:10px;
		color:white;
		text-decoration:none;
		background-color:#F47C3C;
		border: 0.5px solid #F47C3C;
		border-radius:5px;
	}
</style>
<BODY>
<h1>RESULTADOS POKER</h1>
<?php
//AVISO
//SI SOLO HACES UNA PAREJA NO LLEVARAS PREMIO, PARA PREMIAR NECESITAS MINIMOS DOBLES PAREJAS
require("funciones.php");

$j_maximos=8;
$j_minimos=4;
$cont_j=0;
$cartas_generadas=4;
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
	}else{
		$bote=$_POST["bote"];
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
	}
}

//BOTON NUEVA TIRADA
echo "<br><br><a href='pokerldv.html'>NUEVA TIRADA</a>";

?>

</BODY>
</HTML>