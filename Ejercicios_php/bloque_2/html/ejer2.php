<!DOCTYPE html>
<html>
    <style>
        table{
            border-collapse: collapse;
        }
    </style>
<body>
<?php
$contenido = [
    ['Messi', '40', 'Bolivia'],
    ['Jaimito', '8', 'Pisos picados'],
    ['Asier', '12', 'Madrid'],
    ['Cristiano', '80', 'Arabia'],
    ['Markel', '20', 'Eibar']
    ];

echo "<table border='1'>";
    for($i = 0; $i < count($contenido); $i++){
        echo "<tr>";
        for($j = 0; $j < count($contenido[$i]); $j++){
            $celda = htmlspecialchars($contenido[$i][$j]);
            echo "<td> $celda </td>";
        }
        echo "</tr>";
    }
echo "</table>";
?>
</body>
</html>
