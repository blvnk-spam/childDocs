<?php 
    include_once (__DIR__ . '/includes/dbh.inc.php');
    session_start();
    require "header.php"
?>
<?php
    if(!isset($_SESSION["teacherID"])){
        header("location: index.php");
        exit();
    }else{
        echo "<p>You are logged in as employee ID: ".$_SESSION["teacherID"]."";
    }
    $tid = $_SESSION["teacherID"];
?>

    <body>
        
        <div><h2>Create a weekly plan!</h2></div>
            <hr />
            <form action="includes/createPlan.inc.php" method ="post">
                <p>Week Number: 1-52</p>
                <input type="text" name="weekNum" size="98" maxlength="2" />
                <p>Author Name</p>
                <input type="text" name="authorName" size="98" maxlength="150" /> 
                <p>Activities</p>
                <textarea name="activities" rows="5" cols="75"></textarea>
                <br /><br />
                <input type="hidden" name="tid" value = "<?php echo $tid; ?>" />
                <button class = "btn6" type="submit" name="submit">Submit Plan</button>
            </form>

            <?php
            if(isset($_GET["error"])){
                if($_GET["error"] == "emptyinput"){
                    echo "<p>Please fill in all available fields</p>";
                }
            }
            ?>   
    </body>
</html>
