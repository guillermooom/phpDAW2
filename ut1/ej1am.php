<HTML>
<HEAD><TITLE> EJ1AM</TITLE></HEAD>
<style>
table,td{
	border: 1px solid black;
	border-collapse:collapse;
	text-align:center;
	width:150px;
}

</style>
<BODY>
<?php
$cont="";
$arr=[[2,4,6],
	[8,10,12],
	[14,16,18]];
echo "<table>";
for($i=0;$i<count($arr);$i++){
	echo "<tr>";
	for($j=0;$j<count($arr[$i]);$j++){
		$cont=$arr[$i][$j];
		echo "<td>$cont</td>";
	}
}
echo "</table>";
?>
</BODY>
</HTML>