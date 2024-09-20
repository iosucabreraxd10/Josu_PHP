<?php

$nombre = $email = $password = $confirm_password = "";
$nombre_err = $email_err = $password_err = $confirm_password_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty(trim($_POST["nombre"]))) {
        $nombre_err = "El nombre es obligatorio.";
    } elseif (!preg_match("/^[a-zA-Z\s]+$/", $_POST["nombre"])) {
        $nombre_err = "El nombre solo puede contener letras y espacios.";
    } else {
        $nombre = trim($_POST["nombre"]);
    }

    if (empty(trim($_POST["email"]))) {
        $email_err = "El correo electrónico es obligatorio.";
    } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $email_err = "Formato de correo electrónico no válido.";
    } else {
        $email = trim($_POST["email"]);
    }

    if (empty($_POST["password"])) {
        $password_err = "La contraseña es obligatoria.";
    } elseif (strlen($_POST["password"]) < 6) {
        $password_err = "La contraseña debe tener al menos 6 caracteres.";
    } elseif (!preg_match("/[A-Z]/", $_POST["password"])) {
        $password_err = "La contraseña debe tener al menos una letra mayúscula.";
    } elseif (!preg_match("/[a-z]/", $_POST["password"])) {
        $password_err = "La contraseña debe tener al menos una letra minúscula.";
    } elseif (!preg_match("/[0-9]/", $_POST["password"])) {
        $password_err = "La contraseña debe tener al menos un número.";
    } elseif (!preg_match("/[\W]/", $_POST["password"])) {
        $password_err = "La contraseña debe tener al menos un símbolo especial (@, #, !, etc.).";
    } else {
        $password = $_POST["password"];
    }

    if (empty($_POST["confirm_password"])) {
        $confirm_password_err = "Por favor, confirme la contraseña.";
    } elseif ($_POST["confirm_password"] !== $_POST["password"]) {
        $confirm_password_err = "Las contraseñas no coinciden.";
    } else {
        $confirm_password = $_POST["confirm_password"];
    }

    if (empty($nombre_err) && empty($email_err) && empty($password_err) && empty($confirm_password_err)) {
        echo "<p style='color:green;'>¡Registro exitoso! Bienvenido, $nombre.</p>";
    }
}

?>