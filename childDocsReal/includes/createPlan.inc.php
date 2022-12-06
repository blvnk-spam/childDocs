<?php
    session_start();
    if(!isset($_SESSION["teacherID"])){
        header("location: ../index.php");
        exit();
    }

    if(isset($_POST["submit"])){
        $weekNum = $_POST["weekNum"];
        $authorName = $_POST["authorName"];
        $activities = $_POST["activities"];
        require_once 'functions.inc.php';

        if(emptyInputCreatePlan($weekNum, $authorName, $activities) !== false){
            header("location: ../createPlan.php?error=emptyinput");
            exit();
        }else{
            require_once 'dbh.inc.php';
            $authorID = $_POST["tid"];

            $sql2 = "SELECT RoomNum FROM teachers WHERE StaffID = '$authorID';";
            $result2 = mysqli_query($conn, $sql2);
            $resultCheck2 = mysqli_num_rows($result2);
            $roomNum;
            if($resultCheck2 == 1){
                $row2 = mysqli_fetch_assoc($result2);
                $roomNum = $row2['RoomNum'];    
            }        
            $sql = "INSERT INTO weeklyplans (WeekNum, Activities, PlanAuthor, PlanAuthorID, RoomNum) VALUES(?, ?, ?, ?, ?);";
            $stmt = mysqli_stmt_init($conn);
    
            if(!mysqli_stmt_prepare($stmt, $sql)){
                header("location: ../createPlan.php?error=stmtfailed");
                exit();
            }
    
            mysqli_stmt_bind_param($stmt, "sssss", $weekNum, $activities, $authorName, $authorID, $roomNum);
            mysqli_stmt_execute($stmt);
    
            mysqli_stmt_close($stmt);
            header("location: ../weeklyPlans.php");
            exit();
        }
    }
?>