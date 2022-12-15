<?php
    include_once __DIR__ . '/functions.php';
    if (!isUserLoggedIn())
    {
        header ('Location: login.php');
    }

    include_once __DIR__ . '/../models/review.php';

    $configFile = __DIR__ . '/../models/dbconfig.ini';

    try 
    {
        $reviewDB = new Review($configFile);
    } 
    catch ( Exception $error ) 
    {
        echo "<h2>" . $error->getMessage() . "</h2>";
    }   
    
    $error="";
    if(isset($_GET['action'])){
        $action = filter_input(INPUT_GET, 'action');
        //$id = filter_input(INPUT_POST, 'userID');

        if($action == "update"){
        }
        else{
            $reviewID = "";
            $title = "";
            $reviewEvent = "";
            $body = "";
            $rating = "";
            $datePosted= date("Y-m-d");
        }
    } elseif(isset($_POST['action'])){
        $title = filter_input(INPUT_POST, 'title');
        $reviewEvent = filter_input(INPUT_POST, 'reviewEvent');
        $body = filter_input(INPUT_POST, 'body');
        $rating = filter_input(INPUT_POST, 'rating', FILTER_VALIDATE_FLOAT);
        $datePosted = date("Y-m-d");
        
        
    }
    if(isPostRequest() && $action="add"){
        
        if(isBlank($title)){
            $error .='<p class="error">*Title can not be blank</p>';
        }else{}

        
        if(isBlank($reviewEvent)){
            $error .='<p class="error">*Event can not be blank</p>';
        }else{}

        
        if(isBlank($body)){
            $error .='<p class="error">*Body can not be blank</p>';
        }else{}

        
        if(isBlank($rating)){
            $error .='<p class="error">*Invalid rating</p>';
        }else{
            if(!isValidRating($rating)){
                $error .='<p class="error">*Rating must be between 0 and 5</p>';
            }
            else{
            }
        }
        if($error==""){
        $result = $reviewDB->addReview($title, $reviewEvent, $body, $rating, $datePosted);
        header('Location: customerReviews.php');
        }
    }else{
        
    }
        
    

