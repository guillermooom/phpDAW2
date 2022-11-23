<HTML>
<HEAD><TITLE>LISTADO EMPLEADOS</TITLE></HEAD>
<style>
h3{
	text-align:center;
}
</style>
<BODY>
<br>
<h3>LISTADO EMPLEADOS </h3>
<form name="formu" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
DPTO
    <select name="dep">
        <?php
    $servername = "localhost";
    $username = "root";
    $password = "rootroot";
    $dbname = "empleadosnm";
    
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        $stmt = $conn->prepare("SELECT nombre FROM dpto");
    
        $stmt->execute();
    
        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        //el resultado SELECT en array asociativo resultado
        $result = $stmt->fetchAll();
        // var_dump($result);
        foreach($result as $row) {
            echo "<option value=".$row["nombre"].">". $row["nombre"]. "</option>";
        }
    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
    ?>
    </select>
    <br>
    <br>
    <input type="submit" value="enviar" name="enviar" />
    <input type="reset" value="borrar" name="enviar" />
</form>
<?php
$servername = "localhost";
$username = "root";
$password = "rootroot";
$dbname = "empleadosnm";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("SELECT emple.dni, emple.nombre, emple.salario, emple.fecha_nac
	FROM emple, dpto
	WHERE dpto.cod_dpto=emple.cod_dpto
	AND dpto.nombre=:nombredpto");
	if ($_SERVER["REQUEST_METHOD"]== "POST"){
		$valor = $_POST["dep"];//VALOR RECOGIDO POR LA PANTALLA
	}
	$stmt -> bindParam(':nombredpto',$valor);
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
	//el resultado SELECT en array asociativo resultado
	$result = $stmt->fetchAll();
	//var_dump($result);
	foreach($result as $row) {
        echo "Empleado: " . $row["dni"]. "-" . $row["nombre"]."-" . $row["salario"]."-" . $row["fecha_nac"]. "<br>";
    }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
?>
</BODY>
</HTML>