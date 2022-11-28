<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        font-size: 16px;
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
        background-color: #0000FF;
        }

        .dropdown:hover .dropdown-content {
        display: block;
        }
    </style>
</head>
<body>
<?php require "header.php";?>
    <div>
        <h3>Hobby Resources</h3>
        <ul>

            <li>
                <a href="https://www.youtube.com/c/LinusTechTips">Learning About New Tech </a>
            </li>

            <li>
                <a href="https://www.kayak.com/">Traveling New Places</a>
            </li>

            <li>
                <a href="https://www.instagram.com/lacanchitact/">My Family's Business</a>
            </li>

        </ul>
    </div>
    <div class="footer">
        <?php require "footer.php";?>
    </div>
</body>
</html>