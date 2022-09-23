<HTML>
<HEAD><TITLE> EJ2-Conversion IP Decimal a Binario Sin printf </TITLE></HEAD>
<BODY>
<?php
echo "<h1>2.-</h1>";
$ip="192.18.16.204";

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


echo("Ip $ip en binario es: " .
str_pad(decbin($oct1),8,"0",STR_PAD_LEFT).".".
str_pad(decbin($oct2),8,"0",STR_PAD_LEFT).".".
str_pad(decbin($oct3),8,"0",STR_PAD_LEFT).".".
str_pad(decbin($oct4),8,"0",STR_PAD_LEFT));
?>

</BODY>
</HTML>
