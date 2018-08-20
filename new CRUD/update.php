<?php
    session_start();
    include "./connection.php";
    include "session.php";

    //Check if the Session is active , to provide more security
    if((empty($_SESSION['name']) && empty($_SESSION['passwd'])) || $_SESSION['name']=="Admin")
    {
        header("Location: index.php");
    }

    $name = $_SESSION['name'];
    $passwd = $_SESSION['passwd'];
    $sql = "select * from student where Name = '$name' and Passwd = '$passwd' ";
    $result = mysqli_query($conn, $sql);
    $rows = mysqli_fetch_assoc($result); 
    $sirname = $rows['Sirname'];
    $class = $rows['class'];
    $roll = $rows['RollNo'];

    if(isset($_POST["submit"]))  
    {  
      if(empty($_POST["new_name"]))  
      {  
           $error = "<label class='text-danger'>Enter new Username</label>";  
      }  
     
      else if(empty($_POST["new_sname"]))  
      {  
        
           $error = "<label class='text-danger'>Enter new Sirname</label>";  
      }

      else if(empty($_POST["new_passwd"]))  
      {  
           $error = "<label class='text-danger'>Enter new Password</label>";  
      }

      else if(empty($_POST["new_class"]))  
      {  
           $error = "<label class='text-danger'>Enter new Class</label>";  
      }

      else if(empty($_POST["new_roll"]))  
      {  
           $error = "<label class='text-danger'>Enter new Roll No.</label>";  
      }
     
      else  
      {  
        $new_Name = $_POST['new_name'];
        $new_Passwd = $_POST['new_passwd'];
        $new_sname = $_POST['new_sname'];
        $new_class = $_POST['new_class'];
        $new_roll = $_POST['new_roll'];
        
        $query = "UPDATE student SET Name = '$new_Name',Sirname = '$new_sname',Passwd = '$new_Passwd',class = '$new_class',RollNo = '$new_roll' WHERE RollNo = '$roll' ";
        $res = mysqli_query($conn, $query);
        if($res)
        {   
            $login = new Login($new_Name,$new_Passwd); 
            $login->process();  
     
        } 
        else{
            echo "Failure";
        }
      }  
 }  
?>


    <!DOCTYPE html>
    <html>
        <head>
        <meta charset='utf-8' />
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <title>Update</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
           <script>
                    function jump()
                    {
                        parent.location.href = "DataPage.php";
                    }
           </script>
    </head>
    <body style="background-image: url(sky.jpg)">
    <img src = "baseline_home_white_18dp.png" onclick="jump()" style="margin-top: 3px; margin-left: 8px">

    <div class="container" style="width:500px;background-color: white;border-radius: 20px;margin-top:8%">
        <form align=""  method='POST'>
            <h3>Update Data</h3>
                <?php   
                     if(isset($error))  
                     {  
                          echo $error;  
                     }  
                ?>  

                Name:<input type='text' class="form-control" name = 'new_name' value=<?php echo $name?>><br>
                Sirname:<input type='text' class="form-control" name ='new_sname' value=<?php echo $sirname?>><br>
                Password:<input type='text' class="form-control" name ='new_passwd' value=<?php echo $passwd?>><br>
                Class:<input type='text'  class="form-control"name  = 'new_class' value=<?php echo $class?>><br>
                Roll No:<input type='text' class="form-control" name ='new_roll' value=<?php echo $roll?>><br>
                <input type='submit' name='submit' value='submit' class="btn btn-info">
                <?php
                     if(isset($message))  
                     {  
                          echo $message;  
                     }  
                ?>
                <br /> 
        </form>
        </div>
    </body>
</html>
