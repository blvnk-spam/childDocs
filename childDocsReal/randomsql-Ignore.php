<?php
            $sql = "SELECT * FROM guardians;";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);

            if ($resultCheck > 0){
                while($row = mysqli_fetch_assoc($result)){
                    echo "SSN: " . $row['GuardianSSN'] . " " . "Name: " . $row['Fname'] . " " . $row['Mname'] . " " . $row['Lname'] . "<br>";
                    echo "</t>" .  "children:" . "<br>";
                    $guardianIDString = $row['GuardianSSN'];
                    $sql2 = "SELECT * FROM child WHERE GuardianSSN = '$guardianIDString';";
                    $result2 = mysqli_query($conn, $sql2);
                    $resultCheck2 = mysqli_num_rows($result2);
                    if($resultCheck2 > 0){
                        while($row2 = mysqli_fetch_assoc($result2)){
                           echo  "ChildID: " . $row2['ChildID'] . " " . "Name: " . $row2['Fname'] . " " . $row2['Mname'] . " " . $row2['Lname'] . "<br>";
                           echo  "Rides Bus: ";
                           $childBusNumber = $row2['BusNum'];
                           echo $row2['BusNum'] . "<br>";
                           echo "Driven By:";
                           $sql3 = "SELECT DriverLicenseNum FROM busses WHERE BusID = '$childBusNumber';";
                           $result3 = mysqli_query($conn, $sql3);
                           $resultCheck3 = mysqli_num_rows($result3);
                           if($resultCheck3 > 0){
                            $row3 = mysqli_fetch_assoc($result3);
                            $licenseNum = $row3['DriverLicenseNum'];
                            $sql4 = "SELECT StaffID FROM drivers WHERE LicenseNum = '$licenseNum';";
                            $result4 = mysqli_query($conn, $sql4);
                            $resultCheck4 = mysqli_num_rows($result4);
                            if($resultCheck4 > 0){
                                $row4 = mysqli_fetch_assoc($result4);
                                $staffID = $row4['StaffID'];
                                $sql5 = "SELECT * FROM staffs WHERE StaffID = '$staffID';";
                                $result5 = mysqli_query($conn, $sql5);
                                $resultCheck5 = mysqli_num_rows($result5);
                                if($resultCheck5 > 0){
                                    echo " ";
                                    $row5 = mysqli_fetch_assoc($result5);
                                    echo $row5['Fname'] . " " . $row5['Mname'] . " " . $row5['Mname'] . "<br>";
                                }
                            }
                            echo "<br>";
                           }
                        }
                        echo "<br><br><br>";
                    }
                }    
            }    
        ?>

        <?php
            $sql = "SELECT staffID FROM teachers;";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);

            if ($resultCheck > 0){
                while( $staffID = mysqli_fetch_assoc($result)){
                    $staffIDString = $staffID['staffID'];
                    $sql2 = "SELECT * FROM staffs WHERE staffID ='$staffIDString';";
                    $teacherList = mysqli_query($conn, $sql2);
                    $resultCheck2 = mysqli_num_rows($teacherList);
                    if($resultCheck2 > 0){
                        while($row = mysqli_fetch_assoc($teacherList)){
                            echo "id:" .  $row['StaffID'] . " - Name: " . $row['Fname'] . " " . $row['Mname']. " " . $row['Lname']. "<br>";
                        }
                    }
                }
            }
        ?>
        <?php
            $sql = "SELECT staffID FROM admin;";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);

            if ($resultCheck > 0){
                while( $staffID = mysqli_fetch_assoc($result)){
                    $staffIDString = $staffID['staffID'];
                    $sql2 = "SELECT * FROM staffs WHERE staffID ='$staffIDString';";
                    $adminList = mysqli_query($conn, $sql2);
                    $resultCheck2 = mysqli_num_rows($adminList);
                    if($resultCheck2 > 0){
                        while($row = mysqli_fetch_assoc($adminList)){
                            echo "id:" .  $row['StaffID'] . " - Name: " . $row['Fname'] . " " . $row['Mname']. " " . $row['Lname']. "<br>";
                        }
                    }
                }
            }
        ?>