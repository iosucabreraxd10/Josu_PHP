<?php

session_start();

if($_SERVER["REQUEST_METHOD"] == "POST"){
$servername = "db";
$username = "root";
$password = "root";
$database = "mydatabase";

$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$email = $_POST["email"];
$contraseña = $_POST["contraseña"];
$conf_contraseña = $_POST["conf_contraseña"];

$conn = new mysqli($servername, $username, $password, $database);

if($conn -> connect_error){
    die("Conexión fallida" . $conn -> connect_error);
}

if($_POST["conf_contraseña"] == $_POST["contraseña"]){
    if(!empty($nombre) && !empty($apellido) && !empty($email) && !empty($contraseña)){
        $stmt =$conn->prepare ("INSERT INTO mis_invitados (nombre, apellido, email, contraseña) values (?, ?, ?, ?)");
        $stmt -> bind_param("ssss", $nombre, $apellido, $email, $contraseña);
        
        if($stmt->execute()){
            $_SESSION["nombre"] = $nombre;
            header('Location: principal.php');
            
        }else {
            echo "Error al crear el usuario" . $conn->error . "<br>";
        }

        $stmt->close();
    }else {
        echo "Todos los campos son obligatorios.<br>";
    }
}else {
    echo "Mal";
}
$conn -> close();
}
?>