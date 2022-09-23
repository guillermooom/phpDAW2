<HTML>
<HEAD><TITLE> EJ1B – Conversor decimal a binario</TITLE></HEAD>
<BODY>
<?php
$num="168";
$n=$num;
$res="";

for($i=0;$i!=8;$i++){ //pongo 8 ya que una ip tiene 8 bits
	$div=($n%2); //sacamos el resto de esta division
	$n=$n/2;
	$res="$div$res"; //primero le tenemos que dar el resultado para que se coleque al reves
}
echo "Numero $num en binario = $res";
/*
$n1=5;
$n2=2;

echo($n1%$n2);
*/
?>
</BODY>
</HTML>