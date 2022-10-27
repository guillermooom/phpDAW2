<HTML>
<HEAD><TITLE> Bolsa 4 </TITLE>
<style>
h2{
	color:red;
}
</style>
</HEAD>
<BODY>
<?php
$nb="";
$va="";
$fich=fopen("C:\wamp64\www\ut1\bolsa\ibex35.txt","r");
if ($_SERVER["REQUEST_METHOD"]== "POST"){
	if(empty($_POST["opc"])){
		$nb="";
	}else{
		$nb=$_POST["opc"];
	}
	if(empty($_POST["val"])){
		$va="";
	}else{
		$va=$_POST["val"];
	}
}
$n1="";
$n2="";
$n3="";
$n4="";
$n5="";
$n6="";
$n7="";
$n8="";
$n9="";
$n0="";
$n="";
$res="";

while(!feof($fich)){
	
	$n1=fgets($fich,23);
	$n2=fgets($fich,9);
	$n3=fgets($fich,8);
	$n4=fgets($fich,12);
	$n5=fgets($fich,10);
	$n6=fgets($fich,10);
	$n7=fgets($fich,12);
	$n8=fgets($fich,9);
	$n9=fgets($fich,14);
	$n0=fgets($fich,11);

	if(strcmp($nb,"Valor")==0 || strcmp($nb,"")==0){
		$res="<h2>ERROR</h2>";
	}

	if(strcmp($nb,$n1)<-2 ){
		switch ($va){
			case "ult":
			$res="El Ultimo Valor de $nb es $n2";
			break;
			
			case "var":
			$res="La Variacion de $nb es $n3";
			break;
			
			case "varp":
			$res="El porcentaje de Variacion de $nb es $n4";
			break;
			
			case "ano":
			$res="La Variacion Anual de $nb es $n5";
			break;
			
			case "max":
			$res="El Maximo Valor de $nb es $n6";
			break;
			
			case "min":
			$res="El Minimo Valor de $nb es $n7";
			break;
			
			case "vol":
			$res="El volumen de $nb es $n8";
			break;
			
			case "cap":
			$res="La Capitalización de $nb es $n9";
			break;
		}
		
	}
}
fclose($fich);
	
?>
<header>
		
		</header>
		<nav>
		
		</nav>
		<main>
			<section>
				<article>
					<div>
					<h1>DATOS Bolsa de un VALOR</h1>
					<br>
						<form name="formu" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
							 
							 <label for="val">VALOR <select name="opc">
								<?php
								$fich=fopen("C:\wamp64\www\ut1\bolsa\ibex35.txt","r");
									while(!feof($fich)){
										$n1=fgets($fich,23);
										$n2=fgets($fich,9);
										$n3=fgets($fich,8);
										$n4=fgets($fich,12);
										$n5=fgets($fich,10);
										$n6=fgets($fich,10);
										$n7=fgets($fich,12);
										$n8=fgets($fich,9);
										$n9=fgets($fich,14);
										$n0=fgets($fich,11);
										echo "<option value=".$n1.">".$n1."</option>";
									}
								?>
							</select></label>
							<br>
							<br>
							<label for="comun">Mostrar <select name="val">
								<option value="ult">Ultimo Valor</option>
								<option value="var">Variacion</option>
								<option value="varp">Variacion %</option>
								<option value="anu">AC%Anual</option>
								<option value="max">Máximo</option>
								<option value="min">Mínimo</option>
								<option value="vol">Volumen</option>
								<option value="cap">Capitalización</option>
							</select></label>
							<br>
							<br>
							<input type="submit" value="enviar" name="enviar" />
							<input type="reset" value="borrar" name="enviar" />
						</form>
						<?php
							echo $res;
						?>
					</div>
				</article>
			</section>
		</main>
		<footer>
		
		</footer>
		
</BODY>
</HTML>