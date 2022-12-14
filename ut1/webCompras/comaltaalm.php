<HTML>
<HEAD><TITLE>ALTA ALMACEN</TITLE></HEAD>
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
<h3>Añadir Almacen </h3>
<form name="formu" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label type="text" name="nomPro">Localidad <input name="localidad"></label>
    <br><br>
    <input type="submit" value="Añadir" name="enviar" />
</form>
<?php
$realizar=true;
if(!empty($_POST)){
    if($_POST["localidad"]==""){
        echo "<p id='err'>ERROR: No has introducido la Localidad</p>";
        $realizar=false;
    }
    if($realizar){
        $conn=conexion();

        if ($_SERVER["REQUEST_METHOD"]== "POST"){
            $loc = $_POST["localidad"];
        }

        addAlmacenes($conn,$loc);
        $conn = null;
    }
}
?>
</BODY>
</HTML>