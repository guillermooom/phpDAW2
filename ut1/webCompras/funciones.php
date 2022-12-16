<?php
function conexion(){
    $servername = "localhost";
    $username = "root";
    $password = "rootroot";
    $dbname = "COMPRASWEB";
    
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

/* FUNCIONES COMALCAT */

function contarCategoria($conn){
    $stmt = $conn->prepare("SELECT max(ID_CATEGORIA) FROM CATEGORIA");
    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
    return $result;
}/*
Recibiremos la conexion por un parametro de entrada y
le meteremos a variable $stmt la sentencia SQL a ejecutar,
en la varible $result le meteremos meteremos el resultado en un array asociativo
*/

function calcularCategoria($tot){
    foreach($tot as $row) {
        //$cont = $row["count(ID_CATEGORIA)"];
        $cont = $row["max(ID_CATEGORIA)"];
    }
        $cont++;
        return $cont;
}/*
Recibiremos un array asociativo que será de la funcion contarCataegorias,
le recorremos y metemos lo que hay en dicho array en una varibale $cont
la incremnetamos en uno y le damos un formato que será el siguinte
C-xxx despues de darle dicho formato lo retornamos
*/

function addCategoria($conn,$val,$nombr){
    $nuev = $conn->prepare("INSERT INTO CATEGORIA (id_categoria,nombre) VALUES(:id,:nom);");     

    $nuev -> bindParam(':nom',$nombr);
    $nuev -> bindParam(':id',$val);

    $nuev->execute();

    echo "Categoria <b> $nombr </b> creado";
}/*
Recibimos 3 parametros que son la conexion de la base de datos,
el nombre calculado en la funcion calcularCategoria y el nombre de dicha Categoria
en la funcion $nuev meteremos la sentencia SQL  a ejecutar, luego cambiaremos los
parametros por los que hemos recibido y ejecutamos la funcion, despues de aladirlo
enseñamos por pantalla que se añadio correctamente
*/

/* FUNCIONES COMALTAPRO */

function contarProductos($conn){
    $stmt = $conn->prepare("SELECT max(ID_PRODUCTO) FROM PRODUCTO");
    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
    return $result;
}/*
Recibiremos la conexion por un parametro de entrada y
le meteremos a variable $stmt la sentencia SQL a ejecutar,
en la varible $result le meteremos meteremos el resultado en un array asociativo
*/

function calcularProducto($tot){
    foreach($tot as $row) {
        $cont = $row["max(ID_PRODUCTO)"];
    }

        $cont++;
        return $cont;
}/*
Recibiremos un array asociativo que será de la funcion contarProductos,
le recorremos y metemos lo que hay en dicho array en una varibale $cont
la incremnetamos en uno y le damos un formato que será el siguinte
Pxxxx despues de darle dicho formato lo retornamos
*/

function visualizarCategorias($conn){
    $stmt = $conn->prepare("SELECT ID_CATEGORIA,NOMBRE FROM CATEGORIA");
    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();

    return $result;
}/*
Recibiremos la conexión del servidor, le metemos a la variable $stmt
la sentencia SQL a ejecutar, y dicho resultado lo devolvermos a en array
*/

function mostrarCategorias($dep){
    foreach($dep as $row) {
        echo "<option value=".$row["ID_CATEGORIA"].">". $row["NOMBRE"]. "</option>";
    }
}/*
Recibimos de la funcion visualizarCategorias  un array asociativo
y lo vamos a mostrarlo en forma de opciones de formulario
*/

function addProducto($conn,$idProducto,$nb,$precio,$categoria){
    $precio=str_replace(",",".",$precio);
    $nuev = $conn->prepare("INSERT INTO PRODUCTO (ID_PRODUCTO,NOMBRE,PRECIO,ID_CATEGORIA)
    VALUES(:idPro,:nom,:precio,:idCat);");     

    $nuev -> bindParam(':idPro',$idProducto);
    $nuev -> bindParam(':nom',$nb);
    $nuev -> bindParam(':precio',$precio);
    $nuev -> bindParam(':idCat',$categoria);

    $nuev->execute();

    echo "Creado <b> $nb </b> con precio $precio";
}/*
Recibimos por parametros la conexion, el id del producto generado
por la funcion calcularProducto, el nombre, el precio y la categoria
de la opcion select pero este es un numero.
Lo primero vamos a sustituir las , por . en el precio para insertarlo
que no de ningun error, le metemos a la variable $nuev la sentencia SQL
que vamos a ejecutar, tras ese remplazamos los valores de la funcion por
los valores que meteremos en la sentencia y la ejecutaremos, tras ese
mostraremos un mensaje diciendo que que se añadio correctamente
*/

function addAlmacenes($conn,$localidad){
    $stmt = $conn->prepare("INSERT INTO ALMACEN (LOCALIDAD) VALUES (:loc);");
    $stmt -> bindParam(':loc',$localidad);
    $stmt->execute();

    echo "Registrado almacen en la localidad de <b> $localidad </b>";
}/*
Recibiremos la conexion y una varaible que será la localidad,
le meteremos a variable $stmt la sentencia SQL a ejecutar,
remplazaremos el valor a introducir por el que recibimos
de fuera de la funcion, ejecutamos y mostramos mensaje de confirmacion
*/

function visualizarAlmacen($conn){
    $stmt = $conn->prepare("SELECT NUM_ALMACEN,LOCALIDAD FROM ALMACEN");
    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();

    return $result;
}/*
Recibiremos la conexión del servidor, le metemos a la variable $stmt
la sentencia SQL a ejecutar, y dicho resultado lo devolvermos a en array
*/

function mostrarAlmacen($dep){
    foreach($dep as $row) {
        echo "<option value=".$row["NUM_ALMACEN"].">". $row["LOCALIDAD"]. "</option>";
    }
}/*
Recibimos de la funcion visualizarAlmacen un array asociativo
y lo vamos a mostrarlo en forma de opciones de formulario
*/

function visualizarProductos($conn){
    $stmt = $conn->prepare("SELECT ID_PRODUCTO,NOMBRE FROM PRODUCTO;");
    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();

    return $result;
}/*
Recibiremos la conexión del servidor, le metemos a la variable $stmt
la sentencia SQL a ejecutar, y dicho resultado lo devolvermos a en array
*/

function mostrarProductos($dep){
    foreach($dep as $row) {
        echo "<option value=".$row["ID_PRODUCTO"].">". $row["NOMBRE"]. "</option>";
    }
}/*
Recibimos de la funcion visualizarProductos un array asociativo
y lo vamos a mostrarlo en forma de opciones de formulario
*/

function addCantidad($conn,$loc,$producto,$cant){
    $esta=false;

    $stmt = $conn->prepare("SELECT NUM_ALMACEN, ID_PRODUCTO FROM ALMACENA");
    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();

    foreach($result as $row) {
        if($row["NUM_ALMACEN"]==$loc && $row["ID_PRODUCTO"]==$producto){
            $stmt = $conn->prepare("UPDATE ALMACENA SET CANTIDAD = CANTIDAD+:cant WHERE
            NUM_ALMACEN = :numA AND ID_PRODUCTO = :idP;");
            $stmt -> bindParam(':numA',$loc);
            $stmt -> bindParam(':idP',$producto);
            $stmt -> bindParam(':cant',$cant);
            $stmt->execute();
            $esta=true;
            echo "Añadidos <b> $cant </b> productos con codigo <b>$producto</b> ";
        }
    }

    if($esta==false){
        $stmt = $conn->prepare("INSERT INTO ALMACENA (NUM_ALMACEN,ID_PRODUCTO,CANTIDAD)
        VALUES (:numA, :idP, :cant)");
        $stmt -> bindParam(':numA',$loc);
        $stmt -> bindParam(':idP',$producto);
        $stmt -> bindParam(':cant',$cant);
        $stmt->execute();
        echo "Registrado el producto con codigo <b>$producto</b> una cantidad de <b> $cant </b>";
    }
}/*
Recibiremos la conexion y una varaible que será la localidad,
le meteremos a variable $stmt la sentencia SQL a ejecutar,
remplazaremos el valor a introducir por el que recibimos
de fuera de la funcion, ejecutamos y mostramos mensaje de confirmacion
*/

function consultarStock($conn,$pro){
    $stmt = $conn->prepare("SELECT LOCALIDAD, CANTIDAD FROM ALMACEN, ALMACENA
    WHERE ALMACEN.NUM_ALMACEN = ALMACENA.NUM_ALMACEN AND ID_PRODUCTO = :idP");

    $stmt -> bindParam(':idP',$pro);
    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
    if(empty($result)){
        echo "Este producto no esta almacenado en ningun almacen todavia";
    }
    else{
        foreach($result as $dat){
            echo "Almacen <b>". $dat["LOCALIDAD"]. "</b> Catindad de <b>". $dat["CANTIDAD"]."</b><br>";
        }
    }
}/*
Recibimos la conexion y el producto en la entrada, preparamos la sentencia a ejecutar
y la metemos en un array asociativo, tras meterla en un array asociativo vemos si 
el contenido esta vacio, si es asi lo indicamos por pantalla, en caso contrario
mostramos los almacenos y su cantidad de dicho producto seleccionado*/

function consultarAlmacen($conn,$loc){
    $stmt = $conn->prepare("SELECT NOMBRE, CANTIDAD FROM PRODUCTO, ALMACENA
    WHERE PRODUCTO.ID_PRODUCTO = ALMACENA.ID_PRODUCTO AND NUM_ALMACEN = :numA");

    $stmt -> bindParam(':numA',$loc);
    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
    if(empty($result)){
        echo "Este almacen no tiene almacenado en ningun producto todavia";
    }
    else{
        foreach($result as $dat){
            echo "Producto <b>". $dat["NOMBRE"]. "</b> Catindad de <b>". $dat["CANTIDAD"]."</b><br>";
        }
    }
}/*
Recibimos la conexion y el producto en la entrada, preparamos la sentencia a ejecutar
y la metemos en un array asociativo, tras meterla en un array asociativo vemos si 
el contenido esta vacio, si es asi lo indicamos por pantalla, en caso contrario
mostramos los almacenos y su cantidad de dicho producto seleccionado*/

function visualizarCliente($conn){
    $stmt = $conn->prepare("SELECT NIF,NOMBRE, APELLIDO FROM CLIENTE");
    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();

    return $result;
}/*
Recibiremos la conexión del servidor, le metemos a la variable $stmt
la sentencia SQL a ejecutar, y dicho resultado lo devolvermos a en array
*/

function mostrarCliente($dep){
    foreach($dep as $row) {
        echo "<option value=".$row["NIF"].">". $row["NOMBRE"]." ".$row["APELLIDO"]. "</option>";
    }
}/*
Recibimos de la funcion visualizarAlmacen un array asociativo
y lo vamos a mostrarlo en forma de opciones de formulario
*/

function mostrarCompras($conn,$nombre,$fin,$inicio){
    $stmt = $conn->prepare("SELECT NOMBRE, PRECIO*UNIDADES FROM PRODUCTO, COMPRA
    WHERE PRODUCTO.ID_PRODUCTO = COMPRA.ID_PRODUCTO AND
    COMPRA.NIF=:nombr AND FECHA_COMPRA <= :fin AND FECHA_COMPRA >= :inicio");

    /*SUMA DE X PRODUCTO DE LOS COMPRADOS POR SU PRECIO en este
    caso sumo todo los q hay y los multiplico por su precio

    SELECT NOMBRE, SUM(PRECIO*CANTIDAD) FROM ALMACENA, PRODUCTO
    WHERE PRODUCTO.ID_PRODUCTO=ALMACENA.ID_PRODUCTO AND NOMBRE='Camiseta';*/



    /*para el total de todas la compras seria asi
    SELECT NOMBRE, SUM(PRECIO) FROM ALMACENA, PRODUCTO
    WHERE PRODUCTO.ID_PRODUCTO=ALMACENA.ID_PRODUCTO AND ALMACENA.NUM_ALMACEN=2;
    */


    /*el total de todos los productos * su cantidad total
    SELECT NOMBRE,PRECIO*CANTIDAD FROM ALMACENA, PRODUCTO
    WHERE PRODUCTO.ID_PRODUCTO=ALMACENA.ID_PRODUCTO AND ALMACENA.NUM_ALMACEN=2;
    */

    $stmt -> bindParam(':nombr',$nombre);
    $stmt -> bindParam(':fin',$fin);
    $stmt -> bindParam(':inicio',$inicio);
    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();

    foreach($result as $dat){
        echo "Producto <b>". $dat["NOMBRE"]. "</b> Precio de <b>". $dat["PRECIO*UNIDADES"]." €</b><br>";
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
        echo " Total de todas las Compras del Usuario con DNI $nombre es <b>". $dat["SUM(PRECIO*UNIDADES)"]." €</b><br>";
    }
}

function altaUsuarios($conn,$nif,$nb,$ape,$cp,$dir,$ciu){
    $stmt = $conn->prepare("INSERT INTO CLIENTE (NIF,NOMBRE,APELLIDO,CP,DIRECCION,CIUDAD)
    VALUES(:nif,:nombre,:apellido,:cp,:direccion,:ciudad)");

    $stmt -> bindParam(':nif',$nif);
    $stmt -> bindParam(':nombre',$nb);
    $stmt -> bindParam(':apellido',$ape);
    $stmt -> bindParam(':cp',$cp);
    $stmt -> bindParam(':direccion',$dir);
    $stmt -> bindParam(':ciudad',$ciu);
    $stmt->execute();

    echo $nb." ".$ape." Añadido correctamente";
}

function compraHecha($conn,$cli,$pro,$cant,$fecha){
    $stmt = $conn->prepare("INSERT INTO COMPRA (NIF,ID_PRODUCTO,FECHA_COMPRA,UNIDADES)
    VALUES(:nif,:producto,:fecha,:unidades)");

    $stmt -> bindParam(':nif',$cli);
    $stmt -> bindParam(':producto',$pro);
    $stmt -> bindParam(':fecha',$fecha);
    $stmt -> bindParam(':unidades',$cant);
    $stmt->execute();

    echo " Compra Realizada correctamente";
}
?>

