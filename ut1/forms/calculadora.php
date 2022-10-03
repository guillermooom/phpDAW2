<HTML>
<HEAD><TITLE>Resultado</TITLE>
<style>
	h1{
		margin-top:30px;
		font-size:30px;
		text-align:center;
		margin-bottom:100px;
	}
	p{
		text-align:center;
	}
</style>
</HEAD>
<BODY>
<h1>CALCULADORA</h1>
<?php
$num1=$_POST["op1"];
$num2=$_POST["op2"];

function sumar($n1,$n2){
	$resul=0;

	$resul=$n1+$n2;

	return "<p>Resultado operación $n1 + $n2 = $resul</p>";
}

function restar($n1,$n2){
	$resul=0;

	$resul=$n1-$n2;

	return "<p>Resultado operación $n1 - $n2 = $resul</p>";
}

function multiplica($n1,$n2){
	$resul=0;

	$resul=$n1*$n2;

	return "<p>Resultado operación $n1 * $n2 = $resul</p>";
}

function division($n1,$n2){
	$resul=0;

	$resul=$n1/$n2;

	return "<p>Resultado operación $n1 / $n2 = $resul</p>";
}


echo sumar($num1,$num2);
?>
</BODY>
</HTML>