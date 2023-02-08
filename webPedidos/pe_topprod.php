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
    $conn=conexion();
    session_start();
?>
<a href="pe_inicio.php">Inicio</a>
<br><br>
<h3>Consulta Compras</h3>
<form name="formu" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label for="f_inicio">Fecha Desde <input type="date" name="f_inicio" id="f_inicio"></label>
    <br><br>
    <label for="f_fin">Fecha Hasta <input type="date" name="f_fin" id="f_fin"></label>
    <br><br>
    <input type="submit" value="Consultar" name="enviar" />
</form>
<?php
$realizar=true;
if(!empty($_POST)){
        $nombre=$_SESSION["usuario"];
        $inicio= $_POST["f_inicio"];
        $fin=$_POST["f_fin"];
    if(($_POST["f_fin"] < $_POST["f_inicio"])|| $_POST["f_inicio"]=="" || $_POST["f_fin"]==""){
        $realizar=false;
        echo "<p id='err'>ERROR: La fecha no se puede consultar</p>";
    }
    if($realizar){
        unidadesTotales($conn,$fin,$inicio);
    }
}
$conn = null;
?>
</BODY>
</HTML>