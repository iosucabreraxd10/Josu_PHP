<!DOCTYPE html>
<html>
<body>

<?php
$num1 = 55;
$num2 = 6;
$num3 = 33;
if($num1 > $num2 && $num1 > $num3){
	echo "$num1 es el numero mas grande.";
}elseif($num2 > $num1 && $num2 > $num3){
	echo "$num2 es el numero mas grande.";
}else echo "$num3 es el numero mas grande.";
?>

</body>
</html>
