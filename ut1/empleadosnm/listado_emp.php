<HTML>
<HEAD><TITLE>LISTADO EMPLEADOS</TITLE></HEAD>
<style>
h3{
	text-align:center;
}
</style>
<BODY>
<?php
    require("funciones.php");
?>
<a href="empleadosnm.php">HOME</a>
<br>
<h3>LISTADO EMPLEADOS </h3>
<form name="formu" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
DPTO <select name="dep">
        <?php
        $conn=conexion();
        $departamentos=visualizar_dpto($conn);
        foreach($departamentos as $row) {
            echo "<option value=".$row["cod_dpto"].">". $row["nombre"]. "</option>";
        }
        $conn = null;
        ?>
    </select>
    <br>
    <br>
    <input type="submit" value="Consultar" name="enviar" />
</form>
<?php
if(empty($_POST)){}
else{
    if ($_SERVER["REQUEST_METHOD"]== "POST"){
		$depart = $_POST["dep"];
	}
    $conn=conexion();
    $empleados=empleados_dpto($conn,$depart);

	foreach($empleados as $row) {
        echo "Empleado: " . $row["dni"]. "-" . $row["nombre"]."-" . $row["salario"]."-" . $row["fecha_nac"]. "<br>";
    }
    $conn = null;
}
?>
</BODY>
</HTML>