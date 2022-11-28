<HTML>
<HEAD><TITLE>CAMBIO DPTO</TITLE></HEAD>
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
<h3>CAMBIO DPTO</h3>
<h4>Consultar Empleado</h4>
<form name="formu" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
DNI <select name="dep">
    <?php
        $conn=conexion();
        $verDNI=ver_dni($conn);
        foreach($verDNI as $row) {
            echo "<option value=".$row["dni"].">". $row["dni"]. "</option>";
            $nb=$row["dni"];
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
    $ver_dpto=ver_dpto($conn,$dni);

    foreach($ver_dpto as $row) {
        echo "<br>Departamneto: ". $row["nombre"]. "<br>";
    }
    
    $conn = null;

    echo "
    <h4>Cambiar DPTO</h4>
    DPTO <select name='depar'>";
        $conn=conexion();
        $departamentos=visualizar_dpto($conn);
        foreach($departamentos as $row) {
            echo "<option value=".$row["cod_dpto"].">". $row["nombre"]. "</option>";
        }
        $conn = null;
        echo "</select>
        <br><br>
        <label for=nSal>Fecha Actual <input name='fecha' placeholder='xxxx-xx-xx'></label>
        <br><br>
        <input type='submit' value='Cambiar' name='enviar' />
    </form>";
}

else if($_POST["enviar"]=="Cambiar"){

    if ($_SERVER["REQUEST_METHOD"]== "POST"){
        $nuevoDpto = $_POST["depar"];
        $fech = $_POST["fecha"];
    }

    if($fech==""){
        echo "<br>ERROR no se ha introducido una fecha";
    }else{
        $conn=conexion();
        registrar_cambioDPTO($conn,$nb,$fech);
        cambio_dpto($conn,$nuevoDpto,$nb,$fech);
       
        $conn = null;
    }
    
}
?>
</BODY>
</HTML>