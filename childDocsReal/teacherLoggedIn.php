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

    <h1>childDocs
            <form action = "weeklyPlans.php" method="post">
                <button type ="submit" formaction="weeklyPlans.php"> Weekly Plans </button>
            </form>
    </h1>
    <body bgcolor="B22B2B">
            <!-- enter code here displaying the logged in teachers info-->
            <!-- Labib format maybe?-->
            <?php

            if(isset($_SESSION["teacherID"])){
                $teacherID = $_SESSION["teacherID"];
                $sql = "SELECT * FROM staffs WHERE StaffID = '$teacherID';";
                $result = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);
                if ($resultCheck > 0){
                    while($row = mysqli_fetch_assoc($result)){
                            echo "Welcome " . $row['Fname'] . " " . $row['Mname'] . " " . $row['Lname'] . "<br>";
                            $sql2 = "SELECT RoomNum FROM teachers WHERE StaffID = '$teacherID';";
                            $result2 = mysqli_query($conn, $sql2);
                            $resultCheck2 = mysqli_num_rows($result2);
                            if($resultCheck2 > 0){
                                while($row2 = mysqli_fetch_assoc($result2)){
                                    $roomNum = $row2['RoomNum'];
                                    echo "Displaying information for classroom " . $row2['RoomNum'] . ":<br>"; 
                                    echo '<table>
                                            <tr>
                                                <th>ChildID</th>
                                                <th>Name</th>
                                                <th>Bus Number</th>
                                                <th>Bus Driver</th>
                                            </tr>';
                                    $sql3 = "SELECT * FROM child WHERE RoomNum = '$roomNum';";  
                                    $result3 = mysqli_query($conn, $sql3);
                                    $resultCheck3 = mysqli_num_rows($result3);
                                    if($resultCheck3 > 0){
                                        while($row3 = mysqli_fetch_assoc($result3)){
                                            $childBusNumber = $row3['BusNum'];
                                            $sql4 = "SELECT DriverLicenseNum FROM busses WHERE BusID = '$childBusNumber';";
                                            $result4 = mysqli_query($conn, $sql4);
                                            $resultCheck4 = mysqli_num_rows($result4);
                                            if($resultCheck4 > 0){
                                                $row4 = mysqli_fetch_assoc($result4);
                                                $licenseNum = $row4['DriverLicenseNum'];
                                                $sql5 = "SELECT StaffID FROM drivers WHERE LicenseNum = '$licenseNum';";
                                                $result5 = mysqli_query($conn, $sql5);
                                                $resultCheck5 = mysqli_num_rows($result5);
                                                if($resultCheck5 > 0){
                                                    $row5 = mysqli_fetch_assoc($result5);
                                                    $staffID = $row5['StaffID'];
                                                    $sql6 = "SELECT * FROM staffs WHERE StaffID = '$staffID';";
                                                    $result6 = mysqli_query($conn, $sql6);
                                                    $resultCheck6 = mysqli_num_rows($result6);
                                                    if($resultCheck6 > 0){
                                                        $row6 = mysqli_fetch_assoc($result6);
                                                    }   
                                                }
                                                echo ' 
                                                <tr>
                                                    <td>'.$row3['ChildID'].'</td>
                                                    <td>'.$row3['Fname'] . " " . $row3['Mname'] . " " . $row3['Lname'].'</td>
                                                    <td>'.$row3['BusNum'].'</td>
                                                    <td>'.$row6['Fname'] . " " . $row6['Mname'] . " " . $row6['Lname'].'</td>
                                                </tr>';
            
                                            }else{
                                                $noBus = "Child does not ride bus";
                                                $noBusNum = "NA";
                                                echo ' 
                                                <tr>
                                                    <td>'.$row3['ChildID'].'</td>
                                                    <td>'.$row3['Fname'] . " " . $row3['Mname'] . " " . $row3['Lname'].'</td>
                                                    <td>'.$noBusNum.'</td>
                                                    <td>'.$noBus.'</td>
                                                </tr>';
                                            }
                                            
                                            }
                                    }

                                }
                            }
                    }
                }
            }
            ?> 
            <!-- enter code here displaying the logged in teachers classroom info, format as table if possible?-->
    </body>
</html>
