<?php
    include "connection.php";
    include "session.php";
  
    
    //Checks if the session is open, if not the user will be directed to the login page!!
    session_start();
    if(empty($_SESSION['name']) && empty($_SESSION['passwd']))
    {
        header("Location: index.php");
    }

    //Retrieve user data from the session
    $Name = $_SESSION['name'];
    $Passwd = $_SESSION['passwd'];

    //searches and retrieves user data from the database
    $sql = "select * from student where Name = '$Name' and Passwd = '$Passwd' ";
    $result = mysqli_query($conn, $sql);
    $rows = mysqli_fetch_assoc($result); 
    $sirname = $rows['Sirname'];
    $class = $rows['class'];
    $roll = $rows['RollNo'];

    //Checks if the user is admin, if true moves the user to the Admin page
    if($Name == "Admin")
    {
        header("Location: AdminPage.php");
    }
?>
    <!-- //Displayes the whole page -->
    <!DOCTYPE html>
    <html>
    <head>
        <title>Page Title</title>
        <link rel='stylesheet' type='text/css' media='screen' href='main.css' />
        <style>
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

    <!-- Welcome User Bar -->
    <body style='background-image: url(6768666-1080p-wallpapers.jpg); margin-top: 0px;margin-left: 0px;margin-right: 0px'>
        <div style='background-color:lightblue;'>
            <h style='font-size:100px'>Welcome <?php echo $Name;?></h><br />

            <!-- Menu Button -->
            <div class='dropdown' style='float:right'>
                <button class='dropbtn'>Menu</button>
                <div class='dropdown-content'>
                    <a href='update.php'>Update</a>
                    <a href='logout.php'>Logout</a>

                 </div>
            </div>
            
        </div>

        <!-- Display User Details -->
        <table style='margin-left:41%;margin-top:15%' id='customers'>
            <tr style='background-color:lightblue'>
               <td>Name</td>
               <td>Sirname</td>
               <td>Password</td>
               <td>Class</td>
               <td>RollNo.</td>
            </tr>
            <tr>
                <td><?php echo $Name ?></td>
                <td><?php echo $sirname ?></td>
                <td><?php echo $Passwd ?></td>
                <td><?php echo $class ?></td>
                <td><?php echo $roll ?></td>
            </tr>
        </table>
    </body>
    </html>";
    
?>