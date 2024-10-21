<!DOCTYPE html>
<html>
<head>
    <style>
        .error {color: #FF0000;}
    </style>
</head>
<body>

<?php
// Inicializar variables
$nombre = $apellido = $correo = $contraseña = $conf_contraseña = "";
$nombreErr = $apellidoErr = $correoErr = $contraseñaErr = $conf_contraseñaErr = "";

// Verificar si el formulario se ha enviado
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    $servername = "db";
    $username = "root";
    $password = "root";
    $database = "mydatabase";

    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $contraseña = $_POST["contraseña"];
    $apellido = $_POST["apellido"];

// Create connection
    $conn = new mysqli($servername, $username, $password, $database);

// Check connection
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }
    echo "Conexión exitosa <br>";



    // Validar nombre
    if(empty($_POST["nombre"])){
        $nombreErr = "Nombre requerido.";
    }else if (!preg_match("/^[a-zA-Z\s]+$/", $_POST["nombre"])) {
        $nombreErr = "El nombre solo puede contener letras y espacios.";
    }else{
        $nombre = test_input($_POST["nombre"]);
    }

    //Valida apellido
    if(empty($_POST["apellido"])){
        $apellido = "Apellido requerido.";
    }else if (!preg_match("/^[a-zA-Z\s]+$/", $_POST["apellido"])) {
        $apellidoErr = "El nombre solo puede contener letras y espacios.";
    }else{
        $apellido = test_input($_POST["apellido"]);
    }

    // Validar correo
    if(empty($_POST["email"])){
        $correoErr = "Correo requerido.";
    }else if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $correoErr = "Formato de correo electrónico no válido.";
    }else{
        $correo = test_input($_POST["email"]);
    }

    // Validar contraseña
    if(empty($_POST["contraseña"])){
        $contraseñaErr = "Contraseña requerida.";
    }else if (strlen($_POST["contraseña"]) < 6) {
        $contraseñaErr = "La contraseña debe tener al menos 6 caracteres.";
    }else if (!preg_match("/[A-Z]/", $_POST["contraseña"])) {
        $contraseñaErr = "La contraseña debe tener al menos una letra mayúscula.";
    }else if (!preg_match("/[a-z]/", $_POST["contraseña"])) {
        $contraseñaErr = "La contraseña debe tener al menos una letra minúscula.";
    }else if (!preg_match("/[0-9]/", $_POST["contraseña"])) {
        $contraseñaErr = "La contraseña debe tener al menos un número.";
    }else if (!preg_match("/[\W]/", $_POST["contraseña"])) {
        $contraseñaErr = "La contraseña debe tener al menos un símbolo especial (@, #, !, etc.).";
    }else{
        $contraseña = test_input($_POST["contraseña"]);
    }

    // Confirmar contraseña
    if(empty($_POST["conf_contraseña"])){
        $conf_contraseñaErr = "Confirma la contraseña.";
    }else if ($_POST["conf_contraseña"] !== $_POST["contraseña"]) {
        $conf_contraseñaErr = "Las contraseñas no coinciden.";
    }else{
        $conf_contraseña = test_input($_POST["conf_contraseña"]);
    }

    // Si no hay errores, mostrar mensaje de éxito
    if (empty($nombreErr) && empty($correoErr) && empty($contraseñaErr) && empty($conf_contraseñaErr)) {
        echo "<p style='color:green;'>¡Registro exitoso! Bienvenido, $nombre.</p>";
        $sql = "INSERT INTO mis_invitados (nombre, apellido, email) values ('$nombre', '$apellido', '$email')";

        if ($conn->query($sql) === TRUE) {
        echo "Nuevo invitado creado con éxito.";
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

$conn->close();
    }
}

// Función para limpiar datos de entrada
function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<!-- Formulario HTML -->
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    Nombre: <input type="text" name="nombre" value="<?php echo $nombre; ?>">
    <span class="error"><?php echo $nombreErr;?></span>
    <br><br>

    Apellido: <input type="text" name="apellido" value="<?php echo $apellido; ?>">
    <span class="error"><?php echo $apellidoErr;?></span>
    <br><br>

    Correo electrónico: <input type="email" name="email" value="<?php echo $correo; ?>">
    <span class="error"><?php echo $correoErr;?></span>
    <br><br>

    Contraseña: <input type="password" name="contraseña">
    <span class="error"><?php echo $contraseñaErr;?></span>
    <br><br>

    Confirmar contraseña: <input type="password" name="conf_contraseña">
    <span class="error"><?php echo $conf_contraseñaErr;?></span>
    <br><br>

    <input type="submit" value="Registrar">
</form>

</body>
</html>
