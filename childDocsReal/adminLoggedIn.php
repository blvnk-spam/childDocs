<?php
    include_once (__DIR__ . '/includes/dbh.inc.php');
    session_start();
?>

<!DOCTYPE html>
<html lang = "en">
    <head>
        <meta charset = "UTF-8">
        <meta name = "viewport" content = "width= devive-width, initial-scale=1.0">
        <title>Home Page</title>
        <style>
            .flex-parent{
                display: flex;
            }

            .jc-center {
                justify-content: center; 
            }

            .button {

            }
        </style>
    
    </head>

    <h1>childDocs</h1>
    <body bgcolor="B22B2B">
            <!-- enter code here displaying the logged in admins info-->
            <!-- Labib format maybe? -->
            <?php
            if(isset($_SESSION["adminID"])){
                $adminID = $_SESSION["adminID"];
                $sql = "SELECT * FROM staffs WHERE StaffID = '$adminID';";
                $result = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);

                if ($resultCheck > 0){
                    while($row = mysqli_fetch_assoc($result)){
                        echo "Welcome " . $row['Fname'] . " " . $row['Mname'] . " " . $row['Lname'] . "<br>";
                    }
                }           

            }
            ?> 

            <?php
            $childs ="";
            if(isset($_SESSION["adminID"])){
                $aid = $_SESSION["adminID"];
            }

            $sql = "SELECT * FROM child ORDER BY ChildID;";
            $res = mysqli_query($conn, $sql);
            if(mysqli_num_rows($res) > 0){
                $childs .= "<table width = '100%' style = 'border-sollapse:collapse;'>";
                $childs .= "<tr style='background-color: #dddddd;'><td>ChildID</td><td width ='65' align='center'>Room Number</td><td width='65' align='center'>Guardian SSN</td></tr>";
                $childs .= "<tr><td colspan='3'><hr /></td></tr>";
                while($row = mysqli_fetch_assoc($res)){
                    $childID = $row['ChildID'];
                    $name = $row['Fname'];
                    $name .= " " .$row['Mname'];
                    $name .= " " .$row['Lname'];
                    $roomNum = $row['RoomNum'];
                    $guardianSSN = $row['GuardianSSN'];
                    $childs .= "<tr><td><a href ='viewChild.php?childID=".$childID."'>".$childID."</a><br><span class='childInfo'>".$name."</span></td><td align ='center'>".$roomNum."</td><td align ='center'>".$guardianSSN."</td></tr>";
                    $childs .= "<tr><td colspan='3'><hr /></td></tr>";
                }
                $childs .= "</table>";
                echo $childs;
            }else{
               echo "No children to display </br>";
               echo "<a href = 'index.php'>Return to index page</a></br>";
            }
        ?>
            <!-- enter code here displaying the logged in admins child edit info, format as table if possible?-->
    </body>
</html>
