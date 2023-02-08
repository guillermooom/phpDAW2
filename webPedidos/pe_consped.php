<HTML>
<HEAD><TITLE>CONSULTA PEDIDOS</TITLE>
</HEAD>
<BODY>
<?php
    require("funciones.php");
    $conn = conexion();
    session_start();
?>
<h3>Consulta Pedidos</h3>
<a href="pe_inicio.php">Inicio</a>
<br><br>
<?php
    $usuario=$_SESSION["usuario"];
    mostrarPedidos($conn,$usuario);
?>
</BODY>
</HTML>