<HTML>
<HEAD><TITLE>COMSULTA STOCK</TITLE></HEAD>
<BODY>
<?php
    require("funciones.php");
?>
<a href="pe_inicio.php">Inicio</a>
<br><br>
<h3>Comprobar Stock </h3>
<form name="formu" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    Producto  <select name="producto">
    <?php
        $conn=conexion();
        $producto=visualizarProductos($conn);
        mostrarProductos($producto);
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
            $producto = $_POST["producto"];
        }
        consultarStock($conn,$producto);
        $conn = null;
    }
}
?>
</BODY>
</HTML>