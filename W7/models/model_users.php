<?php
    class UserDB
    {
        // This data field represents the database
        private $userData;
    
        // Used to salt user password
        const PASSWORD_SALT = "school-salt";
    
        //*****************************************************
        // Users class constructor:
        // Instantiates a PDO object based on given URL and
        // uses that to initialize the data field $userData
        //
        // INPUT: URL of database configuration file
        // Throws exception if database access fails
        // ** This constructor is very generic and can be used to 
        // ** access your course database for any assignment
        // ** The methods need to be changed to hit the correct table(s)
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

    

        public function validateCredentials($userName, $password)
        {
            $isValidUser = false;
            $userTable = $this->userData;   // Alias for database PDO

            // Create query object with username and password
            // $stmt = $userTable->prepare("SELECT id FROM userDB WHERE userName =:userName AND userPassword = :password");
            $stmt = $userTable->prepare("SELECT userPassword FROM userDB WHERE userName =:userName");
    
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

    }