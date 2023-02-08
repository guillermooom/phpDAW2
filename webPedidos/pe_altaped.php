<HTML>
<HEAD><TITLE>PEDIDOS</TITLE>
</HEAD>
<BODY>
<?php
    require("funciones.php");
    $conn = conexion();
    session_start();
?>
<a href="pe_inicio.php">Home</a>
<h3>Pedidos</h3>
<form name="formu" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <br><br>
    Producto  <select name="producto">
    <?php
        $producto=visualizarProductos($conn);
        mostrarProductos($producto);
    ?>
    </select>
    <br><br>
    <label type="text" name="cantidad">Cantidad <input type="number" min="0" name="cantidad"></label>
    <br><br>
    <input type="submit" value="Añadir Bolsa" name="enviar" />
    <input type="submit" value="Comprar" name="enviar" />
    <br><br>
    <label type="text" name="tarjeta">Tarjeta <input type="text" min="0" name="tarjeta" placeholder="XX00000"></label>
</form>
<?php
$realizar=true;
$var=unserialize($_SESSION["carrito"]);
error_reporting(0);
if(!empty($_POST)){
    $fecha=date('Y-m-d');
    if($_POST["enviar"]=="Comprar" && empty($_SESSION["carrito"]==false) && !empty($_POST["tarjeta"])){
        $var=unserialize($_SESSION["carrito"]);
        $tarjeta=$_POST["tarjeta"];

        $usuario=$_SESSION["usuario"];
        $num_pedido=detallesCompra($conn);
        fechaPedido($conn,$fecha,$num_pedido,$usuario);
        $cont=1;
        foreach($var as $nombre => $total){
            $precio=precioProducto($conn,$nombre);
            addCompra($conn,$num_pedido,$nombre,$total,$precio,$cont);
            $cant=cantidadAlmacen($conn,$nombre)-$total;
            actualizaStock($conn,$nombre,$cant);
            $cont++;     
        }
        $cantidad=totalCompra($conn,$var);
        compraRealizada($conn,$usuario,$tarjeta,$fecha,$cantidad);
        $var="";
        $_SESSION["carrito"]=$var;
        echo' <script> location.replace("pagos.php"); </script>';
       
    }
    else{
        if( $_POST["cantidad"]=="" || $_POST["cantidad"]==0){
            echo "<p id='err'>Error: No se ha introducio una cantidad</p>";
            $realizar=false;
        }
        if($realizar){
            $seguir=true;
            if ($_SERVER["REQUEST_METHOD"]== "POST"){
                $usr=$_SESSION["usuario"];
                $producto=$_POST["producto"];
                $cant=$_POST["cantidad"];
            }

            $tot= totalProducto($conn,$producto);
            foreach($tot as $row) {
                $cont = $row["quantityInStock"];
               if($cont<$cant){
                echo "<p id='err'>Error: No hay suficiente stock</p>";
                $seguir=false;
               }
            }

            if($seguir){
                $existe=false;

                
                foreach($var as $nombre => $total){
                        if(strcmp($nombre,$producto)==0){
                            $var[$producto] = $total+$cant;
                            $existe=true;
                        }
                    }
                if(!$existe){
                    $var[$producto] = intval($cant);
                }
                $arr=serialize($var);
                addCarrito($arr);
                
            }
            
        }
            
    }
       
}

verCarrito($conn,$var);

$conn = null;
?>
</BODY>
</HTML>