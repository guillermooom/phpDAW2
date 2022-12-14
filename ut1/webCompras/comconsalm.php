<HTML>
<HEAD><TITLE>CONSULTAR ALMACEN</TITLE></HEAD>
<style>
body{
    font-family:Calibri;
}
h3{
    font-size:25px;
	text-align:center;
}
#err{
    color:red;
}
</style>
<BODY>
<?php
    require("funciones.php");
?>
<a href="./index.html">Inicio</a>
<br><br>
<h3>Consultar Almacen</h3>
<form name="formu" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    Localidad  <select name="localidades">
    <?php
        $conn=conexion();
        $localidad=visualizarAlmacen($conn);
        mostrarAlmacen($localidad);
        $conn = null;
    ?>
    </select>
    <input type="submit" value="Consultar" name="enviar" />
</form>
<?php
$realizar=true;
if(!empty($_POST)){
    if($realizar){
        $conn=conexion();

        if ($_SERVER["REQUEST_METHOD"]== "POST"){
            $localidad = $_POST["localidades"];
        }
        consultarAlmacen($conn,$localidad);
        $conn = null;
    }
}
?>
</BODY>
</HTML>