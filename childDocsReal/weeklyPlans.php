<?php
    include_once (__DIR__ . '/includes/dbh.inc.php');
    session_start();
    require "header.php"
?>
    <body>
        
        <div><h2>Weekly Plans</h2></div>
        <?php
            $plans ="";
            if(isset($_SESSION["teacherID"])){
                $tid = $_SESSION["teacherID"];
                echo "<a href ='createPlan.php?tid=".$tid."'><button class = 'btn6'>Create Weekly Plan</button></a></br>";
                echo "<a href = 'teacherLoggedIn.php'><button class = 'btn8'>Return to Teacher page</button></a></br>";
            }else{
                echo "Not logged in?";
            }

            $sql = "SELECT * FROM weeklyplans ORDER BY WeeklyPlanNum;";
            $res = mysqli_query($conn, $sql);
            if(mysqli_num_rows($res) > 0){
                $plans .= "<table width = '100%' style = 'border-sollapse:collapse;'>";
                $plans .= "<tr style='background-color: #dddddd;'><td>Plan Number</td>";
                while($row = mysqli_fetch_assoc($res)){
                    $planNum = $row['WeeklyPlanNum'];
                    $weekNum = $row['WeekNum'];
                    $author = $row['PlanAuthor'];
                    $authorID = $row['PlanAuthorID'];
                    $roomNum = $row['RoomNum'];
                    $plans .= "<tr><td><a style = 'text-decoration: none' href ='viewPlan.php?planNum=".$planNum."'> Plan: ".$planNum."<br/></a><span class='postInfo'> Posted By: ".$author."<br/>For Room: ".$roomNum."<br/>Week: ".$weekNum."</span></td>";
                    $plans .= "<tr><td colspan='3'><hr /></td></tr>";
                }
                $plans .= "</table>";
                echo $plans;
            }else{
               echo "No plans to display </br>";
               echo "<a href = 'teacherLoggedIn.php'><button class = 'btn6'>Return to Teacher page</button></a></br>";
            }
        ?>   
        
        <?php
            if(isset($_GET["error"])){ 
                if($_GET["error"] == "stmtfailed"){
                    echo "<p>Something went wrong, please try again!</p>";
                }    
            }
        ?>
    </body>
</html>
