<HTML>
<HEAD><TITLE> EJ6B – Factorial</TITLE></HEAD>
<BODY>
<?php
$num="5";
$cont=$num;
$res="1";


echo "$num!= ";
while($cont!="0"){
	echo "$cont";
	$res=$res*$cont;
	$cont--;
	if($cont!="0"){
		echo"x";
	}
	
}
echo "=$res";
?>
</BODY>
</HTML>