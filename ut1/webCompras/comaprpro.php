<HTML>
<HEAD><TITLE>CANTIDAD PRODUCTOS</TITLE></HEAD>
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
<h3>Cantidad Productos </h3>
<form name="formu" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    Localidad  <select name="localidades">
    <?php
        $conn=conexion();
        $localidad=visualizarAlmacen($conn);
        mostrarAlmacen($localidad);
        $conn = null;
    ?>
    </select>
    <br><br>
    Producto  <select name="producto">
    <?php
        $conn=conexion();
        $producto=visualizarProductos($conn);
        mostrarProductos($producto);
        $conn = null;
    ?>
    </select>
    <br><br>
    <label type="text" name="canti">Cantidad <input name="canti"></label>
    <br><br>
    <input type="submit" value="Añadir" name="enviar" />
</form>
<?php
$realizar=true;
if(!empty($_POST)){
    if($_POST["canti"]==""){
        echo "<p id='err'>ERROR: No has introducido una cantidad validad</p>";
        $realizar=false;
    }
    if($realizar){
        $conn=conexion();

        if ($_SERVER["REQUEST_METHOD"]== "POST"){
            $cantidad = $_POST["canti"];
            $localidad = $_POST["localidades"];
            $producto = $_POST["producto"];
        }
        addCantidad($conn,$localidad,$producto,$cantidad);
        $conn = null;
    }
}
?>
</BODY>
</HTML>