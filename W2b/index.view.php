<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kevin Andrade | W2a</title>
    <style>
        .form{
            border: solid black 1px;
            width: 500px;
            padding-left: 20px;
            background-color: #DEDEDE;
            line-height: 2;
            
        }
    </style>
</head>
<body>
    <h1>Patient Intake</h1>
    <div class="form">
        <form action="index.php" method="post">
            <label>Name:</label>
            <input type="text" name="fname" placeholder="First"/>
            <input type="text" name="lname" placeholder="Last"/>

            <br>

            <label>Marital Status:</label>
            <input type="radio" value="Single" name="status"/>Single
            <input type="radio" value="Married" name="status"/>Married
            <br>

            <label>D.O.B:</label>
            <input type="date" name="dob" />
            <br>
            <label>Height:</label>
            <input type="text" name="height" placeholder="inches"/>
            <br>
            <label>Weight:</label>
            <input type="text" name="weight" placeholder="lbs"/>
            <br>
            <input type="submit" name="submitbtn" />
    </form>

    </div>
</body>
</html>