<HTML>
<HEAD><TITLE> EJ3B – Conversor Decimal a base 16</TITLE></HEAD>
<BODY>
<?php
$num="1515";
$n=$num;
$res="";
$base=16;

do{ //pongo 8 ya que una ip tiene 8 bits
	$div=($n%$base); //sacamos el resto de esta division
	switch ($div){
		case 10:
		$div="A";
		break;
		
		case 11:
		$div="B";
		break;
		
		case 12:
		$div="C";
		break;
		
		case 13:
		$div="D";
		break;
		
		case 14:
		$div="E";
		break;
		
		case 15:
		$div="F";
		break;
	}
	$n=(int)($n/$base);
	$res="$div$res"; //primero le tenemos que dar el resultado para que se coleque al reves
}while($n>$div);

if($n!=0)$res="$n$res";

echo "Numero $num en base $base = $res";
?>
</BODY>
</HTML>