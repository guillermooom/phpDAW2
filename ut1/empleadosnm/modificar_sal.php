<HTML>
<HEAD><TITLE>CAMBIO SALARIO</TITLE></HEAD>
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
<h3>CAMBIO SALARIO</h3>
<h4>Consultar Salario</h4>
<form name="formu" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
DNI <select name="dep">
    <?php
        $conn=conexion();
        $verDNI=ver_dni($conn);
        foreach($verDNI as $row) {
            echo "<option value=".$row["dni"].">". $row["dni"]. "</option>";
        }
        $conn = null;
    ?>
</select>
<input type="submit" value="Consultar" name="enviar" />
<br>

<?php
if(empty($_POST)){}
else if($_POST["enviar"]=="Consultar"){
    if ($_SERVER["REQUEST_METHOD"]== "POST"){
        $dni = $_POST["dep"];
    }
    $conn=conexion();
    $ver_sal=consultar_salario($conn,$dni);

    foreach($ver_sal as $row) {
        echo "<br>Salario Actual: ". $row["salario"]. " €<br>";
    }
    
    $conn = null;

    echo "
    <h4>Cambiar Salario</h4>
        <input type='hidden' name='oculto' value=$dni>
        <label for=nSal>Nuevo Salario <input name='nSal'></label>
        <input type='submit' value='Cambiar' name='enviar' />
    </form>";
}

else if($_POST["enviar"]=="Cambiar"){
    if ($_SERVER["REQUEST_METHOD"]== "POST"){
        $nb=$_POST["oculto"];
        $sal = $_POST["nSal"];
    }
    if($sal==""){
        echo "ERROR: No introduzco un salario";
    }else{
        $conn=conexion();
        mod_salario($conn,$nb,$sal);

        $conn = null;
    }   
}
?>
</BODY>
</HTML>