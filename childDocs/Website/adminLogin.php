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
        <div><h2>Succesfully selected admin as user type</h2></div>
        <!--Add code here to hopeufully poll user for an Employee id, check if ID is in admins list, if is succesful login, else print "Unable to login; Incorrect Credentials top screen--> 
        <!--Once logged in redirect to adminID=# page-->   
        <?php
            $sql = "SELECT * FROM admin;";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);

            if ($resultCheck > 0){
                while( $row = mysqli_fetch_assoc($result)){
                    echo $row['name'] . "<br>";
                }
            }
        ?>

    </body>
</html>
