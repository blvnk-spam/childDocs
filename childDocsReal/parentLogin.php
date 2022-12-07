<?php
    include_once (__DIR__ . '/includes/dbh.inc.php');
    require "header.php"
?>

    <body>
        <div><h2>Hello! Please login.</h2></div>
        <!--Add code here to hopeufully poll user for an parents SSN, check if SSN is in parents table, if is succesful login, else print "Unable to login; Incorrect Credentials" to screen-->
        <!--Once logged in redirect to parentID=# page--> 
        <form action ="includes/parentLogin.inc.php" method = "post">
            <input type = "text" name = "uniqueID" placeholder="Enter your ssn..."> 
            <button class = "btn10" type="submit" name="submit">Login</button>
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
