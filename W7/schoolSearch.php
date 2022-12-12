<?php
    include_once __DIR__ . "/models/schools.php";
    include_once __DIR__ . "/controllers/functions.php";
    include_once __DIR__ . "/controllers/header.php";
    if (!isUserLoggedIn())
    {
        header ('Location: login.php');
        //echo "not logged in";
    }
    
    $schoolName = "";
    $city = "";
    $state = "";
    if (isPostRequest()) {
    // your search logic goes here. Call getSchools with the appropriate arguments

    //*******************************************************************//
        //************     TODO     *****************************************//
        //
        // Create an object to represent the schools table in the database 
        //
        //  Add your search logic here. 
        // 
        // Call getSchools with the appropriate arguments
        //
        //*******************************************************************//
        $configFile = __DIR__ . '/models/dbconfig.ini';
        try 
        {
            $school = new Schools($configFile);
        } 
        catch ( Exception $error ) 
        {
            echo "<h2>" . $error->getMessage() . "</h2>";
        }

        $schoolListing = [];

        if (isset($_POST["search"])){
            $sName = filter_input(INPUT_POST, 'schoolName');
            $cName = filter_input(INPUT_POST, 'city');
            $stName = filter_input(INPUT_POST, 'state');

            $schoolListing = $school->getSelectedSchools($sName,$cName,$stName);
        }
    
      
    }
    
    ?>

            <h2>Search Schools</h2>
            <form method="post" action="schoolSearch.php">
                <div class="rowContainer">
                   <div class="col1">School Name:</div>
                   <div class="col2"><input type="text" name="schoolName" value="<?php echo $schoolName; ?>"></div> 
               </div>
               <div class="rowContainer">
                   <div class="col1">City:</div>
                   <div class="col2"><input type="text" name="city" value="<?php echo $city; ?>"></div> 
               </div>
               <div class="rowContainer">
                   <div class="col1">State:</div>
                   <div class="col2"><input type="text" name="state" value="<?php echo $state; ?>"></div> 
               </div>
                 <div class="rowContainer">
                   <div class="col1">&nbsp;</div>
                   <div class="col2"><input type="submit" name="search" value="Search" class="btn btn-warning"></div> 
               </div>
            </form>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th></th>
                        <th>School Name</th>
                        <th>City</th>
                        <th>State</th>
                    </tr>
                    
                </thead>
                <tbody>
                    
                    <?php 
                    //checking if search has been set
                    if(isset($_POST['search'])){
                        //if no results then display message
                        if(count($schoolListing)<= 0){
                            echo "No Results Found";
                        } else{
                            //for loop to display results
                        foreach ($schoolListing as $row): 
                        
                    ?>
                        <tr>
                            <td>
                                <td><?php echo $row['schoolName']; ?> </td>
                                <td> <?php echo $row['schoolCity']; ?> </td>
                                <td> <?php echo $row['schoolState']; ?></td>
                            </td>
                        </tr>
                    <?php endforeach; }} ?>
                </tbody>
            

            </table>
            <?php
            
                include_once __DIR__ . "/../footer.php";
            ?>
        



