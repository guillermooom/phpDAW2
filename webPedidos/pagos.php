<HTML>
<HEAD><TITLE>INICIO</TITLE>
</HEAD>
<BODY>
<?php
    require("funciones.php");
    $conn = conexion();
?>
<h3>Pagos</h3>
<a href="pe_inicio.php">INICIO</a>
<br><br>
<?php
    $num=detallesCompra($conn)-1;
    echo "Pedido <b>".$num."</b> realizado correctamente";
?>

</BODY>
</HTML>