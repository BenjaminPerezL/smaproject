<!-- 
LA BASE DE DATOS SE DEBE LLAMAR "smabd"

CREATE TABLE users (
id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
username VARCHAR(50) NOT NULL UNIQUE,
password VARCHAR(255) NOT NULL,
created_at DATETIME DEFAULT CURRENT_TIMESTAMP
); -->

<?php

// Initialize the session

session_start();

// Check if the user is already logged in, if yes thenredirect him to welcome page

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){

    header("location: view\index.php");

    exit;

}else{

// Include config file

require_once "view\config.php";;


// Define variables and initialize with empty values

$username = $password = "";

$username_err = $password_err = $login_err = "";

// Processing form data when form is submitted

if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Check if username is empty

    if(empty(trim($_POST["username"]))){

        $username_err = "Please enter username.";

    } else{

        $username = trim($_POST["username"]);

    }

    // Check if password is empty

    if(empty(trim($_POST["password"]))){

        $password_err = "Please enter your password.";

    } else{


        $password = trim($_POST["password"]);

    }

    // Validate credentials

    if(empty($username_err) && empty($password_err)){

        // Prepare a select statement

        $sql = "SELECT id, username, password FROM users WHERE username = ?";

        if($stmt = mysqli_prepare($link, $sql)){

            // Bind variables to the prepared statement as parameters

            mysqli_stmt_bind_param($stmt, "s", $param_username);

            
            // Set parameters

            $param_username = $username;

            // Attempt to execute the prepared statement

            if(mysqli_stmt_execute($stmt)){

                // Store result

                mysqli_stmt_store_result($stmt);

                // Check if username exists, if yes then verify password

                if(mysqli_stmt_num_rows($stmt) == 1){

                    // Bind result variables

                    mysqli_stmt_bind_result($stmt, $id,$username, $hashed_password);

                    if(mysqli_stmt_fetch($stmt)){

                        if(password_verify($password, $hashed_password)){

                            // Password is correct, so start a new session 
                            session_start();

                            // Store data in session variables

                            $_SESSION["loggedin"] = true;

                            $_SESSION["id"] = $id;

                            $_SESSION["username"] = $username;

                            // Redirect user to welcome page

                            header("location: view\index.php");

                        } else{

                            // Password is not valid, display a generic error message

                            $login_err = "Invalid password.";

                        }
                    }
                } else{
                
                    // Username doesn't exist, display a generic error message
                
                    $login_err = "Invalid username.";
                
                }
                
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
}
?>


<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Servicio de medioambiente del gobierno de Chile</title>
        <link rel="stylesheet" href="view/mystyle.css">
    </head>
    <body>
        <div class="banner"><img src="view/img/logo-principal.png"></div>
        <div class="logogob"><img src="view/img\logo-03.png" width="100px" height="100px"></div>
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
            <div class="form_login" style="display: grid">
            
                <div class="form_login_izq" >
                    
                    <form method="POST" >
                        <label><strong> LOG IN </strong></label><br>
                        <label style=color:red;> <?php echo $login_err;?></label><br>
                        <label>Usuario: </label>
                        <br><input type="text" id="user" name="username" value="" >
                        <br><br><label>Contraseña: </label><br>
                        <input type="password" id="pass" name="password" value="">
                        <br><br>
                        <button type="submit">Login</button>
                        <button type="reset">Cancelar</button>
                        
                        <br><br><br><br>
                    </form>
                    <button onclick="location.href='/dashboard/smaproject/view/register.php';">Register</button>
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