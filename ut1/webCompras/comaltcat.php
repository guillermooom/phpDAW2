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
    }else{
        echo "<p id='err'>ERROR: No has introducido el nombre de la Categoria</p>";
    }
}
?>
</BODY>
</HTML>