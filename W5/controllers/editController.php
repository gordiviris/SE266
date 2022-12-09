<?php
    include_once __DIR__ . '/functions.php';
    if (!isUserLoggedIn())
     {
         header ('Location: login.php');
     }

     include_once __DIR__ . '/../models/patientDBSearcher.php';

     $configFile = __DIR__ . '/../models/dbconfig.ini';

     try 
    {
        $patientDatabase = new PatientDBSearcher($configFile);
    } 
    catch ( Exception $error ) 
    {
        echo "<h2>" . $error->getMessage() . "</h2>";
    }   
    
    if(isset($_GET['action'])){
        $action = filter_input(INPUT_GET, 'action');
        $id = filter_input(INPUT_GET, 'patientId');
        if($action == "update"){ //if action is update we fill in the boxes with information from db
            $row = $patientDatabase->getPatient($id);
            $id = $row['id'];
            $fName = $row['patientFirstName'];
            $lName = $row['patientLastName'];
            $married = $row['patientMarried'];
            $dob = $row['patientBirthDate'];
            $deleteBtn = "submit";

            
        } else{ //if action is not update then we leave boxes blank
            $fName = "";
            $lName = "";
            $married = "";
            $dob = "";
            $deleteBtn = "hidden";
        }
    } elseif(isset($_POST['action'])){
        $action = filter_input(INPUT_POST, 'action');
        $id = filter_input(INPUT_POST, 'patientId');
        $fName = filter_input(INPUT_POST, 'fName');
        $lName = filter_input(INPUT_POST, 'lName');
        $married = filter_input(INPUT_POST, 'married');
        $dob = filter_input(INPUT_POST, 'dob');


    }

    if(isPostRequest() && $action == "add"){
        $result = $patientDatabase->addPatient($fName, $lName, $married, $dob);
        
        header('Location: listPatients.php');
    }elseif (isPostRequest() && $action == "update"){
        $result = $patientDatabase->updatePatient($id, $fName, $lName, $married, $dob);
        
        header('Location: listPatients.php');
    }
