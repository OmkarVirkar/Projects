<?php
    session_start();
     unset($_SESSION['name']);
     unset($_SESSION['passwd']);
     session_destroy();
     header('Location: ./Login_page.php');
?>