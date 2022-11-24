<HTML>
<HEAD><TITLE>ALTA DPTO</TITLE></HEAD>
<style>
h3{
	text-align:center;
}
</style>
<BODY>
<a href="empleadosnm.php">HOME</a>
<br>
<h3>ALTA DPTO </h3>
<form name="formu" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label type="text" name="nbDpto">NB Dpto <input name="nbDpto"></label>
    <br><br>
    <input type="submit" value="Añadir" name="enviar" />
</form>
<?php
if(empty($_POST)){}
else if($_POST["nbDpto"]!=""){
    $servername = "localhost";
    $username = "root";
    $password = "rootroot";
    $dbname = "empleadosnm";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("SELECT count(nombre) FROM dpto");
        $stmt->execute();

        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        //el resultado SELECT en array asociativo resultado
        $result = $stmt->fetchAll();
        foreach($result as $row) {
            $contDpto = $row["count(nombre)"];
        }

        $contDpto++;
        $contDpto=str_pad($contDpto,3,"0",STR_PAD_LEFT);
        $codiDpto="D".$contDpto;

        
        $nuev = $conn->prepare("INSERT INTO DPTO (COD_DPTO,NOMBRE) VALUES(:codDp,:nom);");
        $nuev->execute();

        if ($_SERVER["REQUEST_METHOD"]== "POST"){
            $nombr = $_POST["nbDpto"];
        }

        $nombr="Prueba";
        $codiDpto="D009";
        $nuev -> bindParam(':nom',$nombr);
        $nuev -> bindParam(':codDp',$codiDpto);
        

    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
}
?>
</BODY>
</HTML>