<?php 
    include_once __DIR__ . '/model_patients.php'; 

class PatientDBSearcher extends PatientDB
{

    // Allows user to search for either team, division or both
    // INPUT: team and/or division to search for
    function searchPatients ($fName, $lName) 
    {
        // We set up all the necessary variables here 
        // to ensure they are scoped for the entire function
        $results = array();             // tables of query results
        $binds = array();               // bind array for query parameters
        $patientTable = $this->getDatabaseRef();   // Alias for database PDO

        // Create base SQL statement that we can append
        // specific restrictions to
        $sqlQuery =  "SELECT * FROM patients ";
        $isFirstClause = true;
        
        if ($fName != "") {
            if ($isFirstClause)
            {
                $sqlQuery .=  " WHERE ";
                $isFirstClause = false;
            }
            else
            {
                $sqlQuery .= " AND ";
            }
            $sqlQuery .= "  patientFirstName LIKE :fName";
            $binds['fName'] = '%'.$fName.'%';
        }
    
        // If division is set, append team query and bind parameter
        if ($lName != "") {
            if ($isFirstClause)
            {
                $sqlQuery .=  " WHERE ";
                $isFirstClause = false;
            }
            else
            {
                $sqlQuery .= " AND ";
            }
            $sqlQuery .= " patientLastName LIKE :lName";
            $binds['lName'] = '%'.$lName.'%';
        }
    
       
        // Create query object
        $stmt = $patientTable->prepare($sqlQuery);

        // Perform query
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) 
        {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        
        // Return query rows (if any)
        //var_dump($binds);
        //echo $binds['fName'];
        return $results;
    } // end search teams
}