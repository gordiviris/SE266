<?php
include_once __DIR__ . '/controllers/signupController.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/signup.css">
    <link rel="stylesheet" href="css/footer.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="card"> 
                
                <form method="post" action="signup.php" class="box"> 
                    <img src="images/CANCHITA_LOGO.png" alt="Canchita Logo" class="login-logo">
                    <h1>Sign Up</h1> 
                    <?php echo $error;?>
                    <p class="login-text"> Please enter your information below!</p> 
                    <input type="text" class="info" name="fName" placeholder="First Name"> 
                    <input type="text" class="info" name="lName" placeholder="Last Name"> 
                    <input type="text" class="info" name="email" placeholder="Email">
                    <input type="text" class="info" name="phone" placeholder="Phone Number">
                    <label class="login-text" for="dob">Birthday </label>
                    <input type="date" class="info" id="dob" name="dob">  
                    <input type="text" class="info" name="userName" placeholder="Username"> 
                    <input type="password" class="info" name="password" placeholder="Password"> 
                    <input type="submit" name="signup" value="Signup" >


                </form> 
            </div> 
        </div>     
    </div>
    <div class="footer">
        <?php include_once __DIR__ . '/controllers/footer.php';?>
    </div>  
</body>
</html>