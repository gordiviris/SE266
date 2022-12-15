<?php


// Test to determine if this is a POST event
function isPostRequest() 
{
    return (filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST' );
}

// Test to determine if this is a GET event
function isGetRequest() 
{
    return (filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'GET' && !empty($_GET) );
}

// Start session and check to see if the user is logged in
// RETURNS: True if user is already logged in, false otherwise
//      If session was not started, it will ne started shen function ends
function isUserLoggedIn()
{
    // Check session staus and start session if not running
    if (session_status() !== PHP_SESSION_ACTIVE) 
    {
        session_start();
    }

    // Check if isLoggedIn is set, then check its status
    return (array_key_exists('isLoggedIn', $_SESSION) && ($_SESSION['isLoggedIn']));
}

function ageVerification ($date){
    $start = new DateTime($date);
    $now = new Datetime();
    if($start > $now){
        return false;
    } else{
        $diff = date_diff($start, $now);
        if($diff->format('%y') >= 18){
            return true;
        }
        else{
            return false;
        }
    }
}

function isValidPhone($phone){
    $results = false;
    if(preg_match('/^[0-9]{10}+$/',$phone)){
        $results = true;
    } else{
        $results = false;
    }
    return $results;
}

function isValidUserName($user){
    $results=false;
    if(strlen($user)<=25){
        $results=true;
    }else{
        $results=false;
    }
    return $results;
}

function isValidPassword($password){
    $results=false;
    if(strlen($password)<=25){
        $results=true;
    }else{
        $results=false;
    }
    return $results;
}

function isBlank($var){
    if($var==""){
        return true;
    }else{
        return false;
    }
}

function isValidRating($num){
    if($num<0 || $num>5){
        return false;
    }
    else{
        return true;
    }
}

?>