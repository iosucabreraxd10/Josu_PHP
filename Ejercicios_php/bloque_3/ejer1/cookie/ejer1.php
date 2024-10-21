<?php

$duracion_cookie = time() + (3600 * 60);

if(isset($_COOKIE["contador_cookies"])){
    $contador_cookies = $_COOKIE["contador_cookies"] + 1;
    setcookie("contador_cookies", $contador_cookies, $duracion_cookie);
    
}else{
    $contador_cookies = 1;
    setcookie("contador_cookies", $contador_cookies, $duracion_cookie);
    
}

if(isset($_POST["reset_boton"])){
    setcookie("contador_cookies", "", time() - 3600);
    header("Refresh: 0");
}

?>
<html>
    <body>
        <form method="POST" action = "<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>">
            <input type="submit" name="reset_boton">
        </form>
        <?php
        
        if(isset($_COOKIE["contador_cookies"])){
            echo "El número de visitas es $contador_cookies";
        }else{
            echo "Esta es tu primera visita.";
        }
        
        ?>
    </body>
</html>