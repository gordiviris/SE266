<?php
	// This is the base class for checking and savings accounts
	// It is declared **abstract** so that it can not be instantiated
	// Child classes must be derived that 
	// implement the withdrawal and getAccountDetails methods
	
	/* Note:
		You should implement all other methods in the class
	*/
    abstract class Account 
    {
        protected $accountId;
        protected $balance;
        protected $startDate;
        
        public function __construct ($id, $bal, $startDt) 
        {
           // write code here
           $this->accountId = $id;
           $this->balance = $bal;
           $this->startDate = $startDt;
        } // end constructor
        
        public function deposit ($amount) 
        {
            // write code here
            $this->balance += $amount;
        } // end deposit

        abstract public function withdrawal($amount);
        // This is an abstract method. 
        // This method must be defined in all classes
        // that inherit from this class
        
        public function getStartDate() 
        {
            // write code here
            return $this->startDate;
        } // end getStartDate

        public function getBalance() 
        {
            // write code here
            return $this->balance;
        } // end getBalance

        public function getAccountId() 
        {
            // write code here
            return $this->accountId;
        } // end getAccountId

        // Display AccountID, Balance and StartDate in a nice format
        protected function getAccountDetails()
        {
            // write code here
            $details = "<ul><li><b>Account ID:</b> " . $this->accountId . "</li>";
            $details .= "<li><b>Balance:</b> " . $this->balance . "</li>";
            $details .= "<li><b>StartDate:</b> " . $this->startDate . "</li></ul>";
            return $details;
        } // end getAccountDetails
        
    } // end account

?>
