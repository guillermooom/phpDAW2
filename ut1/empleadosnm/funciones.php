<?php
function conexion(){
    $servername = "localhost";
    $username = "root";
    $password = "rootroot";
    $dbname = "empleadosnm";
    
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    return $conn; 
}

function visualizar_dpto($conn){
        $stmt = $conn->prepare("SELECT cod_dpto,nombre FROM dpto");
        $stmt->execute();
    
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();

        return $result;
}

function empleados_dpto($conn,$valor){
    $stmt = $conn->prepare("SELECT emple.dni, emple.nombre, emple.salario, emple.fecha_nac
	FROM emple, dpto
	WHERE dpto.cod_dpto=emple.cod_dpto
	AND dpto.nombre=:nombredpto");
	
	$stmt -> bindParam(':nombredpto',$valor);
    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
	$result = $stmt->fetchAll(); 
    
    return $result;
}

function ver_dni($conn){
    $stmt = $conn->prepare("SELECT dni FROM emple");
    
    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
    
    return $result;
}

function consultar_salario($conn,$valor){
    $stmt = $conn->prepare("SELECT dni,salario FROM emple WHERE dni=:dniEmp");
    
    $stmt -> bindParam(':dniEmp',$valor);
    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
    
    return $result;
}

function mod_salario($conn,$nb,$sal){
    $stmt = $conn->prepare("UPDATE EMPLE SET salario=:salar WHERE dni=:dniEmp;");
        
    $stmt -> bindParam(':salar',$sal);
    $stmt -> bindParam(':dniEmp',$nb);
    $stmt->execute();

    echo "<br>Se actualizo el salario de $nb a $sal € ";
}

function alta_empleado($conn,$dni,$nombre,$salario,$fecha,$cod_dpto){
    $stmt = $conn->prepare("INSERT INTO EMPLE (dni,nombre,salario,fecha_nac,cod_dpto)
    VALUES(:dni,:nombre,:salario,:fecha,:cod_dpto);");
    $stmt->bindParam(':dni',$dni);
    $stmt->bindParam(':nombre',$nombre);
    $stmt->bindParam(':salario',$salario);
    $stmt->bindParam(':fecha',$fecha);
    $stmt->bindParam(':cod_dpto',$cod_dpto);
    
    $stmt->execute();
    echo "Alta Departamaneto correcta";
}

function contar_dpto($conn){
    $stmt = $conn->prepare("SELECT count(nombre) FROM dpto");
    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
    return $result;
}

function calcular_dpto($tot){
    foreach($tot as $row) {
        $contDpto = $row["count(nombre)"];
    }

        $contDpto++;
        $contDpto=str_pad($contDpto,3,"0",STR_PAD_LEFT);
        $codiDpto="D".$contDpto;
        return $codiDpto;
}

function añadir_dpto($conn,$val,$nombr){
    $nuev = $conn->prepare("INSERT INTO DPTO (cod_dpto,nombre) VALUES(:codDp,:nom);");     

    $nuev -> bindParam(':nom',$nombr);
    $nuev -> bindParam(':codDp',$val);

    $nuev->execute();

    echo "Departamento $nombr creado";
}

function ver_dpto($conn,$valor){
    $stmt = $conn->prepare("SELECT dpto.nombre
	FROM emple, dpto
	WHERE dpto.cod_dpto=emple.cod_dpto
	AND emple.dni=:dniEmp");

    $stmt -> bindParam(':dniEmp',$valor);   
    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();

    return $result;
}

function cambio_dpto($conn,$codDpto,$nb){
    $stmt = $conn->prepare("UPDATE EMPLE SET cod_dpto=:dpto WHERE dni=:dniEmp;");
        
    $stmt -> bindParam(':dpto',$codDpto);
    $stmt -> bindParam(':dniEmp',$nb);
    $stmt->execute();

    echo "<br>Se actualizo el Departamento de $nb a $codDpto ";
}

function registrar_cambioDPTO($conn,$codDpto,$nb,$fec){
    $stmt = $conn->prepare("INSERT INTO EMPLE_DPTO (cod_dpto,dni,fecha_inicio,FECHA_FIN)
    VALUES(:codDp,:nom,:fecha,'2000-11-11');");
    
    $stmt -> bindParam(':codDp',$codDpto);
    $stmt -> bindParam(':nom',$nb);
    $stmt -> bindParam(':fecha',$fec);
    $stmt->execute();

}
?>