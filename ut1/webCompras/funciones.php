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
    }
    return $conn; 
}

/* FUNCIONES COMALCAT */

function contarCategoria($conn){
    $stmt = $conn->prepare("SELECT count(ID_CATEGORIA) FROM CATEGORIA");
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
        $cont = $row["count(ID_CATEGORIA)"];
    }

        $cont++;
        $cont=str_pad($cont,3,"0",STR_PAD_LEFT);
        $IdCate="C-".$cont;
        return $IdCate;
}/*
Reciviremos un array asociativo que será de la funcion contarCtaegorias,
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
?>