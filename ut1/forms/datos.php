<!doctype html>
<html lang="es">
	<head>
		<title>Datos Alumnos</title>
		<meta charset="utf-8" />
		<meta name="author" content="Guille" />		
		<style>
			h1{
				font-size:30px;
				text-align:center;
			}
			.error{color:red;}
		table,tr,td,th{
			border: 0.5px solid black;
			border-collapse:collapse;
			text-align:center;
			width:500px;
		}
	</style>
	</head>
	<body>
	<?php
	$res="";
	$nberr="";
	$nom="";
	$mailerr="";
	$email="";
	$sexerr="";
	$sex="";
	$ape1="";
	$ape2="";
	if ($_SERVER["REQUEST_METHOD"]== "POST"){
		if(empty($_POST["nb"])){
			$nberr = "Nombre Requerido";
			$res="";
		}
		else{
			$nom=limpia($_POST["nb"]);
		}
		
		if(empty($_POST["mail"])){
			$mailerr = "Email Requerido";
			$res="";
		}
		else{
			$mail=limpia($_POST["mail"]);
		}
		
		if(empty($_POST["ope"])){
			$sexerr = "Sexo Requerido";
			$res="";
		}
		else{
			$sex=limpia($_POST["ope"]);
		}
		
		if(!empty($_POST["ap1"])){
			$ape1 = limpia($_POST["ap1"]);
		}
		
		if(!empty($_POST["ap2"])){
			$ape2 = limpia($_POST["ap2"]);
		}
		$res=ver($nom,$ape1,$ape2,$mail,$sex);
	}	
	
	function ver($nb,$ap1,$ap2,$ma,$se){
		$ver="";
		if(empty($ap1) && empty($ap2)){
			$ver="<table>
			<tr>
				<th>Nombre</th>
				<th>Mail</th>
				<th>Sexo</th>
			</tr>
			<tr>
				<td>$nb</td>
				<td>$ma</td>
				<td>$se</td>
			</tr>
		</table>";
		}else{
			$ver="
			<table>
			<tr>
				<th>Nombre</th>
				<th>Apellidos</th>
				<th>Mail</th>
				<th>Sexo</th>
			</tr>
			<tr>
				<td>$nb</td>
				<td>$ap1 $ap2</td>
				<td>$ma</td>
				<td>$se</td>
			</tr>
		</table>";
		}
		
		return $ver;
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
					<h1>Datos Alumnos</h1>
					<br>
						<form name="formu" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
							<label for="nb">Nombre</label>
							<input type="text" name="nb">
							<span class="error">* <?php echo $nberr;?></span>
							<br>
							<br>
							<label for="ap1">Apellido 1</label>
							<input type="text" name="ap1">
							<br>
							<br>
							<label for="ap2">Apellido 2</label>
							<input type="text" name="ap2">
							<br>
							<br>
							<label for="mail">Email</label>
							<input type="text" name="mail">
							<span class="error">* <?php echo $mailerr;?></span>
							<br>
							<br>
							<label for="opc">Sexo: </label>
							<input type="radio" name="ope" value="H">Hombre
							<input type="radio" name="ope" value="M">Mujer	
							<span class="error">* <?php echo $sexerr;?></span>								
							<br>
							<br>
							<input type="submit" value="enviar" name="enviar" />
							<input type="reset" value="borrar" name="enviar" />
							<br>
							<?php
						
							echo "<br><h3>RESULTADO</h3>";
							echo $res;
						?>
						</form>
					</div>
				</article>
			</section>
		</main>
		<footer>
		
		</footer>
		
	</body>
</html>