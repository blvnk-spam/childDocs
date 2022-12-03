<?php
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
    
    function emptyInputParentLogin($parentSSN){
        $result;
        if(empty($parentSSN)){
            $result = true;
        }else{
            $result = false;
        }
        return $result;
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

    function emptyInputTeacherLogin($teacherID){
        $result;
        if(empty($teacherID)){
            $result = true;
        }else{
            $result = false;
        }
        return $result;
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