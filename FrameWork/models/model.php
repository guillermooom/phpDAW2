<?php

// Modelo contiene la lógica de la aplicación: clases y métodos que se comunican
// con la Base de Datos

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
?>