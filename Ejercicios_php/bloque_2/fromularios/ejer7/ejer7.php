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
$nombre = $correo = $contraseña = $conf_contraseña = "";
$nombreErr = $correoErr = $contraseñaErr = $conf_contraseñaErr = "";

// Verificar si el formulario se ha enviado
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    // Validar nombre
    if(empty($_POST["nombre"])){
        $nombreErr = "Nombre requerido.";
    }else if (!preg_match("/^[a-zA-Z\s]+$/", $_POST["nombre"])) {
        $nombreErr = "El nombre solo puede contener letras y espacios.";
    }else{
        $nombre = test_input($_POST["nombre"]);
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
