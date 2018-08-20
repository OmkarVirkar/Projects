<?php
    class Login{
        public $Name;
        public $Passwd;

        public function __construct($Name,$Passwd)
        {
            $this->Name = $Name;
            $this->Passwd = $Passwd; 
        }

        public function process(){
            session_start();
            $_SESSION['name'] = $this->Name;
            $_SESSION['passwd'] = $this->Passwd;
            if($this->Name == "Admin" && $this->Passwd == "Admin")
            {
                header("Location: ./AdminPage.php");
            }
            else{
                header('Location: ./DataPage.php');
            }
        }

    }
?>