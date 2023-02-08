<HTML>
<HEAD><TITLE>PRODUCT LINE</TITLE>
</HEAD>
<BODY>
<?php
    require("funciones.php");
    $conn = conexion();
    session_start();
?>
<h3>Product Line</h3>
<a href="pe_inicio.php">Inicio</a>
<br><br>
<form name="formu" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <br><br>
    Producto  <select name="producto">
    <?php
        lineasProducto($conn);
    ?>
    </select>
    <br><br>
   <input type="submit" value="Consultar" name="enviar" />
</form>
<?php
if(!empty($_POST)){
    $producto=$_POST["producto"];
    $producto=$producto."%";
    consultaProducto($conn,$producto);
}
?>
</BODY>
</HTML>