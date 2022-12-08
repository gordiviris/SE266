<?php
  
    // This code runs everything the page loads
    include __DIR__ . '/models/model_patients.php';
    include __DIR__ . '/functions.php';

    //if else statement to determine if we are updating or adding patient
    if(isset($_GET['action'])){
        $action = filter_input(INPUT_GET, 'action');
        $id = filter_input(INPUT_GET, 'patientId');
        if($action == "update"){ //if action is update we fill in the boxes with information from db
            $row = getPatient($id);
            $id = $row['id'];
            $fName = $row['patientFirstName'];
            $lName = $row['patientLastName'];
            $married = $row['patientMarried'];
            $dob = $row['patientBirthDate'];
            $deleteBtn = "submit";

            
        } else{ //if action is not update then we leave boxes blank
            $fName = "";
            $lName = "";
            $married = "";
            $dob = "";
            $deleteBtn = "hidden";
        }
    } elseif(isset($_POST['action'])){
        $action = filter_input(INPUT_POST, 'action');
        $id = filter_input(INPUT_POST, 'patientId');
        $fName = filter_input(INPUT_POST, 'fName');
        $lName = filter_input(INPUT_POST, 'lName');
        $married = filter_input(INPUT_POST, 'married');
        $dob = filter_input(INPUT_POST, 'dob');


    }

    if(isPostRequest() && $action == "add"){
        $result = addPatient($fName, $lName, $married, $dob);
        
        header('Location: index.php');
    }elseif (isPostRequest() && $action == "update"){
        $result = updatePatient($id, $fName, $lName, $married, $dob);
        
        header('Location: index.php');
    }

    // if (isPostRequest()) {
    //     $fName = filter_input(INPUT_POST, 'fName');
    //     $lName = filter_input(INPUT_POST, 'lName');
    //     $married = filter_input(INPUT_POST, 'married', FILTER_VALIDATE_INT);
    //     $dob = filter_input(INPUT_POST, 'dob');
    //     $result = addPatient ($fName, $lName, $married, $dob);    
    // }
?>
    

<html lang="en">
<head>
  <title>Patient Form</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>

<body>
<?php require ('../header.php'); ?>
<div class="container">


  <h1>Add Patient</h1>

  <div class="col-sm-offset-1 col-sm-10"><p><a href="./index.php">View Patients</a></p></div>
  <form class="form-horizontal" action="addPatient.php" method="post">

    <!-- filling in fields with information we have gotten from above-->
    <input type="hidden" name="action" value="<?php echo $action; ?>">
    <input type="hidden" name="patientId" value="<?php echo $id; ?>">

    <div class="form-group">
      <label class="control-label col-sm-2" for="fName">First Name:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="fName" placeholder="First Name" name="fName" value="<?php echo $fName; ?>">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="lName">Last Name:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="lName" placeholder="Last Name" name="lName" value="<?php echo $lName; ?>">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="married">Marital Status:</label>
      <div class="col-sm-10"> 
        <input type="radio" id="married" value="0" name="married" <?php echo ($married=="0") ? "checked" : "";?>> Single |        
        <input type="radio" id="married" value="1" name="married" <?php echo ($married=="1") ? "checked" : "";?>> Married
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="dob">Birthdate:</label>
      <div class="col-sm-10"> 
        <input type="date" class="form-control" id="dob" name="dob" value="<?php echo $dob?>">  
      </div>
    </div>
    
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default"><?php echo $action; ?> Patient</button>

            <input type="hidden" name="patientId" value="<?php echo $id; ?>" />
            <button type="submit" name="btnDelete" <?php echo ($deleteBtn=="hidden") ? "hidden" : "";?>>Delete Patient</button>
            <?php
            if(isset($_POST['btnDelete'])){
                $id = filter_input(INPUT_POST, 'patientId');
                deletePatient($id);
            }
            ?>
      </div>
    </div>
  </form>
  <?php
        require ('../footer.php');
    ?>
</div>


</body>
</html>