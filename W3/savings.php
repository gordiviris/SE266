<?php

    include_once ("account.php");
 
    class SavingsAccount extends Account 
    {

        public function withdrawal($amount) 
        {
            // write code here. Return true if withdrawal goes through; false otherwise
            $new = $this->balance - $amount;
            if($new >= 0){
                $this->balance = $new;
                return true;
            }else{
                return false;
            }
        } //end withdrawal

        public function getAccountDetails() 
        {
           // look at how it's defined in other class. You should be able to figure this out ...
            $accountDetails = "<h2>Savings Account</h2>";
            $accountDetails .= parent::getAccountDetails();
            
            return $accountDetails;
        } //end getAccountDetails
        
    } // end Savings

// The code below runs everytime this class loads and 
// should be commented out after testing.

    
    //$savings->withdrawal(200);
    //$savings->deposit(500);
    
    //echo $savings->getAccountDetails();

?>
