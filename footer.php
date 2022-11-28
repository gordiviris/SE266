<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="footer">
        <hr/>
        Kevin Andrade 2022 &copy | 
        <?php
            //From tim Henry's class_web_site
            date_default_timezone_set('America/New_York');
            $file = basename($_SERVER['PHP_SELF']);
            $mod_date=date("F d Y h:i:s A", filemtime($file));
            echo "Site last upadated $mod_date"; 
        ?>
    </div>
</body>
</html>