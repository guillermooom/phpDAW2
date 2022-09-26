<HTML>
<HEAD><TITLE> EJ1B – Conversor decimal a binario</TITLE></HEAD>
<BODY>
<?php
$num="1";
$n=$num;
$res="";

do{ //pongo 8 ya que una ip tiene 8 bits
	$div=($n%2); //sacamos el resto de esta division
	$n=(int)($n/2);
	$res="$div$res"; //primero le tenemos que dar el resultado para que se coleque al reves
}while($n>$div);

if($n!=0)$res="$n$res";

echo "Numero $num en binario = $res";
?>
</BODY>
</HTML>
