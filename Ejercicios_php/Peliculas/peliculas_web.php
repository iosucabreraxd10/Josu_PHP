<?php
session_start();

if (!isset($_SESSION["nombre"])) {
    header('Location: login.php');
    exit();
}

$servername = "db";
$username = "root";
$password = "root";
$database = "mydatabase";
$usuario = $_SESSION["nombre"];

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST["titulo"];
    $isan = $_POST["isan"];
    $ano = $_POST["ano"];
    $puntuacion = $_POST["puntuacion"];

    if (!empty($isan) && strlen($isan) == 8) {
        $sql_select = "SELECT * FROM peliculasUsuario WHERE usuario = '$usuario' AND isan = '$isan'";
        $result_select = $conn->query($sql_select);

        if ($result_select->num_rows > 0) {
            if (!empty($titulo)) {
                $sql_update = "UPDATE peliculasUsuario SET nombre_pelicula = '$titulo', puntuacion = '$puntuacion', ano = '$ano'
                               WHERE usuario = '$usuario' AND isan = '$isan'";
                if ($conn->query($sql_update) === TRUE) {
                    echo "Película actualizada.";
                } else {
                    echo "Error al actualizar: " . $conn->error;
                }
            } else {
                $sql_delete = "DELETE FROM peliculasUsuario WHERE usuario = '$usuario' AND isan = '$isan'";
                if ($conn->query($sql_delete) === TRUE) {
                    echo "Película eliminada.";
                } else {
                    echo "Error al eliminar: " . $conn->error;
                }
            }
        } else {
            if (!empty($titulo) && !empty($ano)) {
                $sql_insert = "INSERT INTO peliculasUsuario (usuario, isan, nombre_pelicula, puntuacion, ano) 
                               VALUES ('$usuario', '$isan', '$titulo', '$puntuacion', '$ano')";
                if ($conn->query($sql_insert) === TRUE) {
                    echo "Película agregada.";
                } else {
                    echo "Error al agregar: " . $conn->error;
                }
            } else {
                echo "Todos los campos son obligatorios.";
            }
        }
    } else {
        echo "El ISAN debe tener 8 dígitos.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Películas</title>
</head>
<body>
    <h2>Bienvenido, <?php echo htmlspecialchars($_SESSION["nombre"]); ?></h2>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        Título: <input type="text" name="titulo"><br><br>
        ISAN (8 dígitos): <input type="text" name="isan" required><br><br>
        Año: <input type="date" name="ano" required><br><br>
        Puntuación: 
        <select name="puntuacion">
            <option value="0">0</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select><br><br>
        <input type="submit" value="Guardar">
    </form>
</body>
</html>
