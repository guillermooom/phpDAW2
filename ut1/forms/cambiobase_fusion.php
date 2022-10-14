<!doctype html>
<html lang="es">
	<head>
		<title>Conversor binario</title>
		<meta charset="utf-8" />
		<meta name="author" content="Guille" />
	</head>
	<style>
		.error{color:red;}
		h1{
		margin-top:30px;
		font-size:30px;
		text-align:center;
		margin-bottom:25px;
		}
		table,td{
		border: 1px solid black;
		border-collapse:collapse;
		text-align:left;
		}
		table,th{
			border: 1px solid black;
			width:150px;
			text-align:center;
		}
	</style>
	<body>
	<?php
	
	$num = "";
	$numerr = "";
	$opera="";
	$opeerr="";
	$res="";
	
	if ($_SERVER["REQUEST_METHOD"]== "POST"){
		if(empty($_POST["ope"])){
			$opeerr = "Sistema Requerido";
			$res="";
		}else{
			$opera=$_POST["ope"];
		}
		
		if(empty($_POST["dec"])){
			$numerr = "Campo Requerido";
			$res="";
		}else{
			$num=limpia($_POST["dec"]);
			$res=ope($num,$opera);
		}
	}

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
			$bi=decbin($n);
			$oc=decoct($n);
			$he=strtoupper(dechex($n));
			$msg="
				<table>
				<tr>
				<td>Binario</td>
				<td>$bi</td>
				
				<tr>
				<td>Ocatal</td>
				<td>$oc</td>
				
				<tr>
				<td>Hexadecimal</td>
				<td>$he</td>
				
				</table>";
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
	?>
		<header>
		
		</header>
		<nav>
		
		</nav>
		<main>
			<section>
				<article>
					<div>
					<h1>CONVERSOR NUMERICO</h1>
					<br>
					<br>
					<br>
					<br>
						<form name="formu" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
							<label for="dec">Numero decimal</label>
							<input type="number" name="dec">
							<span class="error">* <?php echo $numerr;?></span>
							<br>
							<br>
							<label for="opc" required>Convertir a:</label>
							<br>
							<span class="error">* <?php echo $opeerr;?></span>
							<br>
							<input type="radio" name="ope" value="bina">Binario
							<br>
							<input type="radio" name="ope" value="octa">Octal
							<br>
							<input type="radio" name="ope" value="hexa">Hexadecimal
							<br>
							<input type="radio" name="ope" value="todo">Todos los sistemas							
							<br>
							<br>
							<input type="submit" value="enviar" name="enviar" />
							<input type="reset" value="borrar" name="enviar" />
						</form>
						<?php
						
							echo "<br><h3>RESULTADO</h3>";
							echo $res;
						
						?>
					</div>
				</article>
			</section>
		</main>
		<footer>
		
		</footer>
		
	</body>
</html>

