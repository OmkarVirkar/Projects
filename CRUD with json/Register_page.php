<?php  
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
           $error = "<label class='text-danger'>Enter Password</label>";  
      }  
      else if(empty($_POST["Password"]))  
      {  
           $error = "<label class='text-danger'>Enter Password</label>";  
      }
      else if(empty($_POST["Class"]))  
      {  
           $error = "<label class='text-danger'>Enter Class</label>";  
      }
      else if(empty($_POST["roll"]))  
      {  
           $error = "<label class='text-danger'>Enter Roll Number Here</label>";  
      }      
      else  
      {  
           if(file_exists('student.json'))  
           {  
                $current_data = file_get_contents('student.json');  
                $array_data = json_decode($current_data, true);  
                $extra = array(  
                     'Name'               =>     $_POST['Name'],  
                     'Sirname'          =>     $_POST["Sirname"],  
                     'Password'     =>     $_POST["Password"],
                     'Class'     =>     $_POST["Class"],
                     'Roll No.'     =>     $_POST["roll"]
                );  
                $array_data[] = $extra;  
                $final_data = json_encode($array_data);  
                if(file_put_contents('student.json', $final_data))  
                {  
                    if($_POST["Name"]=="Admin")
                    {
                     $message = "<label class='text-success'>Student Data added Successfully!!</p>"; 
                     header("Location: ./AdminPage.php");
                    } 
                    else{
                        $message = "<label class='text-success'>Student Data added Successfully!!</p>"; 
                        header("Location: ./DataPage.php");
                    }
                }  
           }  
           else  
           {  
                $error = 'JSON File not exits';  
           }  
      }  
 }  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>User Registration</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>  
      <body style="background-image: url(sky.jpg)">  
           <br />  
           <div class="container" style="width:500px;background-color: white;border-radius: 27px;margin-top:8%">
                <h3 align="">Register User</h3><br />                 
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
                     <label>Sirname</label>  
                     <input type="text" placeholder="Sirname" name="Sirname" class="form-control" /><br />  
                     <label>Password</label>  
                     <input type="text" placeholder="Password" name="Password" class="form-control" /><br />
                     <label>class</label>  
                     <input type="text" placeholder="Class" name="Class" class="form-control" /><br />  
                     <label>Roll No.</label>  
                     <input type="text" placeholder="Roll No." name="roll" class="form-control" /><br />  
                    
                     <input type="submit" name="submit" placeholder="submit" class="btn btn-control" /><br />                      
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