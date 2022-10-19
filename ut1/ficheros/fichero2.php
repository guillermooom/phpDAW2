<HTML>
<HEAD><TITLE>v </TITLE></HEAD>
<BODY>
<?php
$nb=limpia($_POST["nb"]);
$ap1=limpia($_POST["ap1"]);
$ap2=limpia($_POST["ap2"]);
$nacim=limpia($_POST["f_nac"]);
$locali=limpia($_POST["loca"]);

$myfile = fopen("alumnos2.txt","a"); //creamos el fihero
//fwrite($myfile,""); //limpiamos el interior

escribir($nb,$myfile);
escribir($ap1,$myfile);
escribir($ap2,$myfile);
escribir($nacim,$myfile);
escribir_u($locali,$myfile);
fwrite($myfile,PHP_EOL);

function limpia($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function escribir ($dato,$fiche){
	$long=strlen($dato)+2;
	$escri=str_pad($dato,$long,"#",STR_PAD_RIGHT);
	fwrite($fiche,$escri);
}
function escribir_u($dato,$fiche){
	fwrite($fiche,$dato);
}

?>
</BODY>
</HTML>