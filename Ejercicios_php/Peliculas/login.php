<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "db";
    $username = "root";
    $password = "root";
    $database = "mydatabase";

    $email = $_POST["email"];
    $contraseña = $_POST["contraseña"];

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    if (!empty($email) && !empty($contraseña)) {
        $sql = "SELECT nombre, contraseña FROM mis_invitados WHERE email = '$email'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if ($contraseña == $row['contraseña']) {
                $_SESSION["nombre"] = $row["nombre"];
                header('Location: peliculas_web.php');
                exit();
            } else {
                echo "Contraseña incorrecta.";
            }
        } else {
            echo "El email no está registrado.";
        }
    } else {
        echo "Todos los campos son obligatorios.";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        Email: <input type="text" name="email" required><br><br>
        Contraseña: <input type="password" name="contraseña" required><br><br>
        <input type="submit" value="Iniciar sesión">
    </form>
</body>
</html>
