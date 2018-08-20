<?php
    class Login{

        //Creating variable Names
        public $Name;
        public $Passwd;

        //Constructor to set up data
        public function __construct($Name,$Passwd)
        {
            $this->Name = $Name;
            $this->Passwd = $Passwd; 
        }

        // Assigns data to the session
        public function process(){
            session_start();
            $_SESSION['name'] = $this->Name;
            $_SESSION['passwd'] = $this->Passwd;
            if($_SESSION['name']=='Admin'){
                header('Location: AdminPage.php');
            }
            else{
                 header('Location: DataPage.php');
            }
        }

    }
?>