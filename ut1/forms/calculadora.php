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
$opera=$_POST["ope"];

function ope($n1,$n2){
	$resul=0;
	$msg="";
	
	if($opera="suma"){
		$resul=$n1+$n2;
		$msg="<p>Resultado operación $n1 + $n2 = $resul</p>";
	}
	
	if($opera="resta"){
		$resul=$n1-$n2;
		$msg="<p>Resultado operación $n1 - $n2 = $resul</p>";
	}
	
	if($opera="multi"){
		$resul=$n1*$n2;
		$resul=round($resul,2);
		$msg="<p>Resultado operación $n1 * $n2 = $resul</p>";
	}
	
	if($opera="division"){
		if($opera="division" && ($n1==0 || $n2==0)){
			$msg="<p>ERROR NO PODUEDES DIVIDIR ENTRE 0</p>";
		}else{
			$resul=$n1/$n2;
			$msg="<p>Resultado operación $n1 / $n2 = $resul</p>";
		}
	}

	return $msg;
}

echo ope($num1,$num2);
?>
</BODY>
</HTML>