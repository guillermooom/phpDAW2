<HTML>
<HEAD><TITLE> EJ7AM</TITLE></HEAD>
<BODY>
<?php
$alumnos = array(	
	"Alumno 1" => array(
		"Progra"=>5,
		"BD"=>3,
		"Entornos"=>7,
		"Lenguaje"=>3
	),
	"Alumno 2" => array(
		"Progra"=>4,
		"BD"=>3,
		"Entornos"=>9,
		"Lenguaje"=>1
	),
	"Alumno 3" => array(
		"Progra"=>5,
		"BD"=>3,
		"Entornos"=>7,
		"Lenguaje"=>2
	),
	"Alumno 4" => array(
		"Progra"=>1,
		"BD"=>7,
		"Entornos"=>9,
		"Lenguaje"=>8
	),
	"Alumno 5" => array(
		"Progra"=>4,
		"BD"=>5,
		"Entornos"=>1,
		"Lenguaje"=>2
	),
	"Alumno 6" => array(
		"Progra"=>8,
		"BD"=>1,
		"Entornos"=>3,
		"Lenguaje"=>8
	),
	"Alumno 7" => array(
		"Progra"=>7,
		"BD"=>6,
		"Entornos"=>8,
		"Lenguaje"=>9
	),
	"Alumno 8" => array(
		"Progra"=>2,
		"BD"=>4,
		"Entornos"=>5,
		"Lenguaje"=>1
	),
	"Alumno 9" => array(
		"Progra"=>7,
		"BD"=>2,
		"Entornos"=>6,
		"Lenguaje"=>9
	),
	"Alumno 10" => array(
		"Progra"=>8,
		"BD"=>1,
		"Entornos"=>6,
		"Lenguaje"=>2
	)
);

//Apartado a
$may=0;
$nb="";
$asig="BD";
foreach($alumnos as $nombre => $detalles)
{ 
    foreach($detalles as $indice => $al)
	{
		if($indice==$asig){
			if($may==$al){
				$nb="$nb , $nombre";
			}
			if($may<$al){
				$may=$al;
				$nb=$nombre;
			}
			
			
		}
			
	}
}
echo "a) $nb tiene la mayor nota en $asig con $may<br>";

//Apartado b
$men=10;
$nb="";
$asig="BD";
foreach($alumnos as $nombre => $detalles)
{ 
    foreach($detalles as $indice => $al)
	{
		if($indice==$asig){
			if($men==$al){
				$nb="$nb , $nombre";
			}
			if($men>$al){
				$men=$al;
				$nb=$nombre;
			}
			
		}
			
	}
}
echo "b) $nb tiene la menor nota en $asig con $men<br>";

//Apartado c
$men=10;
$nb="Alumno 1";
$asig="";
foreach($alumnos as $nombre => $detalles)
{ 
	if($nombre==$nb){
		foreach($detalles as $indice => $al)
		{
			if($men==$al){
				$asig="$asig , $indice";
			}
			if($men>$al){
				$men=$al;
				$asig=$indice;
			}
		
		}
	} 
}
echo "c) $nb tiene la menor nota en $asig con $men<br>";

//Apartado d
$may=0;
$nb="Alumno 1";
$asig="";
foreach($alumnos as $nombre => $detalles)
{ 
	if($nombre==$nb){
		foreach($detalles as $indice => $al)
		{
			if($may==$al){
				$asig="$asig , $indice";
			}
			if($may<$al){
				$may=$al;
				$asig=$indice;
			}
		
		}
	} 
}
echo "d) $nb tiene la menor nota en $asig con $may<br>";

//Apartado e
$pro="Progra";
$medpro=0;

$base="BD";
$medbase=0;

$ento="Entornos";
$medento=0;

$len="Lenguaje";
$medlen=0;

$nb="";
foreach($alumnos as $nombre => $detalles)
{
		foreach($detalles as $indice => $al)
		{
			if($indice==$pro){
				$medpro=$medpro+$al;
			}
			if($indice==$base){
				$medbase=$medbase+$al;
			}
			if($indice==$ento){
				$medento=$medento+$al;
			}
			if($indice==$len){
				$medlen=$medlen+$al;
			}
		}
}

$medpro=$medpro/count($alumnos);
$medbase=$medbase/count($alumnos);
$medento=$medento/count($alumnos);
$medlen=$medlen/count($alumnos);

echo "e) Media $pro : $medpro /
 Media $base : $medbase /
 Media $ento : $medento /
 Media $len : $medlen<br>";
 
 //Apartado f y VISUALIZACION DE ALUMNOS
$nb="";
$suma=0;
foreach($alumnos as $nombre => $detalles)
{
	echo "<h2> $nombre </h2>";
		foreach($detalles as $indice => $al)
		{
			echo "<p> $indice:$al </p>";
			$suma=$suma+$al;
		}
		$suma=$suma/count($detalles);
		$suma=round($suma,2);
		echo "**Media $suma**";
}

?>
</BODY>
</HTML>