<html lang="en">
<head>
  <title>Patients</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <div class="col-sm-offset-2 col-sm-10">
     
        <h1>Patients</h1>
        <?php
            include __DIR__ . '/models/model_patients.php';
            include __DIR__ . '/functions.php';

            $patients = getPatients ();
        ?>
        <a href="addPatient.php?action=add">Add Patient</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th></th>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Birthdate</th>
                    <th>Age</th>
                    <th>Married</th>
                    <th></th>
                    
                </tr>
            </thead>

            <tbody>
            <?php foreach ($patients as $row): ?>
                <tr>

                    <td>

                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['patientFirstName']; ?></td>
                        <td><?php echo $row['patientLastName']; ?></td>
                        <td><?php echo $row['patientBirthDate']; ?></td>  
                        <td><?php echo age($row['patientBirthDate']); ?></td>  
                        <td><?php
                            if($row['patientMarried'] == "0"){
                                echo "NO";
                            } elseif($row['patientMarried'] == "1"){
                                echo "YES";
                            }
                            else{
                                echo "N/A";
                            }
                            //echo $row['patientMarried']; 
                        ?></td>
                        <td><a href="addPatient.php?action=update&patientId=<?php echo $row['id'];?>">Edit</a></td>
                    </td>
                    
                    
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>