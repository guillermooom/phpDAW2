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
	table,td{
	border: 1px solid black;
	border-collapse:collapse;
	text-align:left;
	}
	table,th{
		border: 1px solid black;
		width:300px;
		text-align:center;
	}
</style>
</HEAD>
<BODY>
<h1>CONVERSOR NUMERICO</h1>
<?php
$num=limpia($_POST["dec"]);;
$opera=$_POST["ope"];

function ope($n,$dato){
	$resul=0;
	$msg="";
	
	switch($dato){
		case "bina":
		$resul=decbin($n);
		$msg="<p>$n en Binario es $resul</p>";
		break;
		
		case "octa":
		$resul=decoct($n);
		$msg="<p>$n en Octal es $resul</p>";
		break;
		
		case "hexa":
		$resul=strtoupper(dechex($n));
		$msg="<p>$n en Hexadecimal es $resul</p>";
		break;
		
		case "todo":
			echo "<table>";
			echo "<tr>";
			echo "<td>Binario</td>";
			$resul=decbin($n);
			echo "<td>$resul</td>";
			
			echo "<tr>";
			echo "<td>Ocatal</td>";
			$resul=decoct($n);
			echo "<td>$resul</td>";
			
			echo "<tr>";
			echo "<td>Hexadecimal</td>";
			$resul=strtoupper(dechex($n));;
			echo "<td>$resul</td>";
			
			echo "</table>";
			break;
		
	}
	return $msg;
}

function limpia($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


echo ope($num,$opera);	
?>
</BODY>
</HTML>