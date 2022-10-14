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
<h1>CONVERSOR NUMERICO</h1>
<?php
$num1=$_POST["op1"];
$num2=$_POST["op2"];
$opera=$_POST["ope"];

function ope($n1,$n2,$dato){
	$resul=0;
	$msg="";
	
	switch($dato){
		case "suma":
		$resul=$n1+$n2;
		$msg="<p>Resultado operación $n1 + $n2 = $resul</p>";
		break;
		
		case "resta":
		$resul=$n1-$n2;
		$msg="<p>Resultado operación $n1 - $n2 = $resul</p>";
		break;
		
		case "multi":
		$resul=$n1*$n2;
		$resul=round($resul,2);
		$msg="<p>Resultado operación $n1 * $n2 = $resul</p>";
		break;
		
		case "division":
		if($n1==0 || $n2==0){
			$msg="<p>NO PUEDES DIVIDIR POR 0</p>";
			break;
		}
		$resul=$n1/$n2;
		$resul=round($resul,2);
		$msg="<p>Resultado operación $n1 / $n2 = $resul</p>";
		break;
	}
	return $msg;
}


echo ope($num1,$num2,$opera);	
?>
</BODY>
</HTML>