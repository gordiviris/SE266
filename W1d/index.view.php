<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- making unordered list-->
    <ul>
        <!-- running foreach loop to go through each item in array-->
        <?php foreach ($todo as $key => $info)
            //for each item echo out the key name and value stored in key
            echo "<li><strong>$key</strong> $info</li>"
        ?>
            
    </ul>
</body>
</html>