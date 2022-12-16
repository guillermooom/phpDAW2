<HTML>
<HEAD><TITLE>ALTA CLINETES</TITLE></HEAD>
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
<h3>Alta Clientes</h3>
<form name="formu" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label type="text" name="nif">NIF <input name="nif"></label>
    <br><br>
    <label type="text" name="nombre">Nombre <input name="nombre"></label>
    <br><br>
    <label type="text" name="apellido">Apellido <input name="apellido"></label>
    <br><br>
    <label type="text" name="postal">Codigo Postal <input name="postal"></label>
    <br><br>
    <label type="text" name="dire">Dirección <input name="dire"></label>
    <br><br>
    <label type="text" name="ciudad">Ciudad <input name="ciudad"></label>
    <br><br>
    <input type="submit" value="Añadir" name="enviar" />
</form>
<?php
$realizar=true;
if(!empty($_POST)){
    if($_POST["nif"]=="" ||$_POST["nombre"]=="" ||$_POST["apellido"]==""||
    $_POST["postal"]=="" ||$_POST["dire"]=="" ||$_POST["ciudad"]==""){
        echo "<p id='err'>ERROR: No has introducido algun dato</p>";
        $realizar=false;
    }
    if($realizar){
        $conn=conexion();

        if ($_SERVER["REQUEST_METHOD"]== "POST"){
            $nif=$_POST["nif"];
            $nombre=$_POST["nombre"];
            $apellido=$_POST["apellido"];
            $cp=$_POST["postal"];
            $dir=$_POST["dire"];
            $ciud=$_POST["ciudad"];
        }
        altaUsuarios($conn,$nif,$nombre,$apellido,$cp,$dir,$ciud);
        $conn = null;
    }
}
?>
</BODY>
</HTML>