<HTML>
<HEAD><TITLE> EJ1-Conversion IP Decimal a Binario </TITLE></HEAD>
<BODY>
<?php
echo "<h1>1.-</h1>";

$ip="192.18.16.204";

$p1 =strpos($ip,".",0); // busca en la ip, un punto, desde la posicion 0
$p2 =strpos($ip,".",($p1+1));
$p3 =strpos($ip,".",($p2+1));

printf("Ip $ip en binario es %08b.%08b.%08b.%08b <br>",
substr($ip,0,$p1),
substr($ip,($p1+1),($p2-$p1)),
substr($ip,($p2+1),($p3-$p2)),
substr($ip,($p3+1),$p3));

?>
<br>
<?php
echo "<h1>2.-</h1>";
$ip="192.18.16.204";

$p1 =strpos($ip,".",0); // busca en la ip, un punto, desde la posicion 0
$p2 =strpos($ip,".",($p1+1));
$p3 =strpos($ip,".",($p2+1));

//PRIMER OCTETO
$oct1= substr($ip,0,$p1);	//SACMOS EL CONTENIDO DEL PRIMER OCTETO
$bin1 = decbin($oct1);		//PASAMOS EL CONTENIDO DEL ANTERIOR A BINARIO
$bin1 = substr("00000000",0,8 - strlen($bin1)) .$bin1;	//LE DAMOS FORMATO DE TODO 0 DESDE LA POSICION 0 HASTA LA 8 Y DEPUES LE PONEMOS EL RESULTADO DE NUEBO (X ESO ESTA AL FINAL .bin1)

//SEGUNDO OCTETO
$oct2= substr($ip,($p1+1),($p2-$p1));
$bin2 = decbin($oct2);
$bin2 = substr("00000000",0,8 - strlen($bin2)) . $bin2;

//TERCER OCTETO
$oct3= substr($ip,($p2+1),($p3-$p2));
$bin3 = decbin($oct3);
$bin3 = substr("00000000",0,8 - strlen($bin3)) . $bin3;

//CUARTO OCTETO
$oct4= substr($ip,($p3+1),$p3);
$bin4 = decbin($oct4);
$bin4 = substr("00000000",0,8 - strlen($bin4)) . $bin4;

echo("Ip $ip en binario es: $bin1.$bin2.$bin3.$bin4 ");

?>
<br>
<?php
echo "<h1>3.-</h1>";
$ip="192.18.16.100/16";

//SACAMOS LA POSICION DE / Y EL NUMERO Q VA DESPUES
$bar=strpos($ip,"/",0);
$cont=substr($ip,($bar+1),strlen($ip));
echo $cont;
?>
</BODY>
</HTML>
