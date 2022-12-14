<HTML>
<HEAD><TITLE>CONSULTA COMPRAS</TITLE></HEAD>
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
<h3>Consulta Compras</h3>
<form name="formu" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    Cliente  <select name="usuario">
    <?php
        $conn=conexion();
        $cliente=visualizarCliente($conn);
        mostrarCliente($cliente);
        
    ?>
    </select>
    <br><br>
    <label for="f_inicio">Fecha Desde <input type="date" name="f_inicio" id="f_inicio"></label>
    <br><br>
    <label for="f_fin">Fecha Hasta <input type="date" name="f_fin" id="f_fin"></label>
    <br><br>
    <input type="submit" value="Consultar" name="enviar" />
</form>
<?php
$realizar=true;
if(!empty($_POST)){
        
        $nombre=$_POST["usuario"];
        $inicio= $_POST["f_inicio"];
        $fin=$_POST["f_fin"];
    if($_POST["f_fin"] < $_POST["f_inicio"]){
        $realizar=false;
        echo "<p id='err'>ERROR: La fecha no se puede consultar</p>";
    }
    if($realizar){
        mostrarCompras($conn,$nombre,$fin,$inicio);
        echo "<br>";
        totalCompras($conn,$nombre,$fin,$inicio);
    }
}
$conn = null;
?>
</BODY>
</HTML>