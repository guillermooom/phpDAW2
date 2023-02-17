<?php

// Modelo contiene la lógica de la aplicación: clases y métodos que se comunican
// con la Base de Datos

function login($conn,$nombre){

    global $conn;

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

function datosVacios($nombre,$contra){
    $realizar = true;
    if($nombre==""){
        echo "<p id='err'>ERROR: No has introducido el nombre de usuario</p>";
        $realizar=false;
    }
    if($contra==""){
        echo "<p id='err'>ERROR: No has introducido la contraseña</p>";
        $realizar=false;
    }
    return $realizar;
}

function compruebaLogin($nb,$pass,$sige){

    global $conn;
    if($sige){
        if(login($conn,$nb)==$pass){
            session_start();
            crearSession($nb);
            header("Location: pe_inicio.php");
        }else{
            echo "<p id='err'>ERROR: Usuario Incorrecto</p>";
        }
    }
}
?>