<?php

require 'connectDB.php';

$d = date("Y-m-d");
$t = date("H:i:s");


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

                // For registration
                // To display the UID in inputText
                if ($device_mode == 1) {
                    $Write="<?php $" . "UIDresult='" . $UIDresult . "'; " . "echo $" . "UIDresult;" . " ?>";
                    file_put_contents('UIDContainer.php',$Write);

                // For attendance
                // Store record into database
                } else if ($device_mode == 2) {

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
                            $sql = "SELECT * FROM student WHERE student_id = ?";
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
                                        exit();
                                    }

                                }

                             }
                        } else {

                            echo "Student Already Scanned";
                            exit();
                        }

                    }


                }


            }

        }	
}

?>