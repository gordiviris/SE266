<?php
    include (__DIR__ . '/db.php');

    function getPatients (){
        global $db;

        $results = [];
        //sql command
        $stmt = $db->prepare("SELECT id, patientFirstName, patientLastName, patientMarried, patientBirthDate FROM patients ORDER BY patientLastName");

        //fetching all records
        if($stmt->execute() && $stmt->rowcount() > 0){
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        return($results);
    }

    function addPatient ($fName, $lName, $married, $dob){
        global $db;
        //sql command
        $stmt = $db->prepare("INSERT INTO patients SET patientFirstName = :fName, patientLastName = :lName, patientMarried = :married, patientBirthDate = :dob");
        //binding variables to appropiate columns
        $binds = array(
            ":fName"=>$fName,
            ":lName"=>$lName,
            ":married"=>$married,
            ":dob"=>$dob
        );

        if($stmt->execute($binds) && $stmt->rowCount() > 0){
            $results = 'Patient Added';
        }
        return $results;
    }

    function updatePatient($id, $fName, $lName, $married, $dob){
        global $db;

        $results = "";
        //sql command
        $stmt = $db->prepare("UPDATE patients SET patientFirstName = :fName, patientLastName = :lName, patientMarried = :married, patientBirthDate = :dob WHERE id = :id");
        //binding variables to appropiate columns
        $stmt->bindValue(':id', $id);
        $stmt->bindValue(':fName', $fName);
        $stmt->bindValue(':lName', $lName);
        $stmt->bindValue(':married', $married);
        $stmt->bindValue(':dob', $dob);

        if($stmt->execute() && $stmt->rowCount() > 0){
            $results = 'Patient Updated';
        }

        return ($results);
    }

    //$results = updatePatient(1,'Kelvin', 'Alvarez', 1, '1999-06-07');

    function deletePatient ($id) {
        global $db;

        $results = "Patient Was Not Deleted";
        //sql command
        $stmt = $db->prepare("DELETE FROM patients WHERE id = :id");
        //binding variables to appropiate columns
        $stmt->bindValue(':id', $id);

        if($stmt->execute() && $stmt->rowCount() > 0) {
            $results = "Patient Deleted";
        }

        return ($results);
    }

    // $results = deletePatient(1);
    // echo $results;


    function getPatient($id) {
        global $db;

        $results = [];
        //sql command
        $stmt = $db->prepare("SELECT id, patientFirstName, patientLastName, patientMarried, patientBirthDate FROM patients WHERE id= :id");
        //binding variables to appropiate columns
        $stmt->bindValue(':id', $id);

        //fetching single record in db
        if($stmt->execute() && $stmt->rowCount() > 0) {
            $results = $stmt->fetch(PDO::FETCH_ASSOC);
        }

        return ($results);
    }

    //calculate age
    function age ($bdate) {
        $date = new DateTime($bdate);
        $now = new DateTime();
        $interval = $now->diff($date);
        return $interval->y;
     }
    // $patient = getPatient(2);
    // var_dump($patient);