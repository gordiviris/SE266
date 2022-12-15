<?php

include_once __DIR__ . '/controllers/header.php';
include_once __DIR__ . "/controllers/functions.php";
include_once __DIR__ . "/controllers/reviewController.php";
if (!isUserLoggedIn())
{
    header ('Location: login.php');
    //echo "not logged in";
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/addreview.css">
    <link rel="stylesheet" href="css/footer.css">
    <title>Document</title>
</head>
<body>
    
    <div class="container">
        
        <div class="row">
            <div class="card"> 
                <form method="post" action="addReview.php" class="box"> 
                    <img src="images/CANCHITA_LOGO.png" alt="Canchita Logo" class="login-logo">
                    <input type="hidden" name="action" value="<?php echo $action; ?>">
                    <input type="hidden" name="userID" value="<?php echo $id; ?>">
                    <h1>Post A Review</h1> 
                    <?php echo $error;?>
                    <p class="login-text"> Please tell us how we did!</p> 
                    
                    <input type="text" class="info" name="title" placeholder="Title"> 
                    <input type="text" class="info" name="reviewEvent" placeholder="Event">
                    <textarea class="textarea" name="body" placeholder="Review Body"> </textarea>
                    <input type="text" class="info" name="rating" placeholder="Rating">
                    <button type="submit" class="postr" name="postReview"> <?php echo $action; ?> Review</button>


                </form> 
            </div> 
        </div>     
    </div>
    <div class="footer">
        <?php include_once __DIR__ . '/controllers/footer.php';?>
    </div> 
</body>
</html>