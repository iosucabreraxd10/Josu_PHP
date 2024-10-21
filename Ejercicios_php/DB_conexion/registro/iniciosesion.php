<?php
session_start();

$servername = "db";
$username = "root";
$password = "root";
$database = "mydatabase";

$email = $_POST["email"];
$contraseña = $_POST["contraseña"];

$conn = new mysqli($servername, $username, $password, $database);

if($conn -> connect_error){
    die("Conexión fallida: " . $conn -> connect_error);
}

if(!empty($email) && !empty($contraseña)){
    $sql = "SELECT nombre FROM mis_invitados WHERE email = '$email' AND contraseña = '$contraseña'";
    $result = $conn -> query($sql);
    $nombre_saludo = "";
    while($row = $result -> fetch_assoc()){
        $nombre_saludo = $row["nombre"];
    }
    if(!empty($nombre_saludo)){
       $_SESSION["nombre"] = $nombre_saludo ;
       header('Location: principal.php');
    }else{
        echo "Email incorrecto";
    }
    
}else{
    echo "Todos los campos son obligatorios.<br>";
}







?>