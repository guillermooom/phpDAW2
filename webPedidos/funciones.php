<?php
function conexion(){
    $servername = "localhost";
    $username = "root";
    $password = "rootroot";
    $dbname = "pedidos";
    
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
        echo "<h1>ERROR CODE</h1>".$error=$e->getCode();
    }
    return $conn; 
}

function login($conn,$nombre){
    $stmt = $conn->prepare("SELECT CustomerNumber,ContactLastName FROM Customers
    WHERE CustomerNumber = :nombre ");

    $stmt -> bindParam(':nombre',$nombre);
    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();

    foreach($result as $dat){
        return $dat["ContactLastName"];
    }
}

function crearSession($dni){
    $_SESSION["usuario"]=$dni;
    $_SESSION["carrito"]=$prod;
}
 
function borrarSesion($dni,$prod){
    setcookie( "usuario", $dni,  time() - (86400 * 30));
    setcookie( "carrito", $prod,  time() - (86400 * 30));
}

function visualizarProductos($conn){
    $stmt = $conn->prepare("SELECT productCode,productName FROM products WHERE quantityInStock >= 0;");
    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();

    return $result;
}

function mostrarProductos($dep){
    foreach($dep as $row) {
        echo "<option value=".$row["productCode"].">". $row["productName"]. "</option>";
    }
}

function addCarrito($tmt){
    $_SESSION["carrito"]=$tmt;
}

function totalProducto($conn,$produc){
    $stmt = $conn->prepare("SELECT quantityInStock FROM products WHERE productCode = :idP;");

    $stmt -> bindParam(':idP',$produc);
    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();

    return $result;
}

function verCarrito($conn,$arr){
    $precioFinal=0;
    $stmt = $conn->prepare("SELECT productName, productCode,buyPrice FROM products;");
    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
    
    foreach($arr as $nombre => $total){
        foreach($result as $dat){
            if($dat["productCode"]==$nombre){
                $precioFinal=$dat['buyPrice']*$total+$precioFinal;
                echo "<b>".$dat['productName']."</b> Unidades <b>$total</b> TOTAL: <b>".$dat['buyPrice']*$total."€ </b><br>";
            }
        }
    }
    if($precioFinal==0){
        echo "Tu carrito está vacio";
    }else{
        echo "<br>Total compra: <b>$precioFinal €</b>";
    }
}

function consultarStock($conn,$pro){
    $stmt = $conn->prepare("SELECT productCode, productName, quantityInStock FROM products
    WHERE productCode = :idP");

    $stmt -> bindParam(':idP',$pro);
    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
    if(empty($result)){
        echo "Este producto no esta almacenado en ningun almacen todavia";
    }
    else{
        foreach($result as $dat){
            echo "<b>".$dat["productName"]. "</b> dispone de una catindad de <b>". $dat["quantityInStock"]."</b><br>";
        }
    }
}

function mostrarCompras($conn,$nombre,$fin,$inicio){
    $stmt = $conn->prepare("SELECT NOMBRE, PRECIO*UNIDADES, UNIDADES FROM PRODUCTO, COMPRA
    WHERE PRODUCTO.ID_PRODUCTO = COMPRA.ID_PRODUCTO AND
    COMPRA.NIF=:nombr AND CAST(FECHA_COMPRA AS DATE) <= :fin
    AND CAST(FECHA_COMPRA AS DATE) >= :inicio");

    $stmt -> bindParam(':nombr',$nombre);
    $stmt -> bindParam(':fin',$fin);
    $stmt -> bindParam(':inicio',$inicio);
    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();

    foreach($result as $dat){
        echo "Producto <b>". $dat["NOMBRE"]. "</b> Cantidad <b>".$dat["UNIDADES"]."</b> Precio de <b>".$dat["PRECIO*UNIDADES"]." €</b><br>";
    }
}

function totalCompras($conn,$nombre,$fin,$inicio){
    $stmt = $conn->prepare("SELECT SUM(PRECIO*UNIDADES) FROM PRODUCTO, COMPRA
    WHERE PRODUCTO.ID_PRODUCTO = COMPRA.ID_PRODUCTO AND
    COMPRA.NIF=:nombr AND FECHA_COMPRA <= :fin AND FECHA_COMPRA >= :inicio");

    $stmt -> bindParam(':nombr',$nombre);
    $stmt -> bindParam(':fin',$fin);
    $stmt -> bindParam(':inicio',$inicio);
    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
    
    foreach($result as $dat){
        if($dat["SUM(PRECIO*UNIDADES)"]==0){
            echo "No se ha realizado ninguna compra en la fecha seleccionada";
        }else{
            echo " El total de todas tus compras es de <b>". round($dat["SUM(PRECIO*UNIDADES)"],2)." €</b><br>";
        }
    }
}

function detallesCompra($conn){
    $stmt = $conn->prepare("SELECT MAX(orderNumber) FROM orders");
    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();

    foreach($result as $dat){
        return ($dat["MAX(orderNumber)"]+1);
    }

}

function addCompra($conn,$num_pedido,$nombre,$total,$precio,$lin){
    $stmt = $conn->prepare("INSERT INTO orderdetails (orderNumber,productCode,quantityOrdered,priceEach,orderLineNumber)
    VALUES(:num_pedido,:codigo,:cantidad,:price,:linea)");

    $stmt -> bindParam(':num_pedido',$num_pedido);
    $stmt -> bindParam(':codigo',$nombre);
    $stmt -> bindParam(':cantidad',$total);
    $stmt -> bindParam(':price',$precio);
    $stmt -> bindParam(':linea',$lin);
    $stmt->execute();
}

function fechaPedido($conn,$fecha,$num,$user){
    $stmt = $conn->prepare("INSERT INTO orders (orderNumber,orderDate,requiredDate,status,customerNumber)
    VALUES(:num,:fech,:fech,'Waiting ',:usr)");

    $stmt -> bindParam(':num',$num);
    $stmt -> bindParam(':fech',$fecha);
    $stmt -> bindParam(':estado',$estado);
    $stmt -> bindParam(':usr',$user);
    $stmt->execute();
}

function precioProducto($conn,$id){
    $stmt = $conn->prepare("SELECT buyPrice FROM products WHERE productCode = :code");
    $stmt -> bindParam(':code',$id);
    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();

    foreach($result as $dat){
        return ($dat["buyPrice"]);
    }
}

function cantidadAlmacen($conn,$produc){
    $stmt = $conn->prepare("SELECT quantityInStock FROM products
    WHERE productCode = :idP;");

    $stmt -> bindParam(':idP',$produc);
    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();

    foreach($result as $dat){
        return ($dat["quantityInStock"]);
    }
}

function actualizaStock($conn,$id,$cant){
    $stmt = $conn->prepare("UPDATE products SET quantityInStock = :cant WHERE
        productCode = :id");

        $stmt -> bindParam(':cant',$cant);
        $stmt -> bindParam(':id',$id);
        $stmt->execute();
}

function compraRealizada($conn,$user,$tarjeta,$fecha,$cantidad){
    $stmt = $conn->prepare("INSERT INTO payments(customerNumber,checkNumber,paymentDate,amount)
    VALUES(:usr,:tarjeta,:fech,:cant)");
    
    $stmt -> bindParam(':usr',$user);
    $stmt -> bindParam(':tarjeta',$tarjeta);
    $stmt -> bindParam(':fech',$fecha);
    $stmt -> bindParam(':cant',$cantidad);
    $stmt->execute();
}

function totalCompra($conn,$arr){
    $precioFinal=0;
    $stmt = $conn->prepare("SELECT productName, productCode,buyPrice FROM products;");
    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
    
    foreach($arr as $nombre => $total){
        foreach($result as $dat){
            if($dat["productCode"]==$nombre){
                $precioFinal=$dat['buyPrice']*$total+$precioFinal;
                echo "<b>".$dat['productName']."</b> Unidades <b>$total</b> TOTAL: <b>".$dat['buyPrice']*$total."€ </b><br>";
            }
        }
    }
    return $precioFinal;
}

function mostrarPedidos($conn,$id){
    $stmt = $conn->prepare("SELECT orderNumber,orderDate,status FROM orders
    WHERE customerNumber = :id;");

    $stmt -> bindParam(':id',$id);
    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();

    foreach($result as $var){
        echo "Nº pedido <b>".$var["orderNumber"]."</b> Fecha <b>".$var["orderDate"]."</b> Estado <b>".$var["status"]."</b><br><br>";
    }
}

function lineasProducto($conn){
    $stmt = $conn->prepare("SELECT DISTINCT(productLine) FROM products");
    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();

    foreach($result as $row) {
        echo "<option value=".$row["productLine"].">". $row["productLine"]. "</option>";
    }
}

function consultaProducto($conn,$produc){
    $stmt = $conn->prepare("SELECT SUM(quantityInStock),productLine FROM products
    WHERE productLine LIKE :producto");

    $stmt -> bindParam(':producto',$produc);
    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();

    foreach($result as $var){
        echo "En la Linea <b>".$var["productLine"]."</b> Disppone de <b>".$var["SUM(quantityInStock)"]."</b> productos";
    }
}

function unidadesTotales($conn,$fin,$inicio){
    $stmt = $conn->prepare("SELECT SUM(quantityOrdered), D.productCode, productName
    FROM orderdetails D, orders O, products P
    WHERE D.orderNumber = O.orderNumber AND P.productCode = D.productCode 
    AND orderDate <= :fin AND orderDate >= :inicio
    GROUP BY D.productCode");

    $stmt -> bindParam(':fin',$fin);
    $stmt -> bindParam(':inicio',$inicio);
    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();

    if(empty($result)){
        echo "No hay compras en la fecha seleccionada";
    }else{

        foreach($result as $var){
            echo "Producto <b>".$var["productName"]."</b> Cantidad <b>".$var["SUM(quantityOrdered)"]."</b><br><br>";
        }
    }
}

function ordenesPedidas($conn,$fin,$inicio,$usuario){
    $stmt = $conn->prepare("SELECT orderNumber FROM orders
    WHERE customerNumber = :usuario AND orderDate <= :fin AND orderDate >= :inicio");

    $stmt -> bindParam(':fin',$fin);
    $stmt -> bindParam(':inicio',$inicio);
    $stmt -> bindParam(':usuario',$usuario);
    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();

    return $result;
}

function dineroGastado($conn,$numero){
    $stmt = $conn->prepare("SELECT SUM(quantityOrdered*priceEach)
    FROM orderdetails WHERE orderNumber = :numero;");

    $stmt -> bindParam(':numero',$numero);
    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();

    foreach($result as $var){
        echo "Pedido <b>".$numero."</b> Total <b>".$var["SUM(quantityOrdered*priceEach)"]."</b><br><br>";
    }

}
?>