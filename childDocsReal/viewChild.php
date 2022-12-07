<?php 
    include_once (__DIR__ . '/includes/dbh.inc.php');
    session_start();
?>
<?php
    if(!isset($_SESSION["adminID"])){
        header("location: index.php");
        exit();
    }else{
        echo "<p>You are logged in as employee ID: ".$_SESSION["adminID"]."";
    }
    $aid = $_SESSION["adminID"];
?>


<!DOCTYPE html>
<html lang = "en">
    <head>
        <meta charset = "UTF-8">
        <meta name = "viewport" content = "width= devive-width, initial-scale=1.0">
        <title>Home Page</title> 
    </head>

    <h1>childDocs</h1>
    <body bgcolor="B22B2B">
        
        <div><h2>You have entered child viewing</h2></div>
        <?php
            $childID = $_GET["childID"];
            echo "viewing child: " . $childID;
        ?>
    </body>
</html>
