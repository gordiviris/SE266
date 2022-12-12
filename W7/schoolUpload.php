<?php
   include_once __DIR__ . "/models/schools.php";
   include_once __DIR__ . "/controllers/functions.php";
   if (!isUserLoggedIn())
    {
        header ('Location: login.php');
        //echo "not logged in";
    }
      
    if (isset ($_FILES['fileToUpload'])) 
    {
        //*******************************************************************//
        //************     TODO     *****************************************//
        // 
        // upload the file to "upload" directory and then call insertSchoolsFromFile 
        //      *** Make sure that the upload directory is writeable!
        //
        // redirect to search.php
        //
        //*******************************************************************//
        //creating new object
        $configFile = __DIR__ . '/models/dbconfig.ini';
        try 
        {
            $school = new Schools($configFile);
        } 
        catch ( Exception $error ) 
        {
            echo "<h2>" . $error->getMessage() . "</h2>";
        }        
        
        //getting temp file location and setting up new location to be sent to
        $tmp_name= $_FILES['fileToUpload']['tmp_name'];
        $path = getcwd().DIRECTORY_SEPARATOR.'uploads';
        $new_name =  $path.DIRECTORY_SEPARATOR.$_FILES['fileToUpload']['name'];
        move_uploaded_file($tmp_name, $new_name);
        //calling function to upload csv to database
        $school->insertSchoolsFromFile($new_name);
            
    }

    include_once __DIR__ . "/controllers/header.php"; 

?>  
    <h2>Upload File</h2>
    <p>
        Please specify a file to upload and then be patient as the upload may take a while to process.
    </p>

    <form action="schoolUpload.php" method="post" enctype="multipart/form-data">

        <input type="file" name="fileToUpload">
        <input type="submit" value="Upload">
        <?php 
        //if fileupload set then we send user back to search
            if (isset ($_FILES['fileToUpload'])) {
                header('Location: schoolSearch.php');
                
            }   
        ?>

    </form>    

<?php
    
    include_once __DIR__ . "/../footer.php";
?>