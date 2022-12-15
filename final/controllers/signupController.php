<?php
include_once __DIR__ . '/header.php';
include_once __DIR__ . '/functions.php';
include_once __DIR__ . '/../models/model_users.php';

$configFile = __DIR__ . '/../models/dbconfig.ini';
try 
{
    $userDatabase = new UserDB($configFile);
} 
catch ( Exception $error ) 
{
    echo "<h2>" . $error->getMessage() . "</h2>";
}  

$message = "";
$error="";
    if (isPostRequest()) 
    {
        // get _POST form fields
        $fName = filter_input(INPUT_POST, 'fName');
        $lName = filter_input(INPUT_POST, 'lName');
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $phone = filter_input(INPUT_POST, 'phone', FILTER_VALIDATE_INT);
        $dob = filter_input(INPUT_POST, 'dob');
        $username = filter_input(INPUT_POST, 'userName');
        $password = filter_input(INPUT_POST, 'password');

        var_dump( $fName, $lName, $email, $phone, $dob, $username, $password);

        
        if(isBlank($fName)){
            $error .= '<p class="error">*First Name must be filled in</p>';
        }else{

        }

        if(isBlank($lName)){
            $error .= '<p class="error">*Last Name must be filled in</p>';
        }else{

        }

        if(isBlank($email)){
            $error .= '<p class="error">*Invalid Email</p>';
        }else{
            
        }

        if(isBlank($phone)){
            $error .= '<p class="error">*Phone Number must be filled in</p>';
        }else{
            if(!isValidPhone($phone)){
                $error .= '<p class="error">*Invalid Phone Number</p>';
            }else{

            }

        }

        if(isBlank($dob)){
            $error .= '<p class="error">*Birthday must be filled in</p>';
        }else{
            if(!ageVerification($dob)){
                $error .= '<p class="error">*You must be 18 Years or older to sign up!</p>';
            }
        }

        if(isBlank($username)){
            $error .= '<p class="error">*UserName must be filled in</p>';
        }else{
            if($userDatabase->checkDuplicates($username)){
                $error .= '<p class="error">*UserName is already taken!</p>';
            }else{

            }
        }

        if(isBlank($password)){
            $error .= '<p class="error">*Password must be filled in</p>';
        }else{

        }

        if($error == ""){
            $result = $userDatabase->addUser($username, $password, $fName, $lName, $dob, $email, $phone);
            
        }
    }
    