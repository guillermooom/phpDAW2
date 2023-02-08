<HTML>
<HEAD><TITLE>LOGIN</TITLE>
</HEAD>
<BODY>
<?php
    require("funciones.php");
    $conn = conexion();
    session_start();
?>
<h3>Login</h3>
<form name="formu" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label type="text" name="nombre">Nombre <input type="text" name="nombre"></label>
    <br><br>
    <label type="text" name="contra">Contraseña <input type="password" name="contra"></label>
    <br><br>
    <input type="submit" value="Entrar" name="enviar" />
</form>

<?php
if(!empty($_POST)){
    $realizar=true;
    if($_POST["nombre"]==""){
        echo "<p id='err'>ERROR: No has introducido el nombre de usuario</p>";
        $realizar=false;
    }
    if($_POST["contra"]==""){
        echo "<p id='err'>ERROR: No has introducido la contraseña</p>";
        $realizar=false;
    }
    if($realizar){
        $nb=$_POST["nombre"];
        if(login($conn,$nb)==$_POST["contra"]){
            crearSession($nb);
            header("Location: pe_inicio.php");
        }else{
            echo "<p id='err'>ERROR: Usuario Incorrecto</p>";
        }
    }
}
?>
</BODY>
</HTML>