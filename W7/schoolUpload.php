<?php
   include_once __DIR__ . "/models/schools.php";
   include_once __DIR__ . "/controllers/functions.php";
      
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
        $tmp_name= $_FILES['fileToUpload']['tmp_name'];
        $path = getcwd().DIRECTORY_SEPARATOR.'uploads';
        $new_name =  
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

    </form>    

<?php
    include_once __DIR__ . "/../footer.php";
?>