<HTML>
<HEAD><TITLE>ALTA PRODUCTOS</TITLE></HEAD>
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
<br><br>
<h3>Añadir Productos </h3>
<form name="formu" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label type="text" name="nomPro">Nombre Producto <input name="nomPro"></label>
    <br><br>
    <label type="text" name="precio">Precio <input name="precio"></label>
    <br><br>
    Categoria  <select name="categoria">
    <?php
        $conn=conexion();
        $departamentos=visualizarCategorias($conn);
        mostrarCategorias($departamentos);
        $conn = null;
    ?>
    </select>
    <br><br>
    <input type="submit" value="Añadir" name="enviar" />
</form>
<?php
$realizar=true;
if(!empty($_POST)){
    if($_POST["nomPro"]==""){
        echo "<p id='err'>ERROR: No has introducido el nombre del Producto</p>";
        $realizar=false;
    } if($_POST["precio"]==""){
        echo "<p id='err'>ERROR: No has introducido el precio del Producto</p>";
        $realizar=false;
    }
    if($realizar){
        $conn=conexion();
        $numero=contarProductos($conn);
        $val=calcularProducto($numero);

        if ($_SERVER["REQUEST_METHOD"]== "POST"){
            $nombr = $_POST["nomPro"];
            $preci = $_POST["precio"];
            $cat = $_POST["categoria"];
        }

        addProducto($conn,$val,$nombr,$preci,$cat);
        $conn = null;
    }
}
?>
</BODY>
</HTML>