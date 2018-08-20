<?php  
include "session.php";
 $message = '';  
 $error = '';  
 if(isset($_POST["submit"]))  
 {  
      if(empty($_POST["Name"]))  
      {  
           $error = "<label class='text-danger'>Enter Username</label>";  
      }  
     
      else if(empty($_POST["Password"]))  
      {  
           $error = "<label class='text-danger'>Enter Password</label>";  
      }
     
      else  
      {  
            
                  $data = file_get_contents("student.json");  
                          $data = json_decode($data, true);  
                          foreach($data as $row)  
                          {  

                               if($row["Name"] == $_POST['Name'] && $row["Password"] == $_POST['Password'])
                               {
                                    
                                    $login = new Login($_POST['Name'],$_POST['Password']);
                                     
                                    $login->process();
                               }
                               else{
                                    $error = "<label class='text-danger'>Enter valid Data</label>";
                               }  
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
      
       
      <body style="background-image: url(sky.jpg)">  
           <br />  
           <div class="container" style="width:500px;background-color: white;border-radius: 24px;margin-top: 13%">  
                <h3 align="">Login</h3><br />                 
                <form method="post">  
                     <?php   
                     if(isset($error))  
                     {  
                          echo $error;  
                     }  
                     ?>  
<br />



                       
                     
                     <label>Enter Username: </label>  
                     <input type="text" placeholder="Name" class="form-control" name="Name" /><br />  

                     <label>Password</label>  
                     <input type="text" placeholder="Password" name="Password" class="form-control" /><br />
 
                     <input type="submit" name="submit" placeholder="submit" class="btn btn-info" />

                     <input type="button" value="Sign In" name="Sign In" class="btn btn-warning" onclick="jump()"><br />                      
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