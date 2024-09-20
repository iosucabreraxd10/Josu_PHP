<?php
function EncontrarFechas($texto){
    $patron = '/\b\d{2}\/\d{2}\/\d{4}\b/';
    
    preg_match_all($patron, $texto, $fechas);
    
    return $fechas[0];
}
$texto = "El proyecto comenzó el 15/02/2022 y la primera fase se completó el 23/03/2022. La segunda fase estaba planeada para el 12/04/2022, pero fue pospuesta al 30/05/2022 debido a retrasos en la entrega de materiales. Finalmente, el proyecto se terminó el 18/08/2022. Además, la revisión final se programó para el 05/09/2022 y la presentación de resultados será el 25/09/2022.";
$resultado = EncontrarFechas($texto);
print_r($resultado);
?>