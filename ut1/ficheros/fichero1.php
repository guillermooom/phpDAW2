<HTML>
<HEAD><TITLE> Fichero 1 </TITLE></HEAD>
<BODY>
<?php
$nb=limpia($_POST["nb"]);
$ap1=limpia($_POST["ap1"]);
$ap2=limpia($_POST["ap2"]);
$f_nac=limpia($_POST["f_nac"]);
$locali=limpia($_POST["loca"]);

$myfile = fopen("alumnos1.txt","w"); //creamos el fihero
//fwrite($myfile,""); //limpiamos el interior

escribir($nb,20,$myfile);
escribir($ap1,20,$myfile);
escribir($ap2,21,$myfile);
escribir($f_nac,9,$myfile);
escribir($locali,26,$myfile);
fwrite($myfile,PHP_EOL);

function limpia($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function escribir ($dato,$long,$fiche){
	$escri=str_pad($dato,$long," ",STR_PAD_RIGHT);
	fwrite($fiche,$escri);
}

?>
</BODY>
</HTML>