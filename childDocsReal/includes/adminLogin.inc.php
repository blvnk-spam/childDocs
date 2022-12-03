<?php
    if(isset($_POST["submit"])){
        $adminID = $_POST["employeeID"];

        require_once 'dbh.inc.php';
        require_once 'functions.inc.php';

        if(emptyInputLogin($adminID) !== false){
            header("location: ../adminLogin.php?error=emptyinput");
            exit();
        }

        loginAdmin($conn, $adminID);
    }else{
        header("location: ../adminLogin.php");
        exit();
    }
