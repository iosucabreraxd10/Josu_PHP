<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
$nombre = trim($_POST['nombre']);
$valoracion = $_POST['valoracion'];
$comentario = $_POST['comentario'];
}

echo "Nombre: $nombre <br>";
echo "Valoración: $valoracion <br>";
echo "Comentario: $comentario <br>";

?>