<?php 

session_start();
$username = $_SESSION["username"];
?>

<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Servicio de medioambiente del gobierno de Chile</title>
        <link rel="stylesheet" href="mystyle.css">
    </head>
    <body>
        <div class="banner"><img src="img/logo-principal.png"></div>
        <div class="logogob"><img src="img\logo-03.png" width="100px" height="100px"></div>
        <div id="navbar">
            <ul>
                <li id="panel"></li>
                <!-- <li></li> -->
                <li style="color: white;
    text-align: center;text-decoration: none;font-weight: light 300;"><img src="https://openclipart.org/image/2400px/svg_to_png/247319/abstract-user-flat-3.png" style="object-fit:fill;height:1rem;width:1rem"><?php echo ' '.$username ?></li>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="signature.php">Firmar Documentos</a></li>
                <li><a href="review.php">Revisar Documentos</a></li>
                <li><a href="https://cdn.discordapp.com/attachments/961776783663980567/998799896637341737/Manual.pdf">Ver Manual de Uso</a></li>
                <li><a href="logout.php">Cerrar Sesion</a></li>
            </ul>
        </div>
        <div class="controlpanel">
            <!-- <ul id="user-actions">
                <li><a href="#Login">Iniciar Sesión</a></li>
                <li><a href="#">Cerrar Sesión</a></li>
                <li><a href="#">Registrarse</a></li>
                <li><a href="#">Recuperar Contraseña</a></li>
            </ul> -->
        </div>
        <div class="tittle">
            <p>Bienvenido al portal de firmas de la</p>
            <p>SMA</p>
            <div class="img-index">
                <img src="img\const.png" width="500px">
            </div>
            
        </div>
        <div class="footer">
            <p>Sitio web creado por int 1, int 2, int 3, int 4. 2022.</p>
        </div>
    </body>
</html>