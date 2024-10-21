<?php
session_start();

$nombre = "admin";
$contraseña = "1234";


$nombreErr = $contraseñaErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if($_POST["nombre"] == $nombre && $_POST["contraseña"] == $contraseña){
        $_SESSION["usuario"] = $nombre;
        $_SESSION["contador_sesion"] = 1;
    }else{
        $nombreErr = "Datos incorrectos";
    }
}


function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }


?>

<html>
    <body>
        <form method="POST" action = "<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>">
            <p>Nombre: </p>
            <input type="text" name="nombre">
            <span><?php echo $nombreErr;?></span>
            <br>
            <p>Contraseña: </p>
            <input type="password" name="contraseña">
            <span><?php echo $contraseñaErr;?></span>
            <br>
            <input type="submit">
        </form>

        <?php
        
        if(isset($_SESSION["contador_sesion"])){
            echo "Se ha iniciado sesión";
        }
        
        ?>
    </body>
</html>