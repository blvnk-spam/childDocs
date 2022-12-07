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
    <body bgcolor="B22B2B">
        <div><h2>Succesfully selected parent as user type; login!</h2></div>
        <!--Add code here to hopeufully poll user for an parents SSN, check if SSN is in parents table, if is succesful login, else print "Unable to login; Incorrect Credentials" to screen-->
        <!--Once logged in redirect to parentID=# page--> 
        <form action ="includes/parentLogin.inc.php" method = "post">
            <input type = "text" name = "uniqueID" placeholder="Enter your ssn..."> 
            <button type="submit" name="submit">Login</button>
        </form>
        <?php
            if(isset($_GET["error"])){
                if($_GET["error"] == "emptyinput"){
                    echo "<p>Fill in the available field</p>";
                }else if($_GET["error"] == "wronglogin"){
                    echo  "<p>Please enter a valid unique ID</p>";
                }else if($_GET["error"] == "stmtfailed"){
                    echo "<p>Something went wrong, please try again!</p>";
                }    
            }
        ?>
    </body>
</html>
