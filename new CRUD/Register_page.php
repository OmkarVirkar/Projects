<?php
include "connection.php";
include "session.php";
session_start();
$message = '';  
 $error = '';  
 if(isset($_POST["submit"]))  
 {  
      if(empty($_POST["Name"]))  
      {  
           $error = "<label class='text-danger'>Enter Username</label>";  
      }  
     
      else if(empty($_POST["Sirname"]))  
      {  
           $error = "<label class='text-danger'>Enter Sirname</label>";  
      }

      else if(empty($_POST["Password"]))  
      {  
           $error = "<label class='text-danger'>Enter Password</label>";  
      }

      else if(empty($_POST["class"]))  
      {  
           $error = "<label class='text-danger'>Enter Class</label>";  
      }

      else if(empty($_POST["roll"]))  
      {  
           $error = "<label class='text-danger'>Enter Division</label>";  
      }
     
      else  
      {  
        $Name = $_POST['Name'];
        $Passwd = $_POST['Password'];
        $sname = $_POST['Sirname'];
        $class = $_POST['class'];
        $roll = $_POST['roll'];

        $sql = "INSERT INTO student (Name, Sirname, Passwd, class, RollNo) VALUES ('$Name', '$sname', '$Passwd', '$class', '$roll')";
        $result = mysqli_query($conn, $sql);
        
        if($result)
        {
            $login = new login($Name,$Passwd); 
            $login->process();
        }
    
        else{
                $error = "<label class='text-danger'>Enter Valid Credentials!!</label>";
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</head>
<body style="background-image: url('sky.jpg')">
    <form method="POST">
    <div class="container" style="width:500px;background-color: white;margin-top:8%;border-radius:24px">  
            <h3 align="">Register page</h3><br />
            <?php   
                     if(isset($error))  
                     {  
                          echo $error;  
                     }  
            ?><br />  
           <label>Enter Username: </label>  
                     <input type="text" placeholder="Name" class="form-control" name="Name" /><br />  

                     <label>Sirname</label>  
                     <input type="text" placeholder="Sirname" name="Sirname" class="form-control" /><br />
                     <label>Password</label>
                     <input type="text" placeholder="Password" name="Password" class="form-control" /><br />
                     <label>Class</label>
                     <input type="text" placeholder="class" name="class" class="form-control" /><br />
                     <label>Roll NO:</label>
                     <input type="text" placeholder="roll" name="roll" class="form-control" /><br />                                        


                     <input type="submit" value="Sign In" name="submit" class="btn btn-info"><br />                      
                     <?php
                     if(isset($message))  
                     {  
                          echo $message;  
                     }  
                    ?> 
                    <br />
        </div>
    </form>
</body>
</html>