<?php 
    include_once __DIR__ . '/functions.php';

    include_once __DIR__ . '/../models/model_users.php';

    include_once __DIR__ . "/header.php";

    $_SESSION['isLoggedIn'] = false;

    $message = "";
    if (isPostRequest()) 
    {

        // get _POST form fields
        $username = filter_input(INPUT_POST, 'userName');
        $password = filter_input(INPUT_POST, 'password');

        // Set up configuration file and create database
        $configFile = __DIR__ . '/../models/dbconfig.ini';
        try 
        {
            $userDatabase = new UserDB($configFile);
        } 
        catch ( Exception $error ) 
        {
            echo "<h2>" . $error->getMessage() . "</h2>";
        }   
    
        // Now we can check to see if use credentials are valid.
        if ($userDatabase->validateCredentials($username, $password)) 
        {
            // If so, set logged in to TRUE
            $_SESSION['isLoggedIn'] = true;
            // Redirect to team listing page
            header ('Location: listPatients.php');
        } 
        else 
        {
           // Whoops! Incorrect login. Tell user and stay on this page.
           $message = "You did not enter correct login credentials. 🤨";
        }
    }