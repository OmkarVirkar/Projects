<?php
    $Name = $_POST['Name'];
    $Colour = $_POST['Colour'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname="basket";

    $conn =  mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    else{
        $sql = "INSERT INTO basket ( Name,Colour)VALUES ($Name,$Colour)";
        $result = mysqli_query($conn, $sql);
    }

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <link
</head>
<body>
    <form method="POST">
        <div>
            Name of Fruit: <input type="text" name="Name" placeholder="Enter the Name Here!!"><br>
            Colour of Fruit: <input type="text" name="Colour" placeholder="Enter the Colour Here!!"><br>
            <input type="Submit" value="Submit">
            <input type="Button" value="View List">
        </div>
    </form>
</body>
</html>

