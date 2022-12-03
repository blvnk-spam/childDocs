<?php
    include_once (__DIR__ . '/includes/dbh.inc.php');
    session_start();
?>

<!DOCTYPE html>
<html lang = "en">
    <head>
        <meta charset = "UTF-8">
        <meta name = "viewport" content = "width= devive-width, initial-scale=1.0">
        <title>Home Page</title>
        <style>
            .flex-parent{
                display: flex;
            }

            .jc-center {
                justify-content: center; 
            }

            .button {

            }
        </style>
    
    </head>

    <h1>childDocs</h1>
    <body bgcolor="B22B2B">
            <!-- enter code here displaying the logged in parents info-->
            <?php

            if(isset($_SESSION["teacherID"])){
                $teacherID = $_SESSION["teacherID"];
                $sql = "SELECT * FROM staffs WHERE StaffID = '$teacherID';";
                $result = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);
    
                if ($resultCheck > 0){
                    while($row = mysqli_fetch_assoc($result)){
                        echo "Welcome " . $row['Fname'] . " " . $row['Mname'] . " " . $row['Lname'] . "<br>";
                    }
                }
    
            }
            ?> 
            <!-- enter code here displaying the logged in parents childrens info, format as table if possible?-->
    </body>
</html>
