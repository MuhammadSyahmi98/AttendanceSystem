<?php

require 'connectDB.php';
include 'resources/php/method.php';

    
date_default_timezone_set("Asia/Kuala_Lumpur");

$d = date("Y-m-d");
$t = date("G:i:s");

// get current day
// 0==sunday, 1==monday,...
$day = date('w');



if (isset($_POST["UIDresult"])) {

	$UIDresult = $_POST["UIDresult"];


    // To get mode device either register or record attandance
    $sql = ("SELECT * FROM device_mode");
    $result = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($result, $sql)) {
            echo "SQL_Error_Select_device_mood";
            exit();
    } 
        else {
            mysqli_stmt_execute($result);
            $resultl = mysqli_stmt_get_result($result);
            if ($row = mysqli_fetch_assoc($resultl)){
                $device_mode = $row['device_mode_code'];
                echo "<script>alert('$UIDresult');</script>"; 

                // For registration
                // To display the UID in inputText
                if ($device_mode == 1) {
                    $Write="<?php $" . "UIDresult='" . $UIDresult . "'; " . "echo $" . "UIDresult;" . " ?>";
                    file_put_contents('UIDContainer.php',$Write);

                // For attendance
                // Store record into database
                } else if ($device_mode == 2) {

                    // To check if the day not equal to weekeed(saturday or sunday) or public holiday
                	if (!$day==6 || !$day==0) {
                        // To check if the student already scan the card in that day
                        $sql = "SELECT * FROM attendance WHERE student_id = ? && dates = ?";
                        $result = mysqli_stmt_init($conn);

                        if (!mysqli_stmt_prepare($result, $sql)) {
                            echo "SQL_Error_Fetch_attendance_data";
                            exit();
                        } 
                        else { 

                            mysqli_stmt_bind_param($result, "ss", $UIDresult, $d);
                            mysqli_stmt_execute($result);
                            $resultl = mysqli_stmt_get_result($result);

                            // If not scan, insert data into database
                            if (!$row = mysqli_fetch_assoc($resultl)){

                                // Get all the student data from database
                                $sql = "SELECT * FROM student INNER JOIN class ON student.class_id = class.class_id WHERE student_id = ?";
                                $result = mysqli_stmt_init($conn);

                                if (!mysqli_stmt_prepare($result, $sql)) {
                                    echo "SQL_Error_Select_Student";
                                    exit();
                                } 
                                else {
                                    // Execute sql to get student information
                                    // Avoid sql injection
                                    mysqli_stmt_bind_param($result, "s", $UIDresult);
                                    mysqli_stmt_execute($result);
                                    $resultl = mysqli_stmt_get_result($result);
                                    if ($row = mysqli_fetch_assoc($resultl)){
                                        
                                        $time_in = $t;
                                        $attend_status = "Attend";
                                        $dates = $d;
                                        $student_id = $row['student_id'];

                                        // Use for Email section
                                        $student_name = $row['student_name'];
                                        $student_class = $row['class_name'];
                                        $parentName = $row['parent_name'];

                                        $sql = "INSERT INTO attendance (time_in, dates, attend_status, student_id) VALUES (?,?,?,?)";
                                        $result = mysqli_stmt_init($conn);
                                        if (!mysqli_stmt_prepare($result, $sql)) {
                                            echo "SQL_Error_INSERT DATA";
                                             exit();
                                        } 
                                        else {

                                            // Store student information into attendance table
                                            mysqli_stmt_bind_param($result, 'ssss' , $time_in, $dates, $attend_status, $student_id);
                                            mysqli_stmt_execute($result);
                                            sendEmail($parentEmail,$parentName, $student_name, $student_class, $dates, $time_in);
                                            exit();
                                        }

                                    }

                                 }
                            } else {

                                echo "Student Already Scanned";
                                exit();
                            }

                        } // else not scanned


                    
                        
                    } else {
                        echo "Holiday!";
                        exit();
                    }

                } // else for mode take attendance


            } // else success query the sql to take the data for device mode from database

        }	// Success query the sql

} // else for POST

?>













