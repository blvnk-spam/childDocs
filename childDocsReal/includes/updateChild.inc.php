<?php
    session_start();
    if(!isset($_SESSION["adminID"])){
        header("location: ../index.php");
        exit();
    }

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(isset($_POST["submit"])){
        $childID= $_POST["childID"];
        $roomNum = $_POST["roomNum"];
        $busNum = $_POST["busNum"];

        if(emptyInputUpdateChild($childID, $roomNum, $busNum) !== false){
            $childID = $_POST["childID"];
            header("location: ../viewChild.php?childID=". $childID ."&error=emptyinput");
            exit();
        }

        updateChild($conn, $childID, $roomNum, $busNum);

    }else{
        header("location: ../index.php");
        exit();
    }
?>