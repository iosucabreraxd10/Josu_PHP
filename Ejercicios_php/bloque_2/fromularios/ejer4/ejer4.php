<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
$nombre = test_input($_POST['nombre']);
$apellido = test_input($_POST['apellido']);
$email = test_input($_POST['email']);
$telefono = test_input($_POST['telefono']);
}

function test_input($data){
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

echo "<h3>Contacto agrgado:</h3>";
echo "Nombre: $nombre <br>";
echo "Apellido: $apellido <br>";
echo "Email: $email <br>";
echo "Telefono: $telefono";

?>