<?php
    session_start();
     unset($_SESSION['name']);
     unset($_SESSION['passwd']);
     session_destroy();
     header('Location: ./index.php');
?>