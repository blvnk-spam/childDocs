<?php
    if(isset($_POST["submit"])){
        $parentSSN = $_POST["uniqueID"];

        require_once 'dbh.inc.php';
        require_once 'functions.inc.php';

        if(emptyInputLogin($parentSSN) !== false){
            header("location: ../parentLogin.php?error=emptyinput");
            exit();
        }

        loginParent($conn, $parentSSN);
    }else{
        header("location: ../parentLogin.php");
        exit();
    }
