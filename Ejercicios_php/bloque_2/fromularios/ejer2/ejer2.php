<?php
    $numero = $_GET['numero1'];
    $numero_aleatorio = random_int(1, 5);
    
    
    if($numero == $numero_aleatorio){
        echo "Has acertado <br>";
    } else echo "No has acertado <br>";
    
echo "Tu número: $numero <br> Numero alatorio: $numero_aleatorio";
?>