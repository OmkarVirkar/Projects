<?php
 include "session.php";
 session_start();
 $name = $_SESSION['name'];
 $passwd =  $_SESSION['passwd'];
?>

<!DOCTYPE html>  
<html>  
     <head>  
          <title>User Account</title>  
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 

     </head>  
     <body>  
          <br />  
          <div class="container" style="width:500px;"> 
                <div class="top-bar"> 
               <h3 align="">Welcome</h3><br />
               <!-- Enter update and logout here!! -->
               <a href="./logout.php">Logout</a>

               </div>                 
               <div class="table-responsive">  
                    <table class="table table-bordered">  
                         <tr>  
                              <th>Name</th>
                              <th>Sirname</th>
                              <th>Password</th>
                              <th>Class</th>
                              <th>Roll No.</th>  
                         </tr>  
                         <?php   
                         $data = file_get_contents("student.json");  
                         $data = json_decode($data, true);  
                         foreach($data as $row)  
                         { 

                             if($name == $row['Name'] && $passwd == $row['Password'])
                             {
                                echo '<tr><td>'.$row["Name"].'</td>
                                          <td>'.$row["Sirname"].'</td>
                                          <td>'.$row["Password"].'</td>
                                          <td>'.$row["Class"].'</td>
                                          <td>'.$row["Roll No."].'</td>                                   
                                      </tr>';
                             }  
                         }  
                         ?>  
                    </table>  
               </div>  
          </div>  
          <br />  
     </body>  
</html>  