<!DOCTYPE html>
<html>
<body>

<?php
$potencia = 3;
$cantidad = 100;
$pot_cant;

for($i = 1; $i <= $cantidad; $i++){
	$pot_cant = $i ** $potencia;
    echo "$i-$pot_cant";
    echo "<br>";
}
?>

</body>
</html>
