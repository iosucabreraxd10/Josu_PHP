<!DOCTYPE html>
<html>
<body>

<?php
$importe = 41000;
$comision;

if($importe < 10000){
	$comision = $importe - $importe * 0.05;
	echo "1-La comisión es: $comision";
} elseif($importe > 10000 && $importe < 20000){
		$comision = $importe - $importe * 0.08;
		echo "2-La comisión es: $comision";
	} elseif($importe > 20000 && $importe <40000){
			$comision = $importe - $importe * 0.1;
			echo "3-La comisión es: $comision";
		} elseif($importe > 40000){
				$comision = $importe - $importe * 0.13;
				echo "4-La comisión es: $comision";
			}

?>

</body>
</html>
