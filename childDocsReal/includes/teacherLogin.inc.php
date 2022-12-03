<?php
    if(isset($_POST["submit"])){
        $teacherID = $_POST["employeeID"];

        require_once 'dbh.inc.php';
        require_once 'functions.inc.php';

        if(emptyInputLogin($teacherID) !== false){
            header("location: ../teacherLogin.php?error=emptyinput");
            exit();
        }

        loginTeacher($conn, $teacherID);
    }else{
        header("location: ../teacherLogin.php");
        exit();
    }
