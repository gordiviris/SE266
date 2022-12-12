<?php
  // This should already be loaded, but just in case
  include_once __DIR__ . '/functions.php';
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

        .navbar {
        overflow: hidden;
        background-color: #333;
        }

        .navbar a {
        float: left;
        font-size: 14px;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        }

        .dropdown {
        float: left;
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

        .navbar a:hover, .dropdown:hover .dropbtn {
        background-color: blue;
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
        float: none;
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
        text-align: left;
        }

        .dropdown-content a:hover {
        background-color: ##0000FF;
        }

        .dropdown:hover .dropdown-content {
        display: block;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <a href="..\index.php"><img src="images\!GORDIVIRIS_PROD.LOGO.png" width="80px;" ></a>
        <a href="..\index.php">Home</a>
        <div class="dropdown">
            <button class="dropbtn">Assignments 
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content"> 
                <a href="W1c\index.php">Week 1 - Arrays </a>
                <a href="W1d\index.php">Week 1 - Associated</a>
                <a href="W1e\index.php">Week 1 - Booleans</a>
                <a href="W1f\index.php">Week 1 - Functions</a>
                <a href="W1g\index.php">Week 1 - FizzBuzz</a>
                <a href="W2b\index.php">Week 2 - Patient Intake</a>
                <a href="W3\index.php">Week 3 - ATM</a>
                <a href="W4\index.php">Week 4 - Patient List</a>
                <a href="W5\index.php">Week 5 - Patient Search</a>
                <a href="W7\index.php">Week 7- School Search</a>
                <a href="W2a\index.php">Week 7</a>
                <a href="W2a\index.php">Week 8</a>
                <a href="W2a\index.php">Week 9</a>
                <a href="W2a\index.php">Week 10</a>
    
            </div>
        </div>
        <a href="php_resources.php">PHP Resources</a>
        <a href="git_resources.php">Git Resources</a>
        <a href="hobbies.php">Hobby Resources</a>
        <a href="https://github.com/gordiviris/SE266" target="_blank">Kevin's Github Repo</a>
        

        <?php
        // We want to hide the Logout button if the user is not logged in
        // because that means we are on the Login page
        // Since the session should have been destroyed, we first check to see if isLoggedIn exists
        // It may exist if an already logged in user manually loads or reloads login.php 
        if (isUserLoggedIn()) 
        { ?>
            <a href="schoolUpload.php">Upload File</a>
            <a href="schoolSearch.php">Search Schools</a>
            <a class="nav navbar-nav navbar-right" href="logoff.php">Logout</a>
            
            <?php
        } 
        ?>
    </div>
</body>
</html>