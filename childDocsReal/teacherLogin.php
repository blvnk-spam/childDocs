<?php
    include_once (__DIR__ . '/includes/dbh.inc.php');
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
    <body bgcolor="FBB917">
        <div><h2>Succesfully selected teacher as user type</h2></div>
        <!--Add code here to hopeufully poll user for an Employee id, check if ID is in teachers list, if is succesful login, else print "Unable to login; Incorrect Credentials" to screen-->
        <!--Once logged in redirect to teacherID=# page?-->
        <?php
            $sql = "SELECT staffID FROM teachers;";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);

            if ($resultCheck > 0){
                while( $staffID = mysqli_fetch_assoc($result)){
                    $staffIDString = $staffID['staffID'];
                    $sql2 = "SELECT * FROM staffs WHERE staffID ='$staffIDString';";
                    $teacherList = mysqli_query($conn, $sql2);
                    $resultCheck2 = mysqli_num_rows($teacherList);
                    if($resultCheck2 > 0){
                        while($row = mysqli_fetch_assoc($teacherList)){
                            echo "id:" .  $row['StaffID'] . " - Name: " . $row['Fname'] . " " . $row['Mname']. " " . $row['Lname']. "<br>";
                        }
                    }
                }
            }
        ?>
    </body>
</html>
