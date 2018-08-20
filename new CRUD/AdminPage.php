<?php

    // Include Inportant files
    include "connection.php";
    include "session.php";


    //Start Session
    session_start();


    //Check if the Session is active , to provide more security
    if((empty($_SESSION['name']) && empty($_SESSION['passwd'])) || $_SESSION["name"]!= "Admin")
    {
        header("Location: index.php");
    }

    $Name = $_SESSION['name'];
    $Passwd = $_SESSION['passwd'];
    $sql = "select * from student";
    $result = mysqli_query($conn, $sql);
    $rows = mysqli_fetch_assoc($result); 
?>


<!DOCTYPE html>
    <html>
    <head>
        <title>Admin Page</title>
        <link rel='stylesheet' type='text/css' media='screen' href='main.css' />
        <style>


        /* Page Styling */
        #customers {
            font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width:10%;
        }
        
        #customers td, #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }
        
        #customers tr:nth-child(even){background-color: #f2f2f2;}
        #customers tr:nth-child(odd){background-color: #EDEEEC;}
        
        #customers tr:hover {background-color: #ddd;}
        
        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #4CAF50;
            color: white;
        }

        .dropbtn {
            background-color: #4CAF50;
            color: white;
            padding: 16px;
            font-size: 16px;
            border: none;
        }
        
        .dropdown {
            position: relative;
            display: inline-block;
        }
        
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f1f1f1;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }
        
        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }
        
        .dropdown-content a:hover {background-color: #ddd;}
        
        .dropdown:hover .dropdown-content {display: block;}
        
        .dropdown:hover .dropbtn {background-color: #3e8e41;}
    </style>

    </head>
    <body style='background-image: url(6768666-1080p-wallpapers.jpg); margin-top: 0px;margin-left: 0px;margin-right: 0px'>

        <!-- Header Line -->
        <div style='background-color:lightblue'>
            <h style='font-size:100px'><?php echo "Welcome ".$Name ?></h><br />
            <div class='dropdown' style='float:right'>
                <button class='dropbtn' style="width: 160px">Menu</button>
                <div class='dropdown-content'>
                    <a href='update_admin.php'>Admin Update</a>
                    <a href='user_update.php'>User Update</a>
                    <a href='user_delete.php'>Delete User</a>
                    <a href='logout.php'>Logout</a>

                 </div>
            </div>
            
        </div>

        <!-- Table That Displays user Data-->
        <table style='margin-left:41%;margin-top:12%' id='customers'>

            <!-- Titles of the Table -->
            <tr style='background-color:lightblue'>
               <td>Name</td>
               <td>Sirname</td>
               <td>Password</td>
               <td>Class</td>
               <td>RollNo.</td>
            </tr>

            <!-- This Code Displays all the info of users in the table -->
            <?php
                $i=0; // this refer every row..now its 0

                // While there are entries left in the table, it will add the data to the table
                while ($row = mysqli_fetch_array($result))  
                {
                    echo "<tr>";
                    echo "<td>" .$row['Name'] . " </td>";
                    echo "<td>".$row['Sirname']."</td>";
                    echo "<td>".$row['Passwd']."</td>";
                    echo "<td>".$row['class']."</td>";
                    echo "<td>".$row['RollNo']."</td>";
                    echo "</tr>";    
                    $i++;  
                }               
            ?>

        </table>
    </body>
    </html>
    
