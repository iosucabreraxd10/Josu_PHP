<!DOCTYPE html>
<html>
<body>

<?php
$num_pisos = 5;
$num_puertas_por_piso = 4;

echo "<h2>Lista de Casas de la Comunidad:</h2>";

for($piso = 1; $piso <= $num_pisos; $piso++){
    for($puerta = 1; $puerta <= $num_puertas_por_piso; $puerta++){
        echo "Piso $piso - Puerta $puerta<br>";
    }
}
?>

</body>
</html>
