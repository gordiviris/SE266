<?php
  // This should already be loaded, but just in case
  include_once __DIR__ . '/functions.php';
  include_once __DIR__ . '/../models/model_users.php';

    $configFile = __DIR__ . '/../models/dbconfig.ini';
    try 
    {
        $userDB = new UserDB ($configFile);
    } 
    catch ( Exception $error ) 
    {
        echo "<h2>" . $error->getMessage() . "</h2>";
    } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <title>Kevin Andrade | SE266</title>
    <style>
        body {
        font-family: Arial, Helvetica, sans-serif;
        }
        
        .navimg{
            align-items: end;
            width: 100px;
        }

        .navbar {
        overflow: hidden;
        background-color: #000000;
        }

        .left {
        font-size: 16px;
        color: white;
        padding: 14px 20px;
        align-items: end;
        text-align: center;
        text-decoration: none;
        }

        .logout{
            position:relative;
            left: 65%;
            border: 0;
            background: none;
            margin: 20px auto;
            text-align: center;
            border: 2px solid #CD9900;
            padding: 14px 40px;
            outline: none;
            color: white;
            border-radius: 24px;
            transition: 0.25s;
            cursor: pointer;
            font-size: 16px;
            color: white;
            padding: 14px 20px;
            align-items: end;
            text-align: center;
            text-decoration: none;
        }

        .login{
            position:relative;
            left: 80%;
            border: 0;
            background: none;
            margin: 20px auto;
            text-align: center;
            border: 2px solid #CD9900;
            padding: 14px 40px;
            outline: none;
            color: white;
            border-radius: 24px;
            transition: 0.25s;
            cursor: pointer;
            font-size: 16px;
            color: white;
            padding: 14px 20px;
            align-items: end;
            text-align: center;
            text-decoration: none;
        }

        .logout:hover, .login:hover{
            background:#CD9900;
            color: black;
            text-decoration: none;
        }

        .dropdown {
        
        overflow: hidden;
        }

        .dropdown .dropbtn {
        font-size: 16px;  
        border: none;
        outline: none;
        color: white;
        padding: 14px 16px;
        background-color: inherit;
        font-family: inherit;
        margin: 0;
        }

        .left:hover, .dropdown:hover .dropbtn {
        color: #CD9900;
        text-decoration: none;
        }

        .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
        }

        .dropdown-content a {
        
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
        text-align: left;
        }

        .dropdown-content a:hover {
        color: #0000FF;
        }

        .dropdown:hover .dropdown-content {
        display: block;
        }
    </style>
</head>
<body>
    <div class="navbar">
       <img src="images/CANCHITA_LOGO.png" class="navimg" >
        <a href="..\index.php" class="left">Home</a>

        <?php
        // We want to hide the Logout button if the user is not logged in
        // because that means we are on the Login page
        // Since the session should have been destroyed, we first check to see if isLoggedIn exists
        // It may exist if an already logged in user manually loads or reloads login.php 
        if (isUserLoggedIn()) 
        { ?>
        <a href="customerReviews.php" class="left">Reviews</a>
        <a href="addReview.php?action=add" class="left">Leave a Review</a>
        <a href="logoff.php" class="logout">Log Out</a>

        <?php
        } else{ ?>
            <a href="logoff.php" class="login">Log In</a>
        <?php
        }
        ?>
        

        
    </div>
</body>
</html>