<!DOCTYPE html>
<html>
<body>

<?php
$total_compra = 404;
$tipo_compra = false;
$iva;

if($total_compra < 19){
	if($tipo_compra == true){
    	echo "No se puede enviar";
        $iva = $total_compra + $total_compra * 0.1;
        echo "<br>";
        echo "Precio final: $iva";
    }else{ 
    	echo "1-Los gastos de envio son 9 euros.";
    	$iva = $total_compra + $total_compra * 0.21;
        echo "<br>";
        echo "Precio final: $iva";
    }
}elseif($total_compra > 19 && $total_compra < 40){
	if($tipo_compra == true){
    	echo "2-Los gastos de envio son 9 euros.";
        $iva = $total_compra + $total_compra * 0.1;
        echo "<br>";
        echo "Precio final: $iva";
    }else{ 
    	echo "3-Los gastos de envio son 9 euros.";
    	$iva = $total_compra + $total_compra * 0.21;
        echo "<br>";
        echo "Precio final: $iva";
    }
}elseif($total_compra > 80){
	if($tipo_compra == true){
    	echo "Los envios son gratuitos";
        $iva = $total_compra + $total_compra * 0.1;
        echo "<br>";
        echo "Precio final: $iva";
    }else{ 
    	echo "Los envios son gratuitos";
    	$iva = $total_compra + $total_compra * 0.21;
        echo "<br>";
        echo "Precio final: $iva";
    }
	
}
?>

</body>
</html>
