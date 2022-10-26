<HTML>
<HEAD><TITLE> Bolsa 2 </TITLE>
<style>
			h1{
				font-size:30px;
				text-align:center;
			}
			.error{color:red;}
		table,tr,td,th{
			border: 0.5px solid black;
			border-collapse:collapse;
			text-align:center;
			width:1500px;
		}
		.pri{
			text-align:left;
		}
	</style>
</HEAD>
<BODY>
<?php
$nb="";
$nb=limpia($_POST["val"]);

$fich=fopen("C:\wamp64\www\ut1\bolsa\ibex35.txt","r");

function limpia($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
$cont=0;
$n1="";
$n2="";
$n3="";
$n4="";
$n5="";
$n6="";
$n7="";
$n8="";
$n9="";
$n0="";
echo "<table>";
		while(!feof($fich)){
		if($cont==0){
			echo "<tr>";
			echo "<th class='pri'>". fgets($fich,23)."</th>";
			echo "<th>". fgets($fich,9)."</th>";
			echo "<th>". fgets($fich,8)."</th>";
			echo "<th>". fgets($fich,12)."</th>";
			echo "<th>". fgets($fich,10)."</th>";
			echo "<th>". fgets($fich,10)."</th>";
			echo "<th>". fgets($fich,12)."</th>";
			echo "<th>". fgets($fich,9)."</th>";
			echo "<th>". fgets($fich,14)."</th>";
			echo "<th>". fgets($fich,11)."</th>";
			echo "</tr>";
		}else{
			
			$n1=fgets($fich,23);
			$n2=fgets($fich,9);
			$n3=fgets($fich,8);
			$n4=fgets($fich,12);
			$n5=fgets($fich,10);
			$n6=fgets($fich,10);
			$n7=fgets($fich,12);
			$n8=fgets($fich,9);
			$n9=fgets($fich,14);
			$n0=fgets($fich,11);
			
			if(strcmp($nb,$n1)<-2 ){
				echo "<tr>";
				echo "<td class='pri'>". $n1."</td>";
				echo "<td>".$n2 ."</td>";
				echo "<td>".$n3 ."</td>";
				echo "<td>".$n4."</td>";
				echo "<td>".$n5."</td>";
				echo "<td>".$n6."</td>";
				echo "<td>".$n7."</td>";
				echo "<td>".$n8."</td>";
				echo "<td>".$n9."</td>";
				echo "<td>".$n0."</td>";
				echo "</tr>";
			}
		}
		$cont++;
		}
		echo "</table>";

?>
</BODY>
</HTML>