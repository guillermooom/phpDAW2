<HTML>
<HEAD><TITLE> EJ1-Conversion IP Decimal a Binario </TITLE></HEAD>
<BODY>
<?php
echo "<h1>3.-</h1>";
$ip="192.18.16.100/16";

//SACAMOS LA POSICION DE / Y EL NUMERO Q VA DESPUES
$bar=strpos($ip,"/",0);
$cont=substr($ip,($bar+1),strlen($ip));



//PASAR TODO A BINARIO
$p1 =strpos($ip,".",0); // busca en la ip, un punto, desde la posicion 0
$p2 =strpos($ip,".",($p1+1));
$p3 =strpos($ip,".",($p2+1));
//PRIMER OCTETO
$oct1= substr($ip,0,$p1);	//SACMOS EL CONTENIDO DEL PRIMER OCTETO

//SEGUNDO OCTETO
$oct2= substr($ip,($p1+1),($p2-$p1));


//TERCER OCTETO
$oct3= substr($ip,($p2+1),($p3-$p2));


//CUARTO OCTETO
$oct4= substr($ip,($p3+1),$p3);

//IP TODA JUNTA EN BINARIO
$bin=(str_pad(decbin($oct1),8,"0",STR_PAD_LEFT).
str_pad(decbin($oct2),8,"0",STR_PAD_LEFT).
str_pad(decbin($oct3),8,"0",STR_PAD_LEFT).
str_pad(decbin($oct4),8,"0",STR_PAD_LEFT));

$normal=substr($bin,0,$cont);
$nuevo=substr($bin,$cont,strlen($bin));


//REMPLAZAR Y PONER NUEVA IP
$cambio1= str_replace(1,0,$nuevo);//NUMERO,NUEVO NUMERO,CADENA
$nueva_ip="$normal$cambio1";


//DIRECCION DE RED
$poner_normal=bindec(substr($nueva_ip,0,8)).".".
bindec(substr($nueva_ip,8,8)).".".
bindec(substr($nueva_ip,16,8)).".".
bindec(substr($nueva_ip,24,8));


//DIRECCION DE BROADCAST
//REMPLAZAR Y PONER NUEVA IP
$cambio2= str_replace(0,1,$nuevo);//NUMERO,NUEVO NUMERO,CADENA
$nueva_ip2="$normal$cambio2";


$broadcast=bindec(substr($nueva_ip2,0,8)).".".
bindec(substr($nueva_ip2,8,8)).".".
bindec(substr($nueva_ip2,16,8)).".".
bindec(substr($nueva_ip2,24,8));


//RANGO
$rred=bindec(substr($nueva_ip,0,8)).".".
bindec(substr($nueva_ip,8,8)).".".
bindec(substr($nueva_ip,16,8)).".".
(bindec(substr($nueva_ip,24,8))+1);


$rbro=bindec(substr($nueva_ip2,0,8)).".".
bindec(substr($nueva_ip2,8,8)).".".
bindec(substr($nueva_ip2,16,8)).".".
(bindec(substr($nueva_ip2,24,8))-1);

//RESULTADO
echo "<br>IP $ip<br>";
echo "Mascara $cont<br>";
echo "DIR RED: $poner_normal<br>";
echo "Broadcast: $broadcast<br>";
echo "RANGO: $rred - $rbro<br>";

?>
</BODY>
</HTML>
