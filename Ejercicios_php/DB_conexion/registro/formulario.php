<!DOCTYPE html>
<html>
<head>

</head>
<body>

<form method="POST" action="registro.php">
    Nombre: <input type="text" name="nombre" >
    <br><br>

    Apellido: <input type="text" name="apellido">
    <br><br>

    Correo electrónico: <input type="email" name="email">
    <br><br>

    Contraseña: <input type="password" name="contraseña">
    <br><br>

    Confirmar contraseña: <input type="password" name="conf_contraseña">
    <br><br>

    <input type="submit" value="Registrar">
</form>

<br><br>

<form method="POST" action="iniciosesion.php">
    Email <input type="text" name="email">
    <br><br>

    Contraseña <input type="password" name="contraseña">
    <br><br>

    <input type="submit" value="Iniciar sesión">
</form>

</body>
</html>
