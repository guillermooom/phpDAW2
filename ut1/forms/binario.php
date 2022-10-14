<HTML>
<HEAD><TITLE>Resultado</TITLE>
<style>
	h1{
		margin-top:30px;
		font-size:30px;
		text-align:center;
		margin-bottom:102px;
	}
	p{
		text-align:center;
	}
</style>
</HEAD>
<BODY>
<h1>CONVERSOR BINARIO</h1>
<?php
$num=limpia($_POST["dec"]);

function ope($n){
	$resul=0;
	$resul=decbin($n);
	return $resul;
}

function limpia($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$dec=ope($num);

echo "<form name='formu' >
			<label for='dec'>Numero decimal</label>
			<input type='number' name='dec' value=$num>
			<br>
			<br>
			<label for='dec'>Numero binario</label>
			<input type='number' name='dec' value=$dec>
		</form>";
						
?>
</BODY>
</HTML>