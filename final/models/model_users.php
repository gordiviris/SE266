<?php
    class UserDB
    {
        // This data field represents the database
        private $userData;
    
        // Used to salt user password
        const PASSWORD_SALT = "school-salt";
    
        public function __construct($configFile) 
        {
            // Parse config file, throw exception if it fails
            //echo ($configFile);
            if ($ini = parse_ini_file($configFile))
            {
                // Create PHP Database Object
                $userPDO = new PDO( "mysql:host=" . $ini['servername'] . 
                                    ";port=" . $ini['port'] . 
                                    ";dbname=" . $ini['dbname'], 
                                    $ini['username'], 
                                    $ini['password']);
    
                // Don't emulate (pre-compile) prepare statements
                $userPDO->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    
                // Throw exceptions if there is a database error
                $userPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
                //Set our database to be the newly created PDO
                $this->userData = $userPDO;
            }
            else
            {
                // Things didn't go well, throw exception!
                throw new Exception( "<h2>Creation of database object failed!</h2>", 0, null );
            }
    
        }

        public function getUser($id) 
        {
            $results = [];                  // Array to hold results
            $userTable = $this->userData;   // Alias for database PDO
    
            // Return results to client
            return $results;
        }

        public function checkDuplicates($username){
            $userTable = $this->userData;
            $stmt = $userTable->prepare("SELECT userName FROM userReviews WHERE userName =:userName");

            $stmt->bindValue(':userName', $username);

            $founduser=($stmt->execute() && $stmt->rowCount() > 0);
            if($founduser){
                return true;
            }
            else{
                return false;
            }
        }

    

        public function validateCredentials($userName, $password)
        {
            $isValidUser = false;
            $userTable = $this->userData;   // Alias for database PDO

            // Create query object with username and password
            // $stmt = $userTable->prepare("SELECT id FROM userDB WHERE userName =:userName AND userPassword = :password");
            $stmt = $userTable->prepare("SELECT userPassword FROM userReviews WHERE userName =:userName");
    
            // Bind query parameter values
            $stmt->bindValue(':userName', $userName);
            //$stmt->bindValue(':password', sha1( self::PASSWORD_SALT . $password));

            $foundUser = ($stmt->execute() && $stmt->rowCount() > 0);

            if ($foundUser)
            {
                $results = $stmt->fetch(PDO::FETCH_ASSOC); 
                //var_dump($results);
                $hashedPassword = sha1( self::PASSWORD_SALT . $password);
                $isValidUser = ($hashedPassword == $results['userPassword']);
            }
            // Note that we prepend salt.
            // You can post-pend it also, but be consistent with how the password is stored.
        // $stmt->bindValue(':password', sha1( self::PASSWORD_SALT . $password));
                
            // If we successfully execute and return a row, the crednetials are valid
            return $isValidUser;
        }

        public function addUser ($userName, $password, $fName, $lName, $dob, $email, $phone){
        
            $userTable = $this->userData;
            //sql command
            $stmt = $userTable->prepare("INSERT INTO userReviews SET userName = :userName, userPassword = :password, userFirstName = :fName, userLastName = :lName, 
                                userBirthDate = :dob, userEmail = :email, userPhone = :phone");
            //binding variables to appropiate columns
            $binds = array(
                ":userName"=>$userName,
                ":password"=>sha1( self::PASSWORD_SALT . $password),
                ":fName"=>$fName,
                ":lName"=>$lName,
                ":dob"=>$dob,
                ":email"=>$email,
                ":phone"=>$phone
            );
    
            if($stmt->execute($binds) && $stmt->rowCount() > 0){
                $results = 'Sign Up Successful';
            }
            return $results;
        }

    }