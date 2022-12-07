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
                echo "<a href='createPlan.php?tid=".$tid."'>Create Weekly Plan</a></br>";
            }else{
                echo "Not logged in?";
            }

            $sql = "SELECT * FROM weeklyplans ORDER BY WeeklyPlanNum;";
            $res = mysqli_query($conn, $sql);
            if(mysqli_num_rows($res) > 0){
                $plans .= "<table width = '100%' style = 'border-sollapse:collapse;'>";
                $plans .= "<tr><td colspan = '3'><a href ='teacherLoggedIn.php'> Return to Teacher page</a><hr /></td></tr>";
                $plans .= "<tr style='background-color: #dddddd;'><td>Plan Num</td>";
                while($row = mysqli_fetch_assoc($res)){
                    $planNum = $row['WeeklyPlanNum'];
                    $weekNum = $row['WeekNum'];
                    $author = $row['PlanAuthor'];
                    $authorID = $row['PlanAuthorID'];
                    $roomNum = $row['RoomNum'];
                    $plans .= "<tr><td><a href ='viewPlan.php?planNum=".$planNum."'>".$planNum."</a><span class='postInfo'> Posted By: ".$author." For Room: ".$roomNum." Week: ".$weekNum."</span></td>";
                    $plans .= "<tr><td colspan='3'><hr /></td></tr>";
                }
                $plans .= "</table>";
                echo $plans;
            }else{
               echo "No plans to display </br>";
               echo "<a href = 'teacherLoggedIn.php'>Return to Teacher page</a></br>";
            }
        ?>         
    </body>
</html>
