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
                        echo "Welcome " . $row['Fname'] . " " . $row['Mname'] . " " . $row['Lname'] . "<br>";
                    }
                }           

            }
            ?> 
            <!-- enter code here displaying the logged in admins child edit info, format as table if possible?-->
    </body>
</html>
