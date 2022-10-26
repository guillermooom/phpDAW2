<HTML>
<HEAD><TITLE> Bolsa 3 </TITLE>
<style>
h2{
	color:red;
}
</style>
</HEAD>
<BODY>
<?php
$nb="";
$nb=$_POST["opc"];

$fich=fopen("C:\wamp64\www\ut1\bolsa\ibex35.txt","r");

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
		$res="
		El valor de Cotizacón de $nb es $n2<br>
		El valor de Cotizacón Maxima de $nb es $n6<br>
		El valor de Cotizacón Minima de $nb es $n7";
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