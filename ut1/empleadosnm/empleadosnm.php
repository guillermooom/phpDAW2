<HTML>
<HEAD><TITLE>EMPLEADOS N:M</TITLE></HEAD>
<style>
h3{
	text-align:center;
}
</style>
<BODY>
<br>
<h3>CONSULTAS EMPLEADOS N:M</h3>
<form name="formu" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	<input type="radio" name="ope" value="altD"> ALTA DPTO
	<br><br>
	<input type="radio" name="ope" value="altE"> ALTA EMPLEADOS
	<br><br>
	<input type="radio" name="ope" value="camb"> CAMBIO DPTO
	<br><br>
	<input type="radio" name="ope" value="mod"> MODIFICAR SALARIO						
	<br><br>
	<input type="radio" name="ope" value="list"> LISTADO EMPLEADOS
	<br><br>
	<input type="submit" value="Consultar" name="enviar" />
</form>
<?php
if ($_SERVER["REQUEST_METHOD"]== "POST"){
	$val=$_POST["ope"];
	if($val=="altD"){
		header("Location: alta_dpto.php");
	}
	if($val=="altE"){
		header("Location: alta_emp.php");
	}
	if($val=="camb"){
		header("Location: cambio_dpto.php");
	}
	if($val=="mod"){
		header("Location: modificar_sal.php");
	}
	if($val=="list"){
		header("Location: listado_emp.php");
	}
}

?>
</BODY>
</HTML>