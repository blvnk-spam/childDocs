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
        <form action ="includes/adminLogin.inc.php" method = "post">
            <input type = "text" name = "employeeID" placeholder="Enter your employee ID..."> 
            <button type="submit" name="submit">Login</button>
        </form>
        <?php
            if(isset($_GET["error"])){
                if($_GET["error"] == "emptyinput"){
                    echo "<p>Fill in the available field</p>";
                }else if($_GET["error"] == "wronglogin"){
                    echo  "<p>Please enter a valid employee ID</p>";
                }else if($_GET["error"] == "stmtfailed"){
                    echo "<p>Something went wrong, please try again!</p>";
                }    
            }
        ?>
        

    </body>
</html>
