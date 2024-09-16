<!DOCTYPE html>
<html>
    <style>
        table{
            border-collapse: collapse;
        }
    </style>
<body>

<table border="1">
<?php

$numero = 4;
$multiplicador = 1;
$resultado = 0;

for($i = 0; $i < 10; $i++){
    $resultado = $numero * $multiplicador;
    echo "<tr><td> $numero x $multiplicador </td><td>$resultado</td>";
    $multiplicador++;
}

?>

</table>
</body>
</html>
