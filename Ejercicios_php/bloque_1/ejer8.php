<!DOCTYPE html>
<html>
<body>

<?php
$base = random_int(5, 20);
$fila = 1;

while($fila < $base){
	for($x = 0; $x < $fila; $x++){
    	echo "*";
    }
    echo "<br>";
    $fila = $fila + 2;
}
?>

</body>
</html>
