
<?php
$servername = "db";
$username = "root";
$password = "root";
$database = "mydatabase";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
  die("Conexión fallida: " . $conn->connect_error);
}
echo "Conexión exitosa <br>";
/*
// sql to create table
$sql = "CREATE TABLE mis_invitados (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(30) NOT NULL,
    apellido VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";


if ($conn->query($sql) === TRUE) {
    echo "Tabla mis_invitados ha sido creada con éxito <br>";
} else {
    echo "Error creando la tabla: " . $conn->error;
}
*/

$sql = "INSERT INTO mis_invitados (nombre, apellido, email)
VALUES ('John', 'Doe', 'john@example.com')";

if ($conn->query($sql) === TRUE) {
  echo "Nuevo invitado creado con éxito.";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>