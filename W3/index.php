
<?php
        
        include_once ("checking.php");
        include_once ("savings.php");
        $cError = "";
        $sError = "";
        if (isset ($_POST['withdrawChecking'])) 
        {
            //echo "I pressed the checking withdrawal button";
            $cError = "";
            $sError = "";
            $checking = new CheckingAccount($_POST['checkingAccountId'], $_POST['checkingBalance'], $_POST['checkingDate']);
            $savings = new SavingsAccount($_POST['savingsAccountId'], $_POST['savingsBalance'], $_POST['savingsDate']);
            $test = filter_input(INPUT_POST, 'checkingWithdrawAmount', FILTER_VALIDATE_FLOAT);
            if($test == false){
                $cError = "Please enter valid number!";
            }else{
                
                $amount = $_POST['checkingWithdrawAmount'];
                if($checking->withdrawal($amount)){

                }else{
                    $cError = "Insufficient funds!";
                }
            }
            
            
            
            
        } 
        else if (isset ($_POST['depositChecking'])) 
        {
            //echo "I pressed the checking deposit button";
            $cError = "";
            $sError = "";
            $checking = new CheckingAccount($_POST['checkingAccountId'], $_POST['checkingBalance'], $_POST['checkingDate']);
            $savings = new SavingsAccount($_POST['savingsAccountId'], $_POST['savingsBalance'], $_POST['savingsDate']);
            $test = filter_input(INPUT_POST, 'checkingDepositAmount', FILTER_VALIDATE_FLOAT);
            if($test == false){
                $cError = "Please enter valid number!";
            }else{
                $amount = $_POST['checkingDepositAmount'];
                $checking->deposit($amount);
            }

        } 
        else if (isset ($_POST['withdrawSavings'])) 
        {
            //echo "I pressed the savings withdrawal button";
            $cError = "";
            $sError = "";
            $checking = new CheckingAccount($_POST['checkingAccountId'], $_POST['checkingBalance'], $_POST['checkingDate']);
            $savings = new SavingsAccount($_POST['savingsAccountId'], $_POST['savingsBalance'], $_POST['savingsDate']);
            $test = filter_input(INPUT_POST, 'savingsWithdrawAmount', FILTER_VALIDATE_FLOAT);
            if($test == false){
                $sError = "Please enter valid number!";
            }else{
                
                $amount = $_POST['savingsWithdrawAmount'];
                if($savings->withdrawal($amount)){

                }else{
                    $sError = "Insufficient funds!";
                }
            }
        } 
        else if (isset ($_POST['depositSavings'])) 
        {
            //echo "I pressed the savings deposit button";
            $cError = "";
            $sError = "";
            $checking = new CheckingAccount($_POST['checkingAccountId'], $_POST['checkingBalance'], $_POST['checkingDate']);
            $savings = new SavingsAccount($_POST['savingsAccountId'], $_POST['savingsBalance'], $_POST['savingsDate']);
            $test = filter_input(INPUT_POST, 'savingsDepositAmount', FILTER_VALIDATE_FLOAT);
            if($test == false){
                $sError = "Please enter valid number!";
            }else{
                $amount = $_POST['savingsDepositAmount'];
                $savings->deposit($amount);
            }
            

        } 
        else
        {
            $checking = new CheckingAccount ('C123', 1000, '12-20-2019');
            $savings = new SavingsAccount('S123', 5000, '03-20-2020');
        }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ATM</title>
    <style type="text/css">
        body {
            margin-left: 120px;
            margin-top: 50px;
        }
       .wrapper {
            display: grid;
            grid-template-columns: 300px 300px;
        }
        .account {
            border: 1px solid black;
            padding: 10px;
        }
        .label {
            text-align: right;
            padding-right: 10px;
            margin-bottom: 5px;
        }
        label {
           font-weight: bold;
        }
        input[type=text] {width: 80px;}
        .error {color: red;}
        .accountInner {
            margin-left:10px;margin-top:10px;
        }
    </style>
</head>
<body>
    <?php require ('../header.php'); ?>
    <form method="post">
       
        <input type="hidden" name="checkingAccountId" value="<?= $checking->getAccountId()?>" />
        <input type="hidden" name="checkingDate" value="<?= $checking->getStartDate()?>" />
        <input type="hidden" name="checkingBalance" value="<?= $checking->getBalance()?>" />
        <input type="hidden" name="savingsAccountId" value="<?= $savings->getAccountId()?>" />
        <input type="hidden" name="savingsDate" value="<?= $savings->getStartDate()?>" />
        <input type="hidden" name="savingsBalance" value="<?= $savings->getBalance()?>" />
        
        <h1>ATM</h1>
        <div class="wrapper">
            
            <div class="account"> 
                <?php
                    echo $checking->getAccountDetails();
                    echo $cError;

                ?>
                    <div class="accountInner">
                        <input type="text" name="checkingWithdrawAmount" value="" />
                        <input type="submit" name="withdrawChecking" value="Withdraw" />
                    </div>
                    <div class="accountInner">
                        <input type="text" name="checkingDepositAmount" value="" />
                        <input type="submit" name="depositChecking" value="Deposit" /><br />
                    </div>
            </div>

            <div class="account">
                <?php
                    echo $savings->getAccountDetails();
                    echo $sError;

                ?>    
                    <div class="accountInner">
                        <input type="text" name="savingsWithdrawAmount" value="" />
                        <input type="submit" name="withdrawSavings" value="Withdraw" />
                    </div>
                    <div class="accountInner">
                        <input type="text" name="savingsDepositAmount" value="" />
                        <input type="submit" name="depositSavings" value="Deposit" /><br />
                    </div>
            </div>
            
        </div>
    </form>
</body>
<?php
        require ('../footer.php');
    ?>
</html>
