<?php

include_once __DIR__ . '/controllers/header.php';
include_once __DIR__ . "/controllers/functions.php";
include_once __DIR__ . "/controllers/listController.php";
if (!isUserLoggedIn())
{
    header ('Location: login.php');
    //echo "not logged in";
}
$reviews = $reviewDB->getReviews();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/search.css">
    <script src="https://kit.fontawesome.com/2de54c6258.js" crossorigin="anonymous"></script>
    <title>Search Customers</title>
</head>
<body>
    <div class="container"> 
        <div class="header">
            <h1><b>Customer Reviews</b></h1>
        </div> 
        <?php foreach ($reviews as $row): ?>
            <div class="review">
                <h1><?php echo $row['title']?></h1>
                <h2><?php echo $row['reviewEvent']?></h2>
                <h3><span style="color:#CD9900;"><i class="fa-solid fa-star"></i></span> <?php echo $row['rating']?></h3>
                <p class="rbody"><?php echo $row['body']?></p>
                <p><?php echo $row['datePosted']?></p>
            </div>
            <div>
        </div>
        <?php endforeach; ?>       
    </div>
    <div class="list">
            <p>bottom</p>
    </div>
</body>
</html>