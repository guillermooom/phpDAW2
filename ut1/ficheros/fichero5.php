<!doctype html>
<html lang="es">
	<head>
		<title>Fichero 5</title>
		<meta charset="utf-8" />
		<meta name="author" content="Guille" />
		<style>
			.error{color:red;}
	</style>		
	</head>
	<body>
	<?php
	$err1="";
	$err2="";
	$opc="";
	$res="";
	$lin=0;
	$len=0;
	$pri=0;
	if ($_SERVER["REQUEST_METHOD"]== "POST"){
		if(empty($_POST["fich"])){
			$err1="Campo Requerido";
		}else{
			$datos=limpia($_POST["fich"]);
			$myfile = fopen($datos,"r");
			$fi=array();
			$cont=0;
			
			while(!feof($myfile)){
					$fi[$cont]=fgets($myfile);
					$cont++;
			}
			$len=count($fi);
		}
		
		if(empty($_POST["ope"])){
			$err2="Faltan argumentos";
		}else{
			$opc=($_POST["ope"]);
		}
		
		if(empty($_POST["line"])){
			$err2="Faltan argumentos";
		}else{
			$lin=($_POST["line"]);
		}
		
		if(empty($_POST["pri_l"])){
			$err2="Faltan argumentos";
		}else{
			$pri=($_POST["pri_l"]);
		}
		
		//opciones de boton
		if($opc=="todo"){
			for($i=0;$i<$len;$i++){
				$res= $res."<br>". $fi[$i];
			}
		}
		
		if($opc=="sele"){
			for($i=0;$i<$len;$i++){
				if(($i+1)==$lin){
					$res=$fi[$i];
				}
			}
		}
		
		if($opc=="pri"){
			for($i=0;$i<$pri;$i++){
				$res= $res."<br>". $fi[$i];
			}
		}
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
					<h1>Operaciones Ficheros</h1>
					<br>
						<form name="formu" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>"">
							<label for="nb">Fichero (Path/nombre)</label>
							<input type="text" name="fich">
							<span class="error">* <?php echo $err1;?></span>
							<br>
							<br>
							<label for="opc">Operaciones: </label>
							<span class="error">* <?php echo $err2;?></span>
							<br>
							<input type="radio" name="ope" value="todo">Mostrar Fichero
							<br>
							<input type="radio" name="ope" value="sele">
							Mostrar linea <input type="text" name="line" style="width:20px;"> fichero
							<br>
							<input type="radio" name="ope" value="pri">
							Mostrar <input type="text" name="pri_l" style="width:20px;"> primeras lineas
							<br>
							<br>
							<input type="submit" value="enviar" name="enviar" />
							<input type="reset" value="borrar" name="enviar" />
						</form>
						<?php
							echo "<h2>Resultado</h2>";
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