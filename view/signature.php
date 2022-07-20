
<?php 

session_start();
$username=$_SESSION["username"];
?>

<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Servicio de medioambiente del gobierno de Chile</title>
        <link rel="stylesheet" href="mystyle.css">
    </head>
    <body>
        <div class="banner"><img src="img\logo-principal.png"></div>
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
            <ul id="user-actions">
                <li><!-- <a href="#Login">Iniciar Sesión</a></li>
                <li><a href="#">Cerrar Sesión</a></li>
                <li><a href="#">Registrarse</a></li>
                <li><a href="#">Recuperar Contraseña</a> --></li>
            </ul>
        </div>
        <div class="tittle">
            <p>Listado de Documentos para Firmar</p>
            <div class="table-container">
                <table id="signatures">
                    <thead>
                        <tr>
                            <th>N° Folio</th> <th>Nombre Documento</th> <th>Fecha</th>
                        </tr>
                    </thead>
                    <tr>
                        <td>001</td> <td>Documento de prueba 1</td> <td>22/06/2022</td>
                    </tr>
                    <tr>
                        <td>002</td> <td>Documento de prueba 2</td> <td>23/07/2022</td>
                    </tr>
                    <tr>
                        <td>003</td> <td>Documento de prueba 2</td> <td>24/08/2022</td>
                    </tr>
                    <tr>
                        <td>004</td> <td>Documento de prueba 4</td> <td>25/09/2022</td>
                    </tr>
                    <tr>
                        <td>005</td> <td>Documento de prueba 5</td> <td>26/10/2022</td>
                    </tr>
                    <tr>
                        <td>006</td> <td>Documento de prueba 6</td> <td>27/11/2022</td>
                    </tr>
                    <tr>
                        <td>007</td> <td>Documento de prueba 7</td> <td>28/12/2022</td>
                    </tr>
                    <tr>
                        <td>008</td> <td>Documento de prueba 8</td> <td>29/01/2023</td>
                    </tr>
                    <tr>
                        <td>009</td> <td>Documento de prueba 9</td> <td>30/03/2023</td>
                    </tr>
                    <tr>
                        <td>010</td> <td>Documento de prueba 10</td> <td>31/04/2023</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="footer">
            <p>Sitio web creado por int 1, int 2, int 3, int 4. 2022.</p>
        </div>
    </body>
</html>