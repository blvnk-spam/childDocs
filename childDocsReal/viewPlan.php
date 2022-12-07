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
        
        <div><h2>Viewing a plan!</h2></div>
            <hr />
            <?php
                $planNum = $_GET["planNum"];
                    $sql = "SELECT * FROM weeklyplans WHERE WeeklyPlanNum = ?;";
                    $stmt = mysqli_stmt_init($conn);
                    if(!mysqli_stmt_prepare($stmt, $sql)){
                        header("location: weeklyPlans.php?error=stmtfailed");
                        exit();
                    }

                    mysqli_stmt_bind_param($stmt, "s", $planNum);
                    mysqli_stmt_execute($stmt);

                    $resultData = mysqli_stmt_get_result($stmt);

                    if($row = mysqli_fetch_assoc($resultData)){
                        echo "You selected a weekly plan for room: " . $row['RoomNum'] .  "<br />For week:" . $row['WeekNum'] . "<br /> Written by alias: " . $row['PlanAuthor'] . " Staff ID: " . $row['PlanAuthorID'];
                        echo "<hr />";
                        echo $row['Activities'];
                        echo "<br />";
                    }

                echo "<a href = 'teacherLoggedIn.php'>Return to Teacher page</a></br>";
            ?>

            
    </body>
</html>
