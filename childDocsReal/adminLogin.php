<?php
    include_once (__DIR__ . '/includes/dbh.inc.php');
    require "header.php"
?>

    <h1>childDocs</h1>
    <body>
        <div><h2>Hello! Please login.</h2></div>
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
