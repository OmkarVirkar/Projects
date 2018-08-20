<?php  
include "session.php";
include "connection.php";

 $message = '';  
 $error = '';  
 if(isset($_POST["submit"]))  
 {  
    //  Checks of Name is empty
      if(empty($_POST["Name"]))  
      {  
           $error = "<label class='text-danger'>Enter Username</label>";  
      }  
     
    //   Checks if Password is empty
      else if(empty($_POST["Password"]))  
      {  
           $error = "<label class='text-danger'>Enter Password</label>";  
      }
     

      else  
      {  
        $Name = $_POST['Name'];
        $Passwd = $_POST['Password'];

        // Passes query to retrieve the user data
            $sql = "select * from student where Name = '$Name' and Passwd = '$Passwd' ";
            $result = mysqli_query($conn, $sql);
            $rows = mysqli_fetch_assoc($result); 
            
            //Checks if the quer was a success

            //If successfull
            if($rows['Name']!=null)
            {
                    $login = new login($Name,$Passwd); 
                    $login->process();
                
            } 

            // If not successfull
            else{
                $error = "<label class='text-danger'>Enter Valid Credentials!!</label>";
            }   
            
      }  
 }  
?>




 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Login Page</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
           <script>
                  function jump(){
                        parent.location.href = "Register_page.php";
                  }
           </script>  
      </head> 
      

      <!-- Adds Background Image to the Page  -->
      <body style="background-image: url(sky.jpg)">  
           <br />  
           <div class="container" style="width:500px;background-color: white;border-radius: 24px;margin-top: 13%;
    margin-top: 8%">  
                <h3 align="">Login</h3><br />                 
                <form  method="post">  
                     <?php   
                     if(isset($error))  
                     {  
                          echo $error;  
                     }  
                     ?>  
                    <br />

                     <!-- Accepts Username -->
                     <label>Enter Username: </label>  
                     <input type="text" placeholder="Name" class="form-control" name="Name" /><br />  

                     <!-- Accept Password -->
                     <label>Password:</label>  
                     <input type="password" placeholder="Password" name="Password" class="form-control" /><br />
 
                     <!--Submit -->
                     <input type="submit" name="submit" placeholder="submit" class="btn btn-info" />

                     <!-- Takes you to the registration page to reguister a new User -->
                     <input type="button" value="Sign Up" name="Sign In" class="btn btn-warning" onclick="jump()"><br />                      
                     <?php
                     if(isset($message))  
                     {  
                          echo $message;  
                     }  
                     ?> 
                     <br /> 
                </form>  
           </div>  
           <br />  
      </body>  
 </html>  