<?php
    function emptyInputLogin($inputLogin){
        $result = false;
        if(empty($inputLogin)){
            $result = true;
        }else{
            $result = false;
        }
        return $result;
    }

    function emptyInputCreatePlan($weekNum, $authorName, $activities){
        $result = false;
        if(empty($weekNum)){
            $result = true; 
        }else if(empty($authorName)){
            $result = true;
        }else if(empty($activities)){
            $result = true;
        }else{
            $result = false;
        }
        return $result;
    }

    function emptyInputUpdateChild($childID, $roomNum, $busNum){
        $result = false;
        if(empty($childID)){
            $result = true; 
        }else if(empty($roomNum)){
            $result = true;
        }else{
            $result = false;
        }
        return $result;
    }

    function parentSSNExists($conn, $parentSSN){
        $sql = "SELECT * FROM guardians WHERE GuardianSSN = ?;";
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../parentLogin.php?error=stmtfailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "s", $parentSSN);
        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt);

        if($row = mysqli_fetch_assoc($resultData)){
            return $row;
        }else {
            $result = false;
            return $result;
        }

        mysqli_stmt_close($stmt);
        header("location: ../parentLogin.php?error=none");
        exit();
    }

    function teacherIDExists($conn, $teacherID){
        $sql = "SELECT * FROM teachers WHERE StaffID = ?;";
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../teacherLogin.php?error=stmtfailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "s", $teacherID);
        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt);

        if($row = mysqli_fetch_assoc($resultData)){
            return $row;
        }else {
            $result = false;
            return $result;
        }

        mysqli_stmt_close($stmt);
        header("location: ../teacherLogin.php?error=none");
        exit();
    }

    function adminIDExists($conn, $adminID){
        $sql = "SELECT * FROM admins WHERE StaffID = ?;";
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../adminLogin.php?error=stmtfailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "s", $adminID);
        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt);

        if($row = mysqli_fetch_assoc($resultData)){
            return $row;
        }else {
            $result = false;
            return $result;
        }

        mysqli_stmt_close($stmt);
        header("location: ../adminLogin.php?error=none");
        exit();
    }

    function childIDExists($conn, $childID){
        $sql = "SELECT * FROM child WHERE ChildID = ?;";
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../viewChild.php?childID=". $childID ."&error=stmtfailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "s", $childID);
        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt);

        if($row = mysqli_fetch_assoc($resultData)){
            return $row;
        }else {
            $result = false;
            return $result;
        }

        mysqli_stmt_close($stmt);
    }

    function roomNumExists($conn, $roomNum, $childID){
        $sql = "SELECT * FROM rooms WHERE RoomNum = ?;";
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../viewChild.php?childID=". $childID ."&error=stmtfailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "s", $roomNum);
        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt);

        if($row = mysqli_fetch_assoc($resultData)){
            return $row;
        }else {
            $result = false;
            return $result;
        }

        mysqli_stmt_close($stmt);
    }

    function busNumExists($conn, $busNum, $childID){
        $sql = "SELECT * FROM busses WHERE BusID = ?;";
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../viewChild.php?childID=". $childID ."&error=stmtfailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "s", $busNum);
        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt);

        if($row = mysqli_fetch_assoc($resultData)){
            return $row;
        }else {
            $result = false;
            return $result;
        }

        mysqli_stmt_close($stmt);
    }



    function loginParent($conn, $parentSSN){
        $parentSSNExists = parentSSNExists($conn, $parentSSN);

        if($parentSSNExists === false){
            header("location: ../parentLogin.php?error=wronglogin");
            exit();
        }

        session_start();
        $_SESSION["parentSSN"] = $parentSSNExists["GuardianSSN"];
        header("location: ../parentLoggedIn.php");
        exit();
    }


    function loginTeacher($conn, $teacherID){
        $teacherIDExists = teacherIDExists($conn, $teacherID);

        if($teacherIDExists === false){
            header("location: ../teacherLogin.php?error=wronglogin");
            exit();
        }

        session_start();
        $_SESSION["teacherID"] = $teacherIDExists["StaffID"];
        header("location: ../teacherLoggedIn.php");
        exit();
    }

    function loginAdmin($conn, $adminID){
        $adminIDExists = adminIDExists($conn, $adminID);

        if($adminIDExists === false){
            header("location: ../adminLogin.php?error=wronglogin");
            exit();
        }

        session_start();
        $_SESSION["adminID"] = $adminIDExists["StaffID"];
        header("location: ../adminLoggedIn.php");
        exit();
    }

    function updateChild($conn, $childID, $roomNum, $busNum){
        $childIDExists = childIDExists($conn, $childID);
        $busNumExists = busNumExists($conn, $busNum, $childID);
        $roomNumExists = roomNumExists($conn, $roomNum, $childID);

        if(($childIDExists === false) || ($busNumExists === false && !empty($busNum)) || ($roomNumExists === false)){
            header("location: ../viewChild.php?childID=". $childID ."&error=invalidInput");
            exit();
        }

        $sql1 = "SELECT BusShift FROM BUSSES WHERE BusID=?;";
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql1)){
            header("location: ../viewChild.php?childID=". $childID ."&error=stmtfailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "s", $busNum);
        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt);

        if($row = mysqli_fetch_assoc($resultData)){
            $busShift = $row["BusShift"];
        }else{
            $busShift = "";
        }

        mysqli_stmt_close($stmt);

        $sql2 = "UPDATE child SET RoomNum=?, BusNum=?, BusShift=?  WHERE ChildID=?;";
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql2)){
            header("location: ../viewChild.php?childID=". $childID ."&error=stmtfailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "ssss", $roomNum, $busNum, $busShift, $childID);
        mysqli_stmt_execute($stmt);
        header("location: ../viewChild.php?childID=". $childID."");
        exit();
    }
