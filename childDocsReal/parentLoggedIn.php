<?php
    include_once (__DIR__ . '/includes/dbh.inc.php');
    session_start();
    require "header.php"
?>

    <body>
            <!-- enter code here displaying the logged in parents info-->
            <!-- Labib format maybe? -->
            <?php

                if(isset($_SESSION["parentSSN"])){
                    $parentSSN = $_SESSION["parentSSN"];
                    $sql = "SELECT * FROM guardians WHERE GuardianSSN = '$parentSSN';";
                    $result = mysqli_query($conn, $sql);
                    $resultCheck = mysqli_num_rows($result);
    

                    echo '<table style = "width: 50%">
                                            <tr style = "background-color: #dddddd">
                                                <th >ChildID</th>
                                                <th>Name</th>
                                                <th>Bus Number</th>
                                                <th>Bus Driver</th>
                                            </tr>';

                    if ($resultCheck > 0){
                        while($row = mysqli_fetch_assoc($result)){
                            $pname = " " .$row['Fname'];
                            $pname .= " " .$row['Mname'];
                            $pname .= " " .$row['Lname'];
                            echo " <h3 class = 'adminInfo'> Welcome $pname!</h3>";
                            echo " Your children are as follows: <br>"; 
                            $guardianIDString = $row['GuardianSSN'];
                            $sql2 = "SELECT * FROM child WHERE GuardianSSN = '$guardianIDString';";
                            $result2 = mysqli_query($conn, $sql2);
                            $resultCheck2 = mysqli_num_rows($result2);
                            if($resultCheck2 > 0){
                                while($row2 = mysqli_fetch_assoc($result2)){
                                $childBusNumber = $row2['BusNum'];
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
                                            $row5 = mysqli_fetch_assoc($result5);
                                        }   
                                    }
                                    if($row2['BusNum'] !== "0"){
                                        echo ' 
                                        <tr style="text-align: center">
                                            <td>'.$row2['ChildID'].'</td>
                                            <td>'.$row2['Fname'] . " " . $row2['Mname'] . " " . $row2['Lname'].'</td>
                                            <td>'.$row2['BusNum'].'</td>
                                            <td>'.$row5['Fname'] . " " . $row5['Mname'] . " " . $row5['Lname'].'</td>
                                        </tr>';
                                    }else{
                                        $noBus = "Child does not ride bus";
                                        $noBusNum = "NA";
                                        echo ' 
                                        <tr style="text-align: center">
                                            <td>'.$row2['ChildID'].'</td>
                                            <td>'.$row2['Fname'] . " " . $row2['Mname'] . " " . $row2['Lname'].'</td>
                                            <td>'.$noBusNum.'</td>
                                            <td>'.$noBus.'</td>
                                        </tr>';
                                    }

                                }else{
                                    $noBus = "Child does not ride bus";
                                    $noBusNum = "NA";
                                    echo ' 
                                    <tr style="text-align: center">
                                        <td>'.$row2['ChildID'].'</td>
                                        <td>'.$row2['Fname'] . " " . $row2['Mname'] . " " . $row2['Lname'].'</td>
                                        <td>'.$noBusNum.'</td>
                                        <td>'.$noBus.'</td>
                                    </tr>';
                                }
                                
                                }
                            }
                        }
                        
                    }

                    
    
                }


            ?> 
            <!-- enter code here displaying the logged in parents childrens info, format as table if possible?-->
    </body>
</html>
