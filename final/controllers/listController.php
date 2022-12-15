<?php 
    include_once __DIR__ . '/functions.php'; 

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
    // If POST, delete the requested team before listing all teams
    $RListing = [];

    // If POST & SEARCH, only fetch the specified teams       
    // if (isset($_POST["search"]))
    // {
    //     $fName="";
    //     $lName="";
    //     if ($_POST["fieldName"] == "fName")
    //     {
    //         $fName = $_POST['fieldValue'];

    //     }
    //     elseif ($_POST["fieldName"] == "lName")
    //     {
    //         $lName = $_POST['fieldValue'];

    //     }

    //     $ReviewListing = $reviewDB->searchReview($fName, $lName);
        
    // }
    // If POST & DELETE, delete the requested team before fetching all teams       
    // elseif (isset($_POST["deletePatient"]))
    // {
    //     $id = filter_input(INPUT_POST, 'patientId');
    //     //$patientDatabase->deleteTeam($id);
    //     $patientListing = $patientDatabase->getPatient();
    // }

    // Else just fetch all teams
    // else
    // {
    //     $ReviewListing = $reviewDB->getReviews();
    // }

