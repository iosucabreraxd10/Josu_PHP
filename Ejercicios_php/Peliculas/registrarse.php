<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    if ($contraseña == $conf_contraseña) {
        if (!empty($nombre) && !empty($apellido) && !empty($email) && !empty($contraseña)) {
            $sql = "INSERT INTO mis_invitados (nombre, apellido, email, contraseña) 
                    VALUES ('$nombre', '$apellido', '$email', '$contraseña')";
            
            if ($conn->query($sql) === TRUE) {
                $_SESSION["nombre"] = $nombre;
                header('Location: peliculas_web.php');
                exit();
            } else {
                echo "Error al crear el usuario: " . $conn->error;
            }
        } else {
            echo "Todos los campos son obligatorios.";
        }
    } else {
        echo "Las contraseñas no coinciden.";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
</head>
<body>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        Nombre: <input type="text" name="nombre" required><br><br>
        Apellido: <input type="text" name="apellido" required><br><br>
        Correo electrónico: <input type="email" name="email" required><br><br>
        Contraseña: <input type="password" name="contraseña" required><br><br>
        Confirmar contraseña: <input type="password" name="conf_contraseña" required><br><br>
        <input type="submit" value="Registrar">
    </form>
</body>
</html>
