<?php

    include_once __DIR__ . '/controllers/loginController.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/LoginStyle.css">
    <title>Log-In</title>
</head>
<body>
    
<div class="container">
    <div class="row"> 
        <div class="col-md-6"> 
            <div class="card"> 
            
                <form method="post" action="login.php" class="box"> 
                    <img src="images/CANCHITA_LOGO.png" alt="Canchita Logo" class="login-logo">
                    <h1>Login</h1> 
                    <p class="login-text"> Please enter your login and password!</p> 
                    <input type="text" name="userName" placeholder="Username"> 
                    <input type="password" name="password" placeholder="Password"> 
                    <input type="submit" name="login" value="Login" >
                    <p>New User?</p>
                    <a href="signup.php" >Sign Up</a>

                </form> 
            </div> 
        </div> 
    </div>
</div>
</body>
</html>