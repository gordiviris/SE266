<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- making unordered list-->
    <h1>Tasks For The Day</h1>
    <ul>
        <!--displaying each item in as a list item, calling to array for value-->
        <li>
            <strong>Name: </strong> <?= $todo['title']; ?>
        </li>

        <li>
            <strong>Due Date: </strong> <?= $todo['due']; ?>
        </li>

        <li>
            <strong>Assigned To: </strong> <?= $todo['assigned_to']; ?>
        </li>

        <li>
            <!-- Heading -->
            <strong>Started: </strong> 

            <!--if task is started display check mark, if not then display an X-->
            <?php if ($todo['started']) : ?>
                <span class="icon">&#9989;</span>
            <?php else : ?>
                <span class="icon">&#10060;</span>
            <?php endif; ?>
                
        </li>

        <li>
            <!--Heading-->
            <strong>Status: </strong> 

            <!--if task is completed display check mark, if not then display an X-->
            <?php if ($todo['completed']) : ?>
                <span class="icon">&#9989;</span>
            <?php else : ?>
                <span class="icon">&#10060;</span>
            <?php endif; ?>
                
        </li>
            
    </ul>
</body>
</html>