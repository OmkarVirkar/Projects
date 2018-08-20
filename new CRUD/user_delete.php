<?php
    session_start();
    include "connection.php";
    include "session.php";
    if(isset($_POST['submit']))
    {
        if(empty($_POST['roll']))
        {
            $error = "<label class='text-danger'>Please fill the roll number</label>";
        }
        else{
        $roll = $_POST['roll'];
        $query = "delete from student where RollNo = '$roll' ";
        $res = mysqli_query($conn, $query);
        if($res)
        {
         header("Location: AdminPage.php");
        }
        else{
            echo "Failed!!!!";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body  style="background-image: url(sky.jpg)">
    <form method="POST">
    <div class="container" style="width:500px;background-color: white;border-radius: 24px;margin-top: 13%;margin-top: 8%;heigth:150px">
    <?php   
                     if(isset($error))  
                     {  
                          echo $error;  
                     }  
                     ?>  
                    <br />
    <label style="margin-top:4px">Enter Roll No. of the user to be deleted!!</label>
    <input type='text'  name = 'roll' class="form-control"  name = 'new_class' placeholder="Enter Roll NUmber Here!!" ><br>
    <input type="submit" name = 'submit'  class="btn btn-warning"><br><br>
    </div>
    </form>
</body>
</html>

