<HTML>
<HEAD><TITLE>ALTA CATEGORIAS</TITLE></HEAD>
<style>
body{
    font-family:Calibri;
}
h3{
    font-size:25px;
	text-align:center;
}
</style>
<BODY>
<?php
    require("funciones.php");
?>
<br><br>
<h3>Añadir Categorias </h3>
<form name="formu" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label type="text" name="nomCat">Nombre Categoria <input name="nomCat"></label>
    <br><br>
    <input type="submit" value="Añadir" name="enviar" />
</form>
<?php
if(!empty($_POST)){
    if($_POST["nomCat"]!=""){
        $conn=conexion();
        $numeroCat=contarCategoria($conn);
        $val=calcularCategoria($numeroCat);

        if ($_SERVER["REQUEST_METHOD"]== "POST"){
            $nombr = $_POST["nomCat"];
        }

        addCategoria($conn,$val,$nombr);
        $conn = null;
    }
}
?>
</BODY>
</HTML>