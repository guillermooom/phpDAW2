<HTML>
<HEAD><TITLE> EJ2B – Conversor Decimal a base n </TITLE></HEAD>
<BODY>
<?php
$num="48";
$n=$num;
$res="";
$base=8;

do{ //pongo 8 ya que una ip tiene 8 bits
	$div=($n%$base); //sacamos el resto de esta division
	$n=(int)($n/$base);
	$res="$div$res"; //primero le tenemos que dar el resultado para que se coleque al reves
}while($n>$div);

if($n!=0)$res="$n$res";

echo "Numero $num en base $base = $res";
?>
</BODY>
</HTML>