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
</BODY>
</HTML>
