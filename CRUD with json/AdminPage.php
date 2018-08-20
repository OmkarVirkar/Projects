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
          <link rel="stylesheet"  href="output.css" />  
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
          <script src="Admin_ops.js"></script>  

     </head>  
     <body  style="background-image: url(sky.jpg)">  
          <div class="container" > 
                <div class="top-bar"> 
                        <h3 align="">Welcome Admin</h3><br />
                        <!-- Enter update and logout here!! -->
                       <a href="./logout.php" style="float:right" class="btn btn-danger">Logout</a>
 
                 </div> 
          </div>
               
          <br>
              
                            
          <div class="table-responsive">
               <br> 
               <input id="myInput" type="text" placeholder="Search"><br><br> 
               <button class="btn btn-info" value="Sort" name="Sort Ascending" onclick="sortAsc()">Sort Ascending</button>
               <button class="btn btn-warning" value="Sort" name="Sort Descending" onclick="sortDesc()">Sort Descending</button> <br><br>
                    <table class="table table-bordered" style="margin-left: 7%;width: auto">  
                         <tr>  
                              <th>Name</th>
                              <th>Sirname</th>
                              <th>Password</th>
                              <th>Class</th>
                              <th>Roll No.</th>  
                         </tr>
                         <tbody id="myTable">  
                         <?php   
                         $data = file_get_contents("student.json");  
                         $data = json_decode($data, true);  
                         foreach($data as $row)  
                         { 
      
                                          echo '<tr>
                                          <td>'.$row["Name"].'</td>
                                          <td>'.$row["Sirname"].'</td>
                                          <td>'.$row["Password"].'</td>
                                          <td>'.$row["Class"].'</td>
                                          <td>'.$row["Roll No."].'</td>                                   
                                      </tr>';
                               
                         }  
                         ?>
                         </tbody>  
                    </table>  
               </div>  
            
          <br />  
     </body>  
</html>  