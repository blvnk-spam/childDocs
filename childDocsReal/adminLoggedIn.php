<?php
    include_once (__DIR__ . '/includes/dbh.inc.php');
    session_start();
    require "header.php"
?>

    <body>
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
                        $adname = " " .$row['Fname'];
                        $adname .= " " .$row['Mname'];
                        $adname .= " " .$row['Lname'];
                        echo " <h3 class = 'adminInfo'> Welcome $adname.</h3>";
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
                $childs .= "<table width = '50%' style = 'border-sollapse:collapse;'>";
                $childs .= "<tr style='background-color: #dddddd;;'><td width='15' align='center'>ChildID</td><td width='98' align='center'>Child Name</td><td width ='65' align='center'>Room Number</td><td width='65' align='center'>Guardian SSN</td></tr>";
                $childs .= "<tr><td colspan='4'><hr /></td></tr>";
                while($row = mysqli_fetch_assoc($res)){
                    $childID = $row['ChildID'];
                    $name = $row['Fname'];
                    $name .= " " .$row['Mname'];
                    $name .= " " .$row['Lname'];
                    $roomNum = $row['RoomNum'];
                    $guardianSSN = $row['GuardianSSN'];
                    $childs .= "<tr><td align ='center'>".$childID."</td><td align ='center'><a class = 'test' href ='viewChild.php?childID=".$childID."'>".$name."</a></td><td align ='center'>".$roomNum."</td><td align ='center'>".$guardianSSN."</td></tr>";
                    $childs .= "<tr><td colspan='4'><hr /></td></tr>";
                }
                $childs .= "</table>";
                echo $childs;
            }else{
               echo "No children to display </br>";
               echo "<a href = 'index.php'><button class = 'btn7'>Return to index page</button></a>";
            }
        ?>
            <!-- enter code here displaying the logged in admins child edit info, format as table if possible?-->
    </body>
</html>
