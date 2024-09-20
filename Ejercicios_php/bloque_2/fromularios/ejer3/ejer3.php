<?php
$nombre = $_POST['usuario'];
$email = $_POST['email'];
$contraseña = $_POST['contraseña'];
$repit_contraseña = $_POST['repit_contraseña'];

if($contraseña !== $repit_contraseña){
    echo "Usuario: $nombre <br> Email: $email <br>";
    echo "La contraseña no es la misma";
} else echo "Usuario: $nombre <br> Email: $email <br> Contraseña bien metida.";

?>