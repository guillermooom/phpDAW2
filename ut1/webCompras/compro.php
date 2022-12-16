<HTML>
<HEAD><TITLE>COMPRA PRODUCTO</TITLE></HEAD>
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
<h3>Compra Producto</h3>
<form name="formu" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
Cliente  <select name="usuario">
    <?php
        $conn=conexion();
        $cliente=visualizarCliente($conn);
        mostrarCliente($cliente);
        
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
    <label type="text" name="cantidad">Cantidad <input name="cantidad"></label>
    <br><br>
    <input type="submit" value="Comprar" name="enviar" />
</form>
<?php
$realizar=true;
if(!empty($_POST)){
    $fecha=date('Y-m-d');
        $conn=conexion();
        if($_POST["cantidad"]==""){
            echo "<p id='err'>Error: No se ha introducio una cantidad</p>";
            $realizar=false;
        }
        if($realizar){
            if ($_SERVER["REQUEST_METHOD"]== "POST"){
                $usr=$_POST["usuario"];
                $producto=$_POST["producto"];
                $cant=$_POST["cantidad"];
            }
            compraHecha($conn,$usr,$producto,$cant,$fecha);
            $conn = null;
        }
}
?>
</BODY>
</HTML>