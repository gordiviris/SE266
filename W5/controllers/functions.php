<?php

/**
 * A method to check if a Post request has been made.
 *    
 * @return boolean
 */
function isPostRequest(){
    return(filter_input(INPUT_SERVER, 'REQUEST_METHOD') ==='POST');
}

function isUserLoggedIn()
{
    // Check session staus and start session if not running
    if (session_status() !== PHP_SESSION_ACTIVE) 
    {
        session_start();
    }

    //Check if isLoggedIn is set, then check its status
    //var_dump($_SESSION['isLoggedIn']);
    return (array_key_exists('isLoggedIn', $_SESSION) && ($_SESSION['isLoggedIn']));
}