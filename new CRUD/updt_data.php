<?php
    include "./session.php";
  
    session_start();
    include "./connection.php";
    $name = $_SESSION['name'];
    $passwd = $_SESSION['passwd'];
    $sql = "select * from student where Name = '$name' and Passwd = '$passwd' ";
    $result = mysqli_query($conn, $sql);
    $rows = mysqli_fetch_assoc($result); 
    $sirname = $rows['Sirname'];
    $class = $rows['class'];
    $roll = $rows['RollNo'];
    $new_name = $_POST['new_name'];
    $new_sname = $_POST['new_sname'];
    $new_passwd = $_POST['new_passwd'];
    $new_class = $_POST['new_class'];
    $new_roll = $_POST['new_roll'];

    $query = "UPDATE student SET Name = '$new_name',Sirname = '$new_sname',Passwd = '$new_passwd',class = '$new_class',RollNo = '$new_roll' WHERE RollNo = '$roll'";
    $res=mysqli_query($conn, $query);
    if($res)
    {
            
        $login = new login($new_name,$new_passwd); 
        $login->process();  
        header('Location: ./DataPage.php');
    }
    else{
        echo "Failed";
    }
?>