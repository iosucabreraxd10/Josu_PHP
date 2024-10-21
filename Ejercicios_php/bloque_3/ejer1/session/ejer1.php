<?php

session_start();

if(isset($_SESSION["contador_cookies"])){
    $contador_cookies = $_SESSION["contador_cookies"] + 1;
    $_SESSION["contador_cookies"] = $contador_cookies;
}else{
    $contador_cookies = 1;
    $_SESSION["contador_cookies"] = $contador_cookies;
}

if(isset($_POST["reset_boton"])){
    session_unset();
    session_destroy();
}

?>
<html>
    <body>
        <form method="POST" action = "<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>">
            <input type="submit" name="reset_boton">
        </form>

        <?php
        
        if(isset($_SESSION["contador_cookies"])){
            echo "El número de visitas es $contador_cookies";
        }else{
            echo "Esta es tu primera visita.";
        }
        
        ?>
    </body>
</html>