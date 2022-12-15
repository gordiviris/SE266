<?php

class Review
{
    // This data field represents the database
    private $ReviewData;
    public function __construct($configFile) 
    {
        // Parse config file, throw exception if it fails
        if ($ini = parse_ini_file($configFile))
        {
            // Create PHP Database Object
            $connectionString = "mysql:host=" . $ini['servername'] . 
            ";port=" . $ini['port'] . 
            ";dbname=" . $ini['dbname'];

            $reviewPDO = new PDO( $connectionString, 
                                $ini['username'], 
                                $ini['password']);

            // Don't emulate (pre-compile) prepare statements
            $reviewPDO->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

            // Throw exceptions if there is a database error
            $reviewPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            //Set our database to be the newly created PDO
            $this->ReviewData = $reviewPDO;
        }
        else
        {
            // Things didn't go well, throw exception!
            throw new Exception( "<h2>Creation of database object failed!</h2>", 0, null );
        }

    }

    public function getReviews (){
        

        $results = [];
        $db = $this->ReviewData;
        //sql command
        $stmt = $db->prepare("SELECT reviewID, title, reviewEvent, body, rating, datePosted FROM reviews ORDER BY datePosted");

        //fetching all records
        if($stmt->execute() && $stmt->rowcount() > 0){
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        return($results);
    }

    public function addReview ($title, $reviewEvent, $body, $rating, $datePosted){
        
        $db = $this->ReviewData;
        //sql command
        $stmt = $db->prepare("INSERT INTO reviews SET title = :title, reviewEvent = :reviewEvent, body = :body, rating = :rating, datePosted = :datePosted");
        //binding variables to appropiate columns
        $binds = array(
            ":title"=>$title,
            ":reviewEvent"=>$reviewEvent,
            ":body"=>$body,
            ":rating"=>$rating,
            ":datePosted"=>$datePosted
        );

        if($stmt->execute($binds) && $stmt->rowCount() > 0){
            $results = 'Review Added';
        }
        return $results;
    }

    public function updateReview($reviewID, $title, $reviewEvent, $body, $rating, $datePosted){
        

        $results = "";
        $db = $this->patientData;
        //sql command
        $stmt = $db->prepare("UPDATE reviews SET title = :title, reviewEvent = :reviewEvent, body = :body, rating = :rating, datePosted = :datePosted WHERE reviewID = :reviewID");
        //binding variables to appropiate columns
        $stmt->bindValue(':reviewID', $reviewID);
        $stmt->bindValue(':title', $title);
        $stmt->bindValue(':reviewEvent', $reviewEvent);
        $stmt->bindValue(':body', $body);
        $stmt->bindValue(':rating', $rating);
        $stmt->bindValue(':datePosted', $datePosted);

        if($stmt->execute() && $stmt->rowCount() > 0){
            $results = 'Review Updated';
        }

        return ($results);
    }

    //$results = updatePatient(1,'Kelvin', 'Alvarez', 1, '1999-06-07');

    public function deleteReview ($reviewID) {
        $db = $this->reviewData;

        $results = "Review Was Not Deleted";
        //sql command
        $stmt = $db->prepare("DELETE FROM reviews WHERE reviewID = :reviewID");
        //binding variables to appropiate columns
        $stmt->bindValue(':reviewID', $reviewID);

        if($stmt->execute() && $stmt->rowCount() > 0) {
            $results = "Review Deleted";
        }

        return ($results);
    }

    // $results = deletePatient(1);
    // echo $results;


    public function getReview($reviewID) {
        $db = $this->ReviewData;

        $results = [];
        //sql command
        $stmt = $db->prepare("SELECT reviewID, title, reviewEvent, body, rating, datePosted FROM reviews WHERE reviewID = :reviewID");
        //binding variables to appropiate columns
        $stmt->bindValue(':reviewID', $reviewID);

        //fetching single record in db
        if($stmt->execute() && $stmt->rowCount() > 0) {
            $results = $stmt->fetch(PDO::FETCH_ASSOC);
        }

        return ($results);
    }
}