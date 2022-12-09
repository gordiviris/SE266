<?php 
    include_once __DIR__ . '/functions.php'; 
    if (!isUserLoggedIn())
    {
        header ('Location: login.php');
        //echo "not logged in";
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
    // If POST, delete the requested team before listing all teams
    $patientListing = [];

    // If POST & SEARCH, only fetch the specified teams       
    if (isset($_POST["search"]))
    {
        $fName="";
        $lName="";
        if ($_POST["fieldName"] == "fName")
        {
            $fName = $_POST['fieldValue'];

        }
        elseif ($_POST["fieldName"] == "lName")
        {
            $lName = $_POST['fieldValue'];

        }

        $patientListing = $patientDatabase->searchPatients($fName, $lName);
        
    }
    // If POST & DELETE, delete the requested team before fetching all teams       
    elseif (isset($_POST["deletePatient"]))
    {
        $id = filter_input(INPUT_POST, 'patientId');
        //$patientDatabase->deleteTeam($id);
        $patientListing = $patientDatabase->getPatient();
    }

    // Else just fetch all teams
    else
    {
        $patientListing = $patientDatabase->getPatients();
    }


    // This is a quick sorting hack that does not use
    // either the page form or a database query.
    // It sorts based on the associative array keys.
    //$fName  = array_column($patientListing, 'patientFirstName');
    //$lName = array_column($patientListing, 'patientLastName');
    //var_dump($patientListing);
    
    //array_multisort($fName,$lName);