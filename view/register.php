<!-- 
CREATE TABLE users (
id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
username VARCHAR(50) NOT NULL UNIQUE,
password VARCHAR(255) NOT NULL,
created_at DATETIME DEFAULT CURRENT_TIMESTAMP
); -->
<?php

require_once "config.php";

// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } elseif(!preg_match('/^[a-zA-Z0-9_]+$/',trim($_POST["username"]))){
        $username_err = "Username can only contain letters,numbers, and underscores.";
    } else{
    // Prepare a select statement

        $sql = "SELECT id FROM users WHERE username = ?";

        if($stmt = mysqli_prepare($link, $sql)){
    // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s",$param_username);

        // Set parameters
        $param_username = trim($_POST["username"]);

        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            /* store result */
            mysqli_stmt_store_result($stmt);

            if(mysqli_stmt_num_rows($stmt) == 1){
                $username_err = "This username is already taken.";
                } else{
                $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }

    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password !=$confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }

    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){

        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
        
        if($stmt = mysqli_prepare($link, $sql)){

            // Bind variables to the prepared statement as parameters

            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);

            // Set parameters

            $param_username = $username;

            $param_password = password_hash($password, PASSWORD_DEFAULT); 
            
            // Creates a password hash

            // Attempt to execute the prepared statement

            if(mysqli_stmt_execute($stmt)){

                // Redirect to login page

                header("location: /dashboard/smaproject/view/index.php");

            } else{

                echo "Oops! Something went wrong. Please try again later.";

            }

            // Close statement

            mysqli_stmt_close($stmt);

        }

    }

    // Close connection

    mysqli_close($link);

}

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
        <div class="centro">
            <div class="form_login" style="display: grid;">
                <div class="form_login_izq" >
                    <form method="POST" >
                        <label><strong> REGISTRO </strong></label><br>
                        <br><label>Usuario: </label>
                        <br><input type="text" id="user" name="username" value="" >
                        <br><br><label>Contraseña: </label><br>
                        <input type="password" id="pass" name="password" value="">
                        
                        <br><br><label>Confirmar Contraseña: </label><br>
                        <input type="password" id="pass" name="confirm_password" value="">
                        <br>
                        <button type="submit">Registrarse</button>
                        <button type="reset">Cancelar</button>
                        
                        
                       <br><br>
                    </form>
                    <button onclick="location.href='/dashboard/smaproject/login.php';">Log in</button>
                </div>
                
                <!-- <form>
                    
                </form> -->

            </div>


            
            
        </div>


        

        <div class="footer">
            <p>Sitio web creado por int 1, int 2, int 3, int 4. 2022.</p>
        </div>
    </body>
</html>