<?php 
    include_once (__DIR__ . '/includes/dbh.inc.php');
    session_start();
    require "header.php"
?>
<?php
    if(!isset($_SESSION["adminID"])){
        header("location: index.php");
        exit();
    }else{
        echo "<p>You are logged in as employee ID: ".$_SESSION["adminID"]."</br>";
    }
    $aid = $_SESSION["adminID"];
?>


    <body>
        <br>
        <?php
            $childID = $_GET["childID"];
            echo "You are viewing child: " . $childID;

            $sql = "SELECT * FROM child WHERE childID = ?;";
            $stmt = mysqli_stmt_init($conn);
    
            if(!mysqli_stmt_prepare($stmt, $sql)){
                header("location: ../adminLoggedIn.php?error=stmtfailed");
                exit();
            }
    
            mysqli_stmt_bind_param($stmt, "s", $childID);
            mysqli_stmt_execute($stmt);
    
            $resultData = mysqli_stmt_get_result($stmt);
            $childs = "";
            if($row = mysqli_fetch_assoc($resultData)){
                $childs .= "<table width = '50%' style = 'border-sollapse:collapse;'>";
                $childs .= "<tr style='background-color: #dddddd;'><td>ChildID</td><td width ='65' align='center'>Room Number</td><td width='65' align='center'>Guardian SSN</td><td width='65' align='center'>Bus Num</td></tr>";
                $childs .= "<tr><td colspan='4'><hr /></td></tr>";
                    $childID = $row['ChildID'];
                    $name = $row['Fname'];
                    $name .= " " .$row['Mname'];
                    $name .= " " .$row['Lname'];
                    $roomNum = $row['RoomNum'];
                    $guardianSSN = $row['GuardianSSN'];
                    $busNum = $row['BusNum'];
                    $childs .= "<tr><td>".$childID."<br><span class='childInfo'>".$name."</span></td><td align ='center'>".$roomNum."</td><td align ='center'>".$guardianSSN."</td><td align ='center'>".$busNum."</td></tr>";
                    $childs .= "<tr><td colspan='4'><hr /></td></tr>";
                $childs .= "</table>";
                echo $childs;
            }

            mysqli_stmt_close($stmt);            
        ?>

            <form action="includes/updateChild.inc.php" method ="post">
                <p>Enter a valid Room number:</p>
                <input type="text" name="roomNum" size="30" maxlength="2" />
                <p>Enter a valid Bus number:</p>
                <input type="text" name="busNum" size="30" maxlength="30" /> 
                <br /><br />
                <input type="hidden" name="childID" value = "<?php echo $childID; ?>" />
                <button class  = "btn4" type="submit" name="submit">Update Info</button>
            </form>

            <a href = 'adminLoggedIn.php'><button class = "btn11">Return to Admin page</button></a>

            <?php
            if(isset($_GET["error"])){
                if($_GET["error"] == "emptyinput"){
                    echo "<p>Please fill in at least room number</p>";
                }else if($_GET["error"] == "invalidInput"){
                    echo "<p>Please ensure all entered information is valid</p>";
                }else if($_GET["error"] == "stmtfailed"){
                    echo "Something went wrong. Please try again";
                }
            }
            ?>
            
    </body>
</html>
