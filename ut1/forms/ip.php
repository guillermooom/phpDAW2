<!doctype html>
<html lang="es">
	<head>
		<title>IPs</title>
		<meta charset="utf-8" />
		<meta name="author" content="Guille" />		
		<style>
			h1{
				font-size:30px;
				text-align:center;
			}
			.error{color:red;}
	</style>
	</head>
	<body>
	<?php
	$res="";
	$err="";
	$num="";
	if ($_SERVER["REQUEST_METHOD"]== "POST"){
		if(empty($_POST["ip"])){
			$err = "IP Requerido";
			$res="";
		}
		else{
			$n=limpia($_POST["ip"]);
			$res=conver($n);
		}
	}
	
	function conver ($ip){
		$res="";
		$comp=true;
		//PASAR TODO A BINARIO
	$p1 =strpos($ip,".",0); // busca en la ip, un punto, desde la posicion 0
	$p2 =strpos($ip,".",($p1+1));
	$p3 =strpos($ip,".",($p2+1));
	//PRIMER OCTETO
	$oct1= substr($ip,0,$p1);
	if($oct1>=1 && $oct1<=255){
		
	}else{
		$comp=false;
		$res="El primer octeto es incorrecto";
	}

	//SEGUNDO OCTETO
	$oct2= substr($ip,($p1+1),($p2-$p1));
	if($oct2>=1 && $oct2<=255){
		
	}else{
		$comp=false;
		$res="El segundo octeto es incorrecto ,$res";
	}

	//TERCER OCTETO
	$oct3= substr($ip,($p2+1),($p3-$p2));
	if($oct3>=1 && $oct3<=255){
		
	}else{
		$comp=false;
		$res="El tercer octeto es incorrecto ,$res";
	}

	//CUARTO OCTETO
	$oct4= substr($ip,($p3+1),$p3);
	if($oct4>=1 && $oct4<=255){
		
	}else{
		$comp=false;
		$res="El cuarto octeto es incorrecto ,$res";
	}
	
		if($comp==true){
			$res=(str_pad(decbin($oct1),8,"0",STR_PAD_LEFT).".".
			str_pad(decbin($oct2),8,"0",STR_PAD_LEFT).".".
			str_pad(decbin($oct3),8,"0",STR_PAD_LEFT).".".
			str_pad(decbin($oct4),8,"0",STR_PAD_LEFT));
		}
		return $res;
	}
	
	function comprobar($num){
		if($num>=1 && $num<=255){
			return true;
		}else{
			return false;
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
					<h1>IPs</h1>
					<br>
						<form name="formu" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
							<label for="ip">IP notacion decimal</label>
							<input type="text" name="ip">
							<span class="error">* <?php echo $err;?></span>
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