<?php





function checkEmailAdmin($admin_email){
	require 'connectDB.php';

	$sql = "SELECT * FROM admin WHERE admin_email = ?";

	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_STUDENT_CLASS_DATA');
		       window.location.href='class.php';
		       </script>";
    } else {
    
 		mysqli_stmt_bind_param($result, "s",$admin_email);
    	mysqli_stmt_execute($result);
    	$resultl = mysqli_stmt_get_result($result);
    	return $resultl;
    }
}



function checkEmailTeacher($teacher_email){
	require 'connectDB.php';

	$sql = "SELECT * FROM teacher WHERE teacher_email = ?";

	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_STUDENT_CLASS_DATA');
		       window.location.href='class.php';
		       </script>";
    } else {
    
 		mysqli_stmt_bind_param($result, "s",$teacher_email);
    	mysqli_stmt_execute($result);
    	$resultl = mysqli_stmt_get_result($result);
    	return $resultl;
    }
}


function checkEmailParent($parent_email){
	require 'connectDB.php';

	$sql = "SELECT * FROM parent WHERE parent_email = ?";

	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_STUDENT_CLASS_DATA');
		       window.location.href='class.php';
		       </script>";
    } else {
    
 		mysqli_stmt_bind_param($result, "s",$parent_email);
    	mysqli_stmt_execute($result);
    	$resultl = mysqli_stmt_get_result($result);
    	return $resultl;
    }
}




function displayAllStatusByWeekByClass($week, $class_id){
	require 'connectDB.php';

	$sql = "SELECT * FROM attendance INNER JOIN student ON attendance.student_id = student.student_id INNER JOIN class ON student.class_id = class.class_id WHERE WEEK(attendance.dates) = ? AND student.class_id = ? ORDER BY attendance.dates ASC";

	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_STUDENT_CLASS_DATA');
		       window.location.href='class.php';
		       </script>";
    } else {
    
 		mysqli_stmt_bind_param($result, "si", $week, $class_id);
    	mysqli_stmt_execute($result);
    	$resultl = mysqli_stmt_get_result($result);
    	return $resultl;
    }
}



function displayStatusByWeekByClass($week, $status, $class_id){
	require 'connectDB.php';

	$sql = "SELECT * FROM attendance INNER JOIN student ON attendance.student_id = student.student_id INNER JOIN class ON student.class_id = class.class_id WHERE WEEK(attendance.dates) = ? AND attendance.attend_status =? AND student.class_id = ? ORDER BY attendance.dates ASC";

	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_STUDENT_CLASS_DATA');
		       window.location.href='class.php';
		       </script>";
    } else {
    
 		mysqli_stmt_bind_param($result, "ssi", $week, $status, $class_id);
    	mysqli_stmt_execute($result);
    	$resultl = mysqli_stmt_get_result($result);
    	return $resultl;
    }
}




function countOtherByWeekByClass($week, $class_id){
	require 'connectDB.php';

	$sql = "SELECT COUNT(*) AS 'totalOther' FROM attendance JOIN student ON attendance.student_id = student.student_id WHERE WEEK(attendance.dates) = ? AND student.class_id = ? AND attendance.attend_status = ?";

	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_STUDENT_CLASS_DATA');
		       window.location.href='class.php';
		       </script>";
    } else {
    	$attend_status = "Other";
 		mysqli_stmt_bind_param($result, "sis", $week, $class_id, $attend_status);
    	mysqli_stmt_execute($result);
    	$resultl = mysqli_stmt_get_result($result);
    	return $resultl;
    }
}




function countMedicalLeaveByWeekByClass($week, $class_id){
	require 'connectDB.php';

	$sql = "SELECT COUNT(*) AS 'totalMedicalLeave' FROM attendance JOIN student ON attendance.student_id = student.student_id WHERE WEEK(attendance.dates) = ? AND student.class_id = ? AND attendance.attend_status = ?";

	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_STUDENT_CLASS_DATA');
		       window.location.href='class.php';
		       </script>";
    } else {
    	$attend_status = "Medical Leave";
 		mysqli_stmt_bind_param($result, "sis", $week, $class_id, $attend_status);
    	mysqli_stmt_execute($result);
    	$resultl = mysqli_stmt_get_result($result);
    	return $resultl;
    }
}





function countAbsentByWeekByClass($week, $class_id){
	require 'connectDB.php';

	$sql = "SELECT COUNT(*) AS 'totalAbsent' FROM attendance JOIN student ON attendance.student_id = student.student_id WHERE WEEK(attendance.dates) = ? AND student.class_id = ? AND attendance.attend_status = ?";

	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_STUDENT_CLASS_DATA');
		       window.location.href='class.php';
		       </script>";
    } else {
    	$attend_status = "Absent";
 		mysqli_stmt_bind_param($result, "sis", $week, $class_id, $attend_status);
    	mysqli_stmt_execute($result);
    	$resultl = mysqli_stmt_get_result($result);
    	return $resultl;
    }
}



function countAttendLateByWeekByClass($week, $class_id){
	require 'connectDB.php';

	$sql = "SELECT COUNT(*) AS 'totalAttendLate' FROM attendance JOIN student ON attendance.student_id = student.student_id WHERE WEEK(attendance.dates) = ? AND student.class_id = ? AND attendance.attend_status = ?";

	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_STUDENT_CLASS_DATA');
		       window.location.href='class.php';
		       </script>";
    } else {
    	$attend_status = "Attend Late";
 		mysqli_stmt_bind_param($result, "sis", $week, $class_id, $attend_status);
    	mysqli_stmt_execute($result);
    	$resultl = mysqli_stmt_get_result($result);
    	return $resultl;
    }
}





function countAttendByWeekByClass($week, $class_id){
	require 'connectDB.php';

	$sql = "SELECT COUNT(*) AS 'totalAttend' FROM attendance JOIN student ON attendance.student_id = student.student_id WHERE WEEK(attendance.dates) = ? AND student.class_id = ? AND attendance.attend_status = ?";

	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_STUDENT_CLASS_DATA');
		       window.location.href='class.php';
		       </script>";
    } else {
    	$attend_status = "Attend";
 		mysqli_stmt_bind_param($result, "sis", $week, $class_id, $attend_status);
    	mysqli_stmt_execute($result);
    	$resultl = mysqli_stmt_get_result($result);
    	return $resultl;
    }
}






function countTotalAttendanceByWeekByClass($week, $class_id){
	require 'connectDB.php';

	$sql = "SELECT COUNT(*) AS 'totalAttendance' FROM attendance JOIN student ON attendance.student_id = student.student_id WHERE WEEK(attendance.dates) = ? AND student.class_id = ?";

	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_STUDENT_CLASS_DATA');
		       window.location.href='class.php';
		       </script>";
    } else {
    
 		mysqli_stmt_bind_param($result, "si", $week, $class_id);
    	mysqli_stmt_execute($result);
    	$resultl = mysqli_stmt_get_result($result);
    	return $resultl;
    }
}




function displayAllStatusByWeek($week){
	require 'connectDB.php';

	$sql = "SELECT * FROM attendance INNER JOIN student ON attendance.student_id = student.student_id INNER JOIN class ON student.class_id = class.class_id WHERE WEEK(attendance.dates) = ? ORDER BY attendance.dates ASC";

	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_STUDENT_CLASS_DATA');
		       window.location.href='class.php';
		       </script>";
    } else {
    
 		mysqli_stmt_bind_param($result, "s", $week);
    	mysqli_stmt_execute($result);
    	$resultl = mysqli_stmt_get_result($result);
    	return $resultl;
    }
}

function displayStatusByWeek($week, $status) {
	require 'connectDB.php';

	$sql = "SELECT * FROM attendance INNER JOIN student ON attendance.student_id = student.student_id INNER JOIN class ON student.class_id = class.class_id WHERE WEEK(attendance.dates) = ? AND attendance.attend_status =? ORDER BY attendance.dates ASC";

	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_STUDENT_CLASS_DATA');
		       window.location.href='class.php';
		       </script>";
    } else {
    
 		mysqli_stmt_bind_param($result, "ss", $week, $status);
    	mysqli_stmt_execute($result);
    	$resultl = mysqli_stmt_get_result($result);
    	return $resultl;
    }
}






function countOtherByWeek($week){
	require 'connectDB.php';

	$sql = "SELECT COUNT(*) AS totalOther FROM attendance WHERE WEEK(dates) = ? AND attend_status = ?";

	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_LOGIN_DATA');
		        window.location.href='index.php';
		        </script>";
    } else { 
    	$attend_status = "Other";
		mysqli_stmt_bind_param($result, "ss", $week, $attend_status);
        mysqli_stmt_execute($result);
        $resultl = mysqli_stmt_get_result($result);
        return $resultl;
    }
}


function countAbsentByWeek($week){
	require 'connectDB.php';

	$sql = "SELECT COUNT(*) AS totalAbsent FROM attendance WHERE WEEK(dates) = ? AND attend_status = ?";

	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_LOGIN_DATA');
		        window.location.href='index.php';
		        </script>";
    } else { 
    	$attend_status = "Absent";
		mysqli_stmt_bind_param($result, "ss", $week, $attend_status);
        mysqli_stmt_execute($result);
        $resultl = mysqli_stmt_get_result($result);
        return $resultl;
    }
}



function countMedicalLeaveByWeek($week){
	require 'connectDB.php';

	$sql = "SELECT COUNT(*) AS totalMedicalLeave FROM attendance WHERE WEEK(dates) = ? AND attend_status = ?";

	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_LOGIN_DATA');
		        window.location.href='index.php';
		        </script>";
    } else { 
    	$attend_status = "Medical Leave";
		mysqli_stmt_bind_param($result, "ss", $week, $attend_status);
        mysqli_stmt_execute($result);
        $resultl = mysqli_stmt_get_result($result);
        return $resultl;
    }
}


function countAttendLateByWeek($week){
	require 'connectDB.php';

	$sql = "SELECT COUNT(*) AS totalAttendLate FROM attendance WHERE WEEK(dates) = ? AND attend_status = ?";

	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_LOGIN_DATA');
		        window.location.href='index.php';
		        </script>";
    } else { 
    	$attend_status = "Attend Late";
		mysqli_stmt_bind_param($result, "ss", $week, $attend_status);
        mysqli_stmt_execute($result);
        $resultl = mysqli_stmt_get_result($result);
        return $resultl;
    }
}




function countAttendByWeek($week){
	require 'connectDB.php';

	$sql = "SELECT COUNT(*) AS totalAttend FROM attendance WHERE WEEK(dates) = ? AND attend_status = ?";

	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_LOGIN_DATA');
		        window.location.href='index.php';
		        </script>";
    } else { 
    	$attend_status = "Attend";
		mysqli_stmt_bind_param($result, "ss", $week, $attend_status);
        mysqli_stmt_execute($result);
        $resultl = mysqli_stmt_get_result($result);
        return $resultl;
    }
}


function countTotalAttendanceByWeek($week){
	require 'connectDB.php';

	$sql = "SELECT COUNT(*) AS totalAttendance FROM attendance WHERE WEEK(dates) = ?";

	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_LOGIN_DATA');
		        window.location.href='index.php';
		        </script>";
    } else { 
		mysqli_stmt_bind_param($result, "s", $week);
        mysqli_stmt_execute($result);
        $resultl = mysqli_stmt_get_result($result);
        return $resultl;
    }
}








function verifyParent2($parent_email, $parent_password) {
	require 'connectDB.php';
	// Check database if the date or description already been added
	$sql = "SELECT * FROM parent WHERE BINARY parent_email = ? AND BINARY parent_password = ?";
	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_LOGIN_DATA');
		        window.location.href='index.php';
		        </script>";
    } else { 
		mysqli_stmt_bind_param($result, "ss", $parent_email, $parent_password);
        mysqli_stmt_execute($result);
        $resultl = mysqli_stmt_get_result($result);

        // If the details not redundent
        if ($row = mysqli_fetch_assoc($resultl)){
        	return 2221;
        }
        else {
        	return 1;
        }

	}
	
}

function validateFirstTimeLoginParent($email, $parent_password){

	require 'connectDB.php';

	$sql = "SELECT * FROM parent WHERE parent_email = ? AND parent_password = ?";
	$result = mysqli_stmt_init($conn);

	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_VALIDATE_DATA');
		        window.location.href='index.php';
		        </script>";
    } else { 
		mysqli_stmt_bind_param($result, "ss", $email, $parent_password);
        mysqli_stmt_execute($result);
        $resultl = mysqli_stmt_get_result($result);
        return $resultl;
    }

}

function displayParentByEmail($parent_email){
	require 'connectDB.php';

	$sql = "SELECT * FROM parent WHERE parent_email=?";

	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_STUDENT_DATA');
		        window.location.href='index.php';
		        </script>";
    } else { 
    	mysqli_stmt_bind_param($result, "s", $parent_email);
        mysqli_stmt_execute($result);
        $resultl = mysqli_stmt_get_result($result);
        return $resultl;
	}


}

function updatePasswordParent($parent_id, $parent_password){
	require 'connectDB.php';

	$sql = "UPDATE parent SET parent_password = ?, parent_login = 1 WHERE parent_id = ?";

	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_UPDATE_PASSWORD_DATA');
		        window.location.href='index.php';
		        </script>";
    } else { 
    	mysqli_stmt_bind_param($result, "si", $parent_password, $parent_id);
        mysqli_stmt_execute($result);
        echo "<script>alert('Successfully Update Password. Please Login');
		        window.location.href='index.php';
		        </script>";
         
	}



}

function countTotalAttendanceStudentByMonthByClass($month1, $student_id){
	require 'connectDB.php';

	$sql = "SELECT COUNT(*) AS 'totalAttendance' FROM attendance JOIN student ON attendance.student_id = student.student_id WHERE MONTH(attendance.dates) = ? AND student.student_id = ?";

	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_STUDENT_DATA');
		       window.location.href='ajaxindex.php';
		       </script>";
    } else {
    
 		mysqli_stmt_bind_param($result, "ss", $month1, $student_id);
    	mysqli_stmt_execute($result);
    	$resultl = mysqli_stmt_get_result($result);
    	return $resultl;
    }

}


function displayStudentDateAttendance($dates, $student_id){
	require 'connectDB.php';

	$sql = "SELECT attendance.attendance_id AS attendance_id, attendance.attend_status AS attend_status, student.student_id AS student_id, student.student_name AS student_name, student.student_ic AS student_ic FROM attendance INNER JOIN student ON attendance.student_id = student.student_id WHERE student.student_id = ? AND attendance.dates = ?";

	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_DISPLAY_Attendance_DATA');
		        window.location.href='ajaxindex.php';
		        </script>";
    } else {
		mysqli_stmt_bind_param($result, 'ss' , $student_id, $dates);
    	mysqli_stmt_execute($result);
    	$resultl = mysqli_stmt_get_result($result);
    	return $resultl;
    }

}

function parentDisplayByID($parent_id) {
	require 'connectDB.php';

	$sql = "SELECT * FROM parent WHERE parent_id = '".$_SESSION['parent_id']."' ";

	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_DISPLAY_PARENT_DATA');
		        window.location.href='Parent.php';
		        </script>";
    } else {
		
    	mysqli_stmt_execute($result);
    	$resultl = mysqli_stmt_get_result($result);
    	return $resultl;
    }

}


function displaySpecificStudent($parent_id){
	require 'connectDB.php';
	//$sql = "SELECT * FROM student INNER JOIN class ON student.class_id = class.class_id WHERE parent_id =?";


	$sql = "SELECT * FROM student INNER JOIN class ON student.class_id = class.class_id INNER JOIN teacher ON teacher.class_id = class.class_id WHERE parent_id = ?";
	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_STUDENT_DATA');
		        window.location.href='Parent.php';
		        </script>";
    } else { 
    	mysqli_stmt_bind_param($result, "i", $parent_id);
        mysqli_stmt_execute($result);
        $resultl = mysqli_stmt_get_result($result);
        return $resultl;
	}
}


function countAttendStudentByMonthByClass($month, $student_id){
	require 'connectDB.php';

	$sql = "SELECT COUNT(*) AS 'totalAttend' FROM attendance JOIN student ON attendance.student_id = student.student_id WHERE MONTH(attendance.dates) = ? AND attendance.attend_status = ? AND student.student_id = ?";

	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_STUDENT_DATA');
		       window.location.href='ajaxindex.php';
		       </script>";
    } else {
    	$attend_status = "Attend";
 		mysqli_stmt_bind_param($result, "sss", $month, $attend_status, $student_id);
    	mysqli_stmt_execute($result);
    	$resultl = mysqli_stmt_get_result($result);
    	return $resultl;
    }

}


function countAttendLateStudentByMonthByClass($month, $student_id){
	require 'connectDB.php';

	$sql = "SELECT COUNT(*) AS 'totalAttendLate' FROM attendance JOIN student ON attendance.student_id = student.student_id WHERE MONTH(attendance.dates) = ? AND attendance.attend_status = ? AND student.student_id = ?";

	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_STUDENT_DATA');
		       window.location.href='ajaxindex.php';
		       </script>";
    } else {
    	$attend_status = "Attend Late";
 		mysqli_stmt_bind_param($result, "sss", $month, $attend_status, $student_id);
    	mysqli_stmt_execute($result);
    	$resultl = mysqli_stmt_get_result($result);
    	return $resultl;
    }

}

function countAbsentStudentByMonthByClass($month, $student_id){
	require 'connectDB.php';

	$sql = "SELECT COUNT(*) AS 'totalAbsent' FROM attendance JOIN student ON attendance.student_id = student.student_id WHERE MONTH(attendance.dates) = ? AND attendance.attend_status = ? AND attendance.student_id = ? ";

	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_STUDENT_DATA');
		       window.location.href='ajaxindex.php';
		       </script>";
    } else {
    	$attend_status = "Absent";
 		mysqli_stmt_bind_param($result, "sss", $month, $attend_status, $student_id);
    	mysqli_stmt_execute($result);
    	$resultl = mysqli_stmt_get_result($result);
    	return $resultl;
    }

}


function countMedicalLeaveStudentByMonthByClass($month, $student_id){
	require 'connectDB.php';

	$sql = "SELECT COUNT(*) AS 'totalMedicalLeave' FROM attendance JOIN student ON attendance.student_id = student.student_id WHERE MONTH(attendance.dates) = ? AND attendance.attend_status = ? AND student.student_id = ?";

	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_STUDENT_DATA');
		       window.location.href='ajaxindex.php';
		       </script>";
    } else {
    	$attend_status = "Medical Leave";
 		mysqli_stmt_bind_param($result, "sss", $month, $attend_status, $student_id);
    	mysqli_stmt_execute($result);
    	$resultl = mysqli_stmt_get_result($result);
    	return $resultl;
    }

}

function countOtherStudentByMonthByClass($month, $student_id){
	require 'connectDB.php';

	$sql = "SELECT COUNT(*) AS 'totalOther' FROM attendance JOIN student ON attendance.student_id = student.student_id WHERE MONTH(attendance.dates) = ? AND attendance.attend_status = ? AND student.student_id = ?";

	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_STUDENT_DATA');
		       window.location.href='ajaxindex.php';
		       </script>";
    } else {
    	$attend_status = "Other";
 		mysqli_stmt_bind_param($result, "sss", $month, $attend_status, $student_id);
    	mysqli_stmt_execute($result);
    	$resultl = mysqli_stmt_get_result($result);
    	return $resultl;
    }

}


function displayParentByClass($class_id){
	require 'connectDB.php';

	$sql = "SELECT * FROM parent INNER JOIN student ON student.parent_id = parent.parent_id WHERE student.class_id = ?";

	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_STUDENT_CLASS_DATA');
		       window.location.href='class.php';
		       </script>";
    } else {
    
 		mysqli_stmt_bind_param($result, "i", $class_id);
    	mysqli_stmt_execute($result);
    	$resultl = mysqli_stmt_get_result($result);
    	return $resultl;
    }

}





function countOtherStudentByClassAttend($class_id, $dates){
	require 'connectDB.php';

	$sql = "SELECT COUNT(*) AS 'totalOther' FROM attendance JOIN student ON attendance.student_id = student.student_id WHERE student.class_id = ? AND attendance.dates = ? AND attendance.attend_status = ?";

	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_STUDENT_CLASS_DATA');
		       window.location.href='class.php';
		       </script>";
    } else {
    	$attend_status = "Other";
 		mysqli_stmt_bind_param($result, "iss", $class_id, $dates, $attend_status);
    	mysqli_stmt_execute($result);
    	$resultl = mysqli_stmt_get_result($result);
    	return $resultl;
    }

}

function displayAllStudentAttendanceByClassAttend($dates){
	require 'connectDB.php';

	$sql = "SELECT student.student_id AS id, student.student_name AS name, class.class_name AS class, attendance.attend_status AS status FROM attendance RIGHT JOIN student ON attendance.student_id = student.student_id JOIN class ON student.class_id = class.class_id WHERE  attendance.dates = ? AND attendance.attend_status != ?";
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_ADD_STUDENT_DATA');
		        window.location.href='teacherstudlist.php';
		        </script>";
    } 
    else { 
    	$attend_status = "Absent";
    	mysqli_stmt_bind_param($result, "ss", $dates, $attend_status);
        mysqli_stmt_execute($result);
        $resultl = mysqli_stmt_get_result($result);
    	return $resultl;
}
}



function displayAllStudentAttendanceByClassAbsent($dates){
	require 'connectDB.php';

	$sql = "SELECT student.student_id AS id, student.student_name AS name, class.class_name AS class, attendance.attend_status AS status FROM attendance RIGHT JOIN student ON attendance.student_id = student.student_id JOIN class ON student.class_id = class.class_id WHERE attendance.dates = ? AND attendance.attend_status = ?";
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_ADD_STUDENT_DATA');
		        window.location.href='teacherstudlist.php';
		        </script>";
    } 
    else { 
    	$attend_status = "Absent";
    	mysqli_stmt_bind_param($result, "ss",$dates, $attend_status);
        mysqli_stmt_execute($result);
        $resultl = mysqli_stmt_get_result($result);
    	return $resultl;
}
}



function countAllOtherStudentByClassAttend($dates){
	require 'connectDB.php';

	$sql = "SELECT COUNT(*) AS 'totalOther' FROM attendance JOIN student ON attendance.student_id = student.student_id WHERE attendance.dates = ? AND attendance.attend_status = ?";

	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_STUDENT_CLASS_DATA');
		       window.location.href='class.php';
		       </script>";
    } else {
    	$attend_status = "Other";
 		mysqli_stmt_bind_param($result, "ss", $dates, $attend_status);
    	mysqli_stmt_execute($result);
    	$resultl = mysqli_stmt_get_result($result);
    	return $resultl;
    }

}


function countAllStudentAbsent( $dates){
	require 'connectDB.php';

	$sql = "SELECT COUNT(*) AS 'totalAbsent' FROM attendance JOIN student ON attendance.student_id = student.student_id WHERE attendance.dates = ? AND attendance.attend_status = ?";

	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_STUDENT_CLASS_DATA');
		       window.location.href='class.php';
		       </script>";
    } else {
    	$attend_status = "Absent";
 		mysqli_stmt_bind_param($result, "ss", $dates, $attend_status);
    	mysqli_stmt_execute($result);
    	$resultl = mysqli_stmt_get_result($result);
    	return $resultl;
    }


}



function countAllStudentByClass(){
	require 'connectDB.php';

	$sql = "SELECT COUNT(*) AS numberOfStudent FROM student";

	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_STUDENT_CLASS_DATA');
		       window.location.href='class.php';
		       </script>";
    } else {
    	// mysqli_stmt_bind_param($result, "i", $class_id);
    	mysqli_stmt_execute($result);
    	$resultl = mysqli_stmt_get_result($result);
    	return $resultl;
    }
}

function countAllAttendLateStudentByClassAttend($dates){
	require 'connectDB.php';

	$sql = "SELECT COUNT(*) AS 'totalAttendLate' FROM attendance JOIN student ON attendance.student_id = student.student_id WHERE attendance.dates = ? AND attendance.attend_status = ?";

	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_STUDENT_CLASS_DATA');
		       window.location.href='class.php';
		       </script>";
    } else {
    	$attend_status = "Attend Late";
 		mysqli_stmt_bind_param($result, "ss",$dates, $attend_status);
    	mysqli_stmt_execute($result);
    	$resultl = mysqli_stmt_get_result($result);
    	return $resultl;
    }
}


function countAllMedicalLeaveStudentByClassAttend($dates){
	require 'connectDB.php';

	$sql = "SELECT COUNT(*) AS 'totalMedicalLeave' FROM attendance JOIN student ON attendance.student_id = student.student_id WHERE attendance.dates = ? AND attendance.attend_status = ?";

	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_STUDENT_CLASS_DATA');
		       window.location.href='class.php';
		       </script>";
    } else {
    	$attend_status = "Medical Leave";
 		mysqli_stmt_bind_param($result, "ss", $dates, $attend_status);
    	mysqli_stmt_execute($result);
    	$resultl = mysqli_stmt_get_result($result);
    	return $resultl;
    }
}

function countAllAttendStudentByClassAttend($dates){
	require 'connectDB.php';

	$sql = "SELECT COUNT(*) AS 'totalAttend' FROM attendance JOIN student ON attendance.student_id = student.student_id WHERE attendance.dates = ? AND attendance.attend_status = ?";

	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_STUDENT_CLASS_DATA');
		       window.location.href='class.php';
		       </script>";
    } else {
    	$attend_status = "Attend";
 		mysqli_stmt_bind_param($result, "ss", $dates, $attend_status);
    	mysqli_stmt_execute($result);
    	$resultl = mysqli_stmt_get_result($result);
    	return $resultl;
    }
}



function updateParent($parent_id, $parent_name, $parent_email, $parent_contact){
	require 'connectDB.php';

	$sql = "SELECT * FROM parent WHERE parent_name = ? AND parent_email = ? AND parent_contact = ?";

	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_STUDENT_CLASS_DATA');
		       window.location.href='parentList.php';
		       </script>";
    } else {
    
 		mysqli_stmt_bind_param($result, "sss", $parent_name, $parent_email, $parent_contact);
    	mysqli_stmt_execute($result);
    	$resultl = mysqli_stmt_get_result($result);
    	if (!$row = mysqli_fetch_assoc($resultl)) {

    		$sql = "UPDATE parent SET parent_name = ? , parent_email = ?, parent_contact = ? WHERE parent_id = ?";

	        // Connection to database
			$result = mysqli_stmt_init($conn);
			if (!mysqli_stmt_prepare($result, $sql)) {
		        echo "<script>alert('SQL_Error_INSERT_PARENT_DATA');
				       window.location.href='editParent.php';
				       </script>";
		    } else {
		    
		 		mysqli_stmt_bind_param($result, "sssi", $parent_name, $parent_email, $parent_contact, $parent_id);
		    	mysqli_stmt_execute($result);
		    	$resultl = mysqli_stmt_get_result($result);
		    	
		    		echo "<script>alert('Successfully Updated');
			        window.location.href='parentList.php';
			        </script>";
		    	
		    	
		    }
    	} else {
    		echo "<script>alert('Data exist in database');
			        window.location.href='parentList.php';
			        </script>";
    	}
    }
       		

}

function updateParent1($parent_id, $parent_name, $parent_email, $parent_contact,$parent_address){
	require 'connectDB.php';

	$sql = "SELECT * FROM parent WHERE parent_name = ? AND parent_email = ? AND parent_contact = ? AND parent_address = ?";

	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_STUDENT_CLASS_DATA');
		       window.location.href='lprofile.php';
		       </script>";
    } else {
    
 		mysqli_stmt_bind_param($result, "ssss", $parent_name, $parent_email, $parent_contact, $parent_address);
    	mysqli_stmt_execute($result);
    	$resultl = mysqli_stmt_get_result($result);
    	if (!$row = mysqli_fetch_assoc($resultl)) {

    		$sql = "UPDATE parent SET parent_name = ? , parent_email = ?, parent_contact = ?, parent_address = ? WHERE parent_id = ?";

	        // Connection to database
			$result = mysqli_stmt_init($conn);
			if (!mysqli_stmt_prepare($result, $sql)) {
		        echo "<script>alert('SQL_Error_INSERT_PARENT_DATA');
				       window.location.href='lprofile.php';
				       </script>";
		    } else {
		    
		 		mysqli_stmt_bind_param($result, "ssssi", $parent_name, $parent_email, $parent_contact, $parent_address, $parent_id);
		    	mysqli_stmt_execute($result);
		    	$resultl = mysqli_stmt_get_result($result);
		    	
		    		echo "<script>alert('Successfully Updated');
			        window.location.href='lprofile.php';
			        </script>";
		    	
		    	
		    }
    	} else {
    		echo "<script>alert('Data exist in database');
			        window.location.href='lprofile.php';
			        </script>";
    	}
    }




	
        		

}


function updateParent3($parent_id, $parent_name, $parent_email, $parent_contact){
	require 'connectDB.php';

	$sql = "SELECT * FROM parent WHERE parent_name = ? AND parent_email = ? AND parent_contact = ?";

	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_STUDENT_CLASS_DATA');
		       window.location.href='parentListTeacher.php';
		       </script>";
    } else {
    
 		mysqli_stmt_bind_param($result, "sss", $parent_name, $parent_email, $parent_contact);
    	mysqli_stmt_execute($result);
    	$resultl = mysqli_stmt_get_result($result);
    	if (!$row = mysqli_fetch_assoc($resultl)) {

    		$sql = "UPDATE parent SET parent_name = ? , parent_email = ?, parent_contact = ? WHERE parent_id = ?";

	        // Connection to database
			$result = mysqli_stmt_init($conn);
			if (!mysqli_stmt_prepare($result, $sql)) {
		        echo "<script>alert('SQL_Error_INSERT_PARENT_DATA');
				       window.location.href='parentListTeacher.php';
				       </script>";
		    } else {
		    
		 		mysqli_stmt_bind_param($result, "sssi", $parent_name, $parent_email, $parent_contact, $parent_id);
		    	mysqli_stmt_execute($result);
		    	$resultl = mysqli_stmt_get_result($result);
		    	
		    		echo "<script>alert('Successfully Updated');
			        window.location.href='parentListTeacher.php';
			        </script>";
		    	
		    	
		    }
    	} else {
    		echo "<script>alert('Data exist in database');
			        window.location.href='parentListTeacher.php';
			        </script>";
    	}
    }




	
        		

}




function displayStudentsByParent($parent_id){
	require 'connectDB.php';

	$sql = "SELECT * FROM student INNER JOIN class ON student.class_id = class.class_id WHERE parent_id = ? ORDER BY class.class_name";

	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_STUDENT_CLASS_DATA');
		       window.location.href='class.php';
		       </script>";
    } else {
    
 		mysqli_stmt_bind_param($result, "i", $parent_id);
    	mysqli_stmt_execute($result);
    	$resultl = mysqli_stmt_get_result($result);
    	return $resultl;
    }
}


function displayParentByID($parent_id){
	require 'connectDB.php';

	$sql = "SELECT * FROM parent WHERE parent_id = ?";

	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_STUDENT_CLASS_DATA');
		       window.location.href='class.php';
		       </script>";
    } else {
    
 		mysqli_stmt_bind_param($result, "i", $parent_id);
    	mysqli_stmt_execute($result);
    	$resultl = mysqli_stmt_get_result($result);
    	return $resultl;
    }
}

function displayAllStatusByMonthByClass($month, $class_id){
	require 'connectDB.php';

	$sql = "SELECT * FROM attendance INNER JOIN student ON attendance.student_id = student.student_id INNER JOIN class ON student.class_id = class.class_id WHERE MONTH(attendance.dates) = ? AND student.class_id = ? ORDER BY attendance.dates ASC";

	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_STUDENT_CLASS_DATA');
		       window.location.href='class.php';
		       </script>";
    } else {
    
 		mysqli_stmt_bind_param($result, "si", $month, $class_id);
    	mysqli_stmt_execute($result);
    	$resultl = mysqli_stmt_get_result($result);
    	return $resultl;

    }
}


function displayStatusByMonthByClass($month, $status, $class_id){
	require 'connectDB.php';

	$sql = "SELECT * FROM attendance INNER JOIN student ON attendance.student_id = student.student_id INNER JOIN class ON student.class_id = class.class_id WHERE MONTH(attendance.dates) = ? AND attendance.attend_status =? AND student.class_id = ? ORDER BY attendance.dates ASC";

	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_STUDENT_CLASS_DATA');
		       window.location.href='class.php';
		       </script>";
    } else {
    
 		mysqli_stmt_bind_param($result, "ssi", $month, $status, $class_id);
    	mysqli_stmt_execute($result);
    	$resultl = mysqli_stmt_get_result($result);
    	return $resultl;
    }
}


function countTotalAttendanceByMonthByClass($month1, $class_id){
	require 'connectDB.php';

	$sql = "SELECT COUNT(*) AS 'totalAttendance' FROM attendance JOIN student ON attendance.student_id = student.student_id WHERE MONTH(attendance.dates) = ? AND student.class_id = ?";

	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_STUDENT_CLASS_DATA');
		       window.location.href='class.php';
		       </script>";
    } else {
    
 		mysqli_stmt_bind_param($result, "si", $month1, $class_id);
    	mysqli_stmt_execute($result);
    	$resultl = mysqli_stmt_get_result($result);
    	return $resultl;
    }

}

function countAttendByMonthByClass($month, $class_id){
	require 'connectDB.php';

	$sql = "SELECT COUNT(*) AS 'totalAttend' FROM attendance JOIN student ON attendance.student_id = student.student_id WHERE MONTH(attendance.dates) = ? AND attendance.attend_status = ? AND student.class_id = ?";

	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_STUDENT_CLASS_DATA');
		       window.location.href='class.php';
		       </script>";
    } else {
    	$attend_status = "Attend";
 		mysqli_stmt_bind_param($result, "ssi", $month, $attend_status, $class_id);
    	mysqli_stmt_execute($result);
    	$resultl = mysqli_stmt_get_result($result);
    	return $resultl;
    }

}



function countAttendLateByMonthByClass($month, $class_id){
	require 'connectDB.php';

	$sql = "SELECT COUNT(*) AS 'totalAttendLate' FROM attendance JOIN student ON attendance.student_id = student.student_id WHERE MONTH(attendance.dates) = ? AND attendance.attend_status = ? AND student.class_id = ?";

	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_STUDENT_CLASS_DATA');
		       window.location.href='class.php';
		       </script>";
    } else {
    	$attend_status = "Attend Late";
 		mysqli_stmt_bind_param($result, "ssi", $month, $attend_status, $class_id);
    	mysqli_stmt_execute($result);
    	$resultl = mysqli_stmt_get_result($result);
    	return $resultl;
    }

}


function countAbsentByMonthByClass($month, $class_id){
	require 'connectDB.php';

	$sql = "SELECT COUNT(*) AS 'totalAbsent' FROM attendance JOIN student ON attendance.student_id = student.student_id WHERE MONTH(attendance.dates) = ? AND attendance.attend_status = ? AND student.class_id = ? ";

	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_STUDENT_CLASS_DATA');
		       window.location.href='class.php';
		       </script>";
    } else {
    	$attend_status = "Absent";
 		mysqli_stmt_bind_param($result, "ssi", $month, $attend_status, $class_id);
    	mysqli_stmt_execute($result);
    	$resultl = mysqli_stmt_get_result($result);
    	return $resultl;
    }

}


function countMedicalLeaveByMonthByClass($month, $class_id){
	require 'connectDB.php';

	$sql = "SELECT COUNT(*) AS 'totalMedicalLeave' FROM attendance JOIN student ON attendance.student_id = student.student_id WHERE MONTH(attendance.dates) = ? AND attendance.attend_status = ? AND student.class_id = ?";

	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_STUDENT_CLASS_DATA');
		       window.location.href='class.php';
		       </script>";
    } else {
    	$attend_status = "Medical Leave";
 		mysqli_stmt_bind_param($result, "ssi", $month, $attend_status, $class_id);
    	mysqli_stmt_execute($result);
    	$resultl = mysqli_stmt_get_result($result);
    	return $resultl;
    }

}


function countOtherByMonthByClass($month, $class_id){
	require 'connectDB.php';

	$sql = "SELECT COUNT(*) AS 'totalOther' FROM attendance JOIN student ON attendance.student_id = student.student_id WHERE MONTH(attendance.dates) = ? AND attendance.attend_status = ? AND student.class_id = ?";

	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_STUDENT_CLASS_DATA');
		       window.location.href='class.php';
		       </script>";
    } else {
    	$attend_status = "Other";
 		mysqli_stmt_bind_param($result, "ssi", $month, $attend_status, $class_id);
    	mysqli_stmt_execute($result);
    	$resultl = mysqli_stmt_get_result($result);
    	return $resultl;
    }

}

// 
// 
// 
// 
// 
// 
// 
// 
function displayAllStatusByMonth($month){
	require 'connectDB.php';

	$sql = "SELECT * FROM attendance INNER JOIN student ON attendance.student_id = student.student_id INNER JOIN class ON student.class_id = class.class_id WHERE MONTH(attendance.dates) = ? ORDER BY attendance.dates ASC";

	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_STUDENT_CLASS_DATA');
		       window.location.href='class.php';
		       </script>";
    } else {
    
 		mysqli_stmt_bind_param($result, "s", $month);
    	mysqli_stmt_execute($result);
    	$resultl = mysqli_stmt_get_result($result);
    	return $resultl;

    }
}


function displayStatusByMonth($month, $status){
	require 'connectDB.php';

	$sql = "SELECT * FROM attendance INNER JOIN student ON attendance.student_id = student.student_id INNER JOIN class ON student.class_id = class.class_id WHERE MONTH(attendance.dates) = ? AND attendance.attend_status =? ORDER BY attendance.dates ASC";

	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_STUDENT_CLASS_DATA');
		       window.location.href='class.php';
		       </script>";
    } else {
    
 		mysqli_stmt_bind_param($result, "ss", $month, $status);
    	mysqli_stmt_execute($result);
    	$resultl = mysqli_stmt_get_result($result);
    	return $resultl;
    }
}



function countTotalAttendanceByMonth($month1){
	require 'connectDB.php';

	$sql = "SELECT COUNT(*) AS 'totalAttendance' FROM attendance JOIN student ON attendance.student_id = student.student_id WHERE MONTH(attendance.dates) = ?";

	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_STUDENT_CLASS_DATA');
		       window.location.href='class.php';
		       </script>";
    } else {
    
 		mysqli_stmt_bind_param($result, "s", $month1);
    	mysqli_stmt_execute($result);
    	$resultl = mysqli_stmt_get_result($result);
    	return $resultl;
    }

}

function countAttendByMonth($month){
	require 'connectDB.php';

	$sql = "SELECT COUNT(*) AS 'totalAttend' FROM attendance JOIN student ON attendance.student_id = student.student_id WHERE MONTH(attendance.dates) = ? AND attendance.attend_status = ?";

	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_STUDENT_CLASS_DATA');
		       window.location.href='class.php';
		       </script>";
    } else {
    	$attend_status = "Attend";
 		mysqli_stmt_bind_param($result, "ss", $month, $attend_status);
    	mysqli_stmt_execute($result);
    	$resultl = mysqli_stmt_get_result($result);
    	return $resultl;
    }

}



function countAttendLateByMonth($month){
	require 'connectDB.php';

	$sql = "SELECT COUNT(*) AS 'totalAttendLate' FROM attendance JOIN student ON attendance.student_id = student.student_id WHERE MONTH(attendance.dates) = ? AND attendance.attend_status = ?";

	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_STUDENT_CLASS_DATA');
		       window.location.href='class.php';
		       </script>";
    } else {
    	$attend_status = "Attend Late";
 		mysqli_stmt_bind_param($result, "ss", $month, $attend_status);
    	mysqli_stmt_execute($result);
    	$resultl = mysqli_stmt_get_result($result);
    	return $resultl;
    }

}


function countAbsentByMonth($month){
	require 'connectDB.php';

	$sql = "SELECT COUNT(*) AS 'totalAbsent' FROM attendance JOIN student ON attendance.student_id = student.student_id WHERE MONTH(attendance.dates) = ? AND attendance.attend_status = ?";

	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_STUDENT_CLASS_DATA');
		       window.location.href='class.php';
		       </script>";
    } else {
    	$attend_status = "Absent";
 		mysqli_stmt_bind_param($result, "ss", $month, $attend_status);
    	mysqli_stmt_execute($result);
    	$resultl = mysqli_stmt_get_result($result);
    	return $resultl;
    }

}


function countMedicalLeaveByMonth($month){
	require 'connectDB.php';

	$sql = "SELECT COUNT(*) AS 'totalMedicalLeave' FROM attendance JOIN student ON attendance.student_id = student.student_id WHERE MONTH(attendance.dates) = ? AND attendance.attend_status = ?";

	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_STUDENT_CLASS_DATA');
		       window.location.href='class.php';
		       </script>";
    } else {
    	$attend_status = "Medical Leave";
 		mysqli_stmt_bind_param($result, "ss", $month, $attend_status);
    	mysqli_stmt_execute($result);
    	$resultl = mysqli_stmt_get_result($result);
    	return $resultl;
    }

}


function countOtherByMonth($month){
	require 'connectDB.php';

	$sql = "SELECT COUNT(*) AS 'totalOther' FROM attendance JOIN student ON attendance.student_id = student.student_id WHERE MONTH(attendance.dates) = ? AND attendance.attend_status = ?";

	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_STUDENT_CLASS_DATA');
		       window.location.href='class.php';
		       </script>";
    } else {
    	$attend_status = "Other";
 		mysqli_stmt_bind_param($result, "ss", $month, $attend_status);
    	mysqli_stmt_execute($result);
    	$resultl = mysqli_stmt_get_result($result);
    	return $resultl;
    }

}

function displayParent(){
	require 'connectDB.php';

	$sql = "SELECT * FROM parent";

	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_DISPLAY_ADMIN_DATA');
		        window.location.href='class.php';
		        </script>";
    } else {
		// mysqli_stmt_bind_param($result, 'i' , $class_id);
    	mysqli_stmt_execute($result);
    	$resultl = mysqli_stmt_get_result($result);
    	return $resultl;
    }
}




function addStudentNew($student_id, $student_name, $student_ic, $student_address, $parent_id, $class_id, $page){
	require 'connectDB.php';

	$sql = "SELECT * FROM student WHERE student_id = ? OR student_ic = ? OR student_name";
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
		echo "<script>alert('SQL_Error_DISPLAY_ADMIN_DATA');
		        window.location.href='class.php';
		        </script>";


	}else {
	    mysqli_stmt_bind_param($result, 'ss' , $student_id, $student_ic);
    	mysqli_stmt_execute($result);
    	$resultl = mysqli_stmt_get_result($result);
   
		if (!$row = mysqli_fetch_assoc($resultl)) {
			$sql = "INSERT INTO student (student_id, student_name, student_ic, student_address, student_status, parent_id, class_id) VALUES (?,?,?,?,?,?,?)";

			$result = mysqli_stmt_init($conn);
			if (!mysqli_stmt_prepare($result, $sql)) {
		        echo "<script>alert('SQL_Error_REGISTER_STUDENT_DATA');
				        window.location.href='registerStudent2.php';
				        </script>";
		    } else { 
		    	$student_status = "Active";
		    	if (empty($class_id)) {
		    		$class_id = NULL;
		    	}
				mysqli_stmt_bind_param($result, "sssssii", $student_id, $student_name, $student_ic, $student_address, $student_status, $parent_id, $class_id);
		        mysqli_stmt_execute($result);
		        if ($result) {
		        	if ($page === 9) {
		        		echo "<script>alert('Successfully Register Student');
				        window.location.href='allStudentList.php';
				        </script>";
		        	}
		        	else {
		        		echo "<script>alert('Successfully Register Student');
				        window.location.href='studentlist.php';
				        </script>";
		        	}
		        }
		        
		    }
		} else {
			if ($page === 9) {
		        		echo "<script>alert('Data Exist in Database');
				        window.location.href='allStudentList.php';
				        </script>";
		        	}
		        	else {
		        		echo "<script>alert('Data Exist in Database');
				        window.location.href='studentlist.php';
				        </script>";
		        	}
		}
	}
}



function addParent($parent_name, $parent_email, $parent_contact, $parent_password, $code, $parent_address){
	require 'connectDB.php';


	$sql = "SELECT * FROM parent WHERE parent_email = ? OR parent_name = ?";

	$result = mysqli_stmt_init($conn);

	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_CHECK_PARENT_DATA');
		        window.location.href='registerParent.php';
		        </script>";
    } else { 
    	mysqli_stmt_bind_param($result, "ss", $parent_email, $parent_name);
        mysqli_stmt_execute($result);
        $resultl = mysqli_stmt_get_result($result);

        // If the details not redundent
        if (!$row = mysqli_fetch_assoc($resultl)){

        	$sql = "INSERT INTO parent (parent_name, parent_email, parent_password, parent_contact,parent_address) VALUES (?,?,?,?,?)";

			$result = mysqli_stmt_init($conn);
			if (!mysqli_stmt_prepare($result, $sql)) {
		        echo "<script>alert('SQL_Error_REGISTER_PARENT_DATA');
				        window.location.href='registerParent.php';
				        </script>";
		    } else { 
				mysqli_stmt_bind_param($result, "sssss", $parent_name, $parent_email, $parent_password, $parent_contact, $parent_address);
		        mysqli_stmt_execute($result);
		        if ($result) {
		        	if ($code === 12) {
		        		// echo "<script>alert('Successfully Register Parent');
				        // window.location.href='registerStudent2.php';
				        // </script>";

				        return $result;

		        	} else if($code === 9) {
		        		// echo "<script>alert('Successfully Register Parent');
				        // window.location.href='registerStudent.php';
				        // </script>";
				        return $result;
		        	} else if($code === 23) {
		        		// echo "<script>alert('Successfully Register Parent');
				        // window.location.href='parentList.php';
				        // </script>";
				        return $result;
		        	} else if($code === 11){
		        		// echo "<script>alert('Successfully Register Parent');
				        // window.location.href='parentListTeacher.php';
				        // </script>";
				        return $result;
		        	}
		        	
		        }
		        
		    }

   		 } else {
   		 	if ($code !=11) {
   		 		echo "<script>alert('Parent Already Registered');
		        window.location.href='parentList.php';
		        </script>";
   		 	} else {
   		 		echo "<script>alert('Parent Already Registered');
		        window.location.href='parentListTeacher.php';
		        </script>";
   		 	}
   		 }




	
}
}


function verifyParent($parent_name, $parent_email){
	require 'connectDB.php';

	$sql = "SELECT * FROM parent WHERE parent_email = ? AND parent_name = ?";

	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_VERIFY_DATA');
		        window.location.href='index.php';
		        </script>";
    } else { 
		mysqli_stmt_bind_param($result, "ss", $parent_email, $parent_name);
        mysqli_stmt_execute($result);
        $resultl = mysqli_stmt_get_result($result);
        return $resultl;
    }
}


function validateFirstTimeLogin($email, $admin_password){
	require 'connectDB.php';

	$sql = "SELECT * FROM admin WHERE admin_email = ? AND admin_password = ?";
	$result = mysqli_stmt_init($conn);

	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_VALIDATE_DATA');
		        window.location.href='index.php';
		        </script>";
    } else { 
		mysqli_stmt_bind_param($result, "ss", $email, $admin_password);
        mysqli_stmt_execute($result);
        $resultl = mysqli_stmt_get_result($result);
        return $resultl;
    }
}



function validateFirstTimeLoginTeacher($email, $teacher_password){

	require 'connectDB.php';

	$sql = "SELECT * FROM teacher WHERE teacher_email = ? AND teacher_password = ?";
	$result = mysqli_stmt_init($conn);

	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_VALIDATE_DATA');
		        window.location.href='index.php';
		        </script>";
    } else { 
		mysqli_stmt_bind_param($result, "ss", $email, $teacher_password);
        mysqli_stmt_execute($result);
        $resultl = mysqli_stmt_get_result($result);
        return $resultl;
    }

}



function addAdmin($name, $email, $admin_password, $admin_contact){
	require 'connectDB.php';

	// Check if data already been added
	$sql = "SELECT * FROM admin WHERE admin_name = ? OR admin_email = ?";

	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_ADMIN_DATA');
		        window.location.href='listAdmin.php';
		        </script>";
    } else { 
		mysqli_stmt_bind_param($result, "ss", $name, $email);
        mysqli_stmt_execute($result);
        $resultl = mysqli_stmt_get_result($result);

        // If the details not redundent
        if (!$row = mysqli_fetch_assoc($resultl)){
        	$sql = "INSERT INTO admin (admin_name, admin_email, admin_contact, admin_password) VALUES (?,?,?,?)";

        	$result = mysqli_stmt_init($conn);
			if (!mysqli_stmt_prepare($result, $sql)) {
				echo "<script>alert('SQL_Error_INSERT_DATA');
		        window.location.href='listAdmin.php';
		        </script>";
		    }
		    else {
				// Execute the sql statement
		        mysqli_stmt_bind_param($result, 'ssss' , $name, $email, $admin_contact, $admin_password);
		        mysqli_stmt_execute($result);
		        echo "<script>alert('Success Add New Admin');
		        window.location.href='listAdmin.php';
		        </script>";
		    }

		// Data exist in database
        } else {
        	echo "<script>alert('Data Exist In Database');
		        window.location.href='listAdmin.php';
		        </script>";
        }

}
}




// Record Holiday Date
function addDate($type, $description, $new_date_start, $new_date_end){
	require 'connectDB.php';

	// Check database if the date or description already been added
	$sql = "SELECT * FROM holiday_date WHERE holiday_start = ? AND holiday_end = ? AND holiday_type = ?";
	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_DATE_DATA');
		        window.location.href='date.php';
		        </script>";
    } else { 
		mysqli_stmt_bind_param($result, "sss", $new_date_start, $new_date_end, $type);
        mysqli_stmt_execute($result);
        $resultl = mysqli_stmt_get_result($result);

        // If the details not redundent
        if (!$row = mysqli_fetch_assoc($resultl)){
        	// Record data into database
			$sql = "INSERT INTO holiday_date (holiday_type, holiday_description, holiday_start, holiday_end) VALUES (?,?,?,?)";
			$result = mysqli_stmt_init($conn);
			if (!mysqli_stmt_prepare($result, $sql)) {
				echo "<script>alert('SQL_Error_INSERT_DATA');
		        window.location.href='date.php';
		        </script>";
		    }
		    else {
				// Execute the sql statement
		        mysqli_stmt_bind_param($result, 'ssss' , $type, $description, $new_date_start, $new_date_end);
		        mysqli_stmt_execute($result);
		        echo "<script>alert('Success Add New Date');
		        window.location.href='date.php';
		        </script>";
		    }
		// If the data redundent
        } else {
        	echo "<script>alert('Date Already Registered');
		        window.location.href='date.php';
		        </script>";
        }

    }

}


// Record Class Details
function addClass($class_name){
	require 'connectDB.php';

	// Check database if the class already been added
	$sql = "SELECT * FROM class WHERE class_name = ?";
	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_CLASS_DATA');
		        window.location.href='class.php';
		        </script>";
    } else { 
    	mysqli_stmt_bind_param($result, "s", $class_name);
        mysqli_stmt_execute($result);
        $resultl = mysqli_stmt_get_result($result);

        // If the details not redundent
        if (!$row = mysqli_fetch_assoc($resultl)){
        	// Record data into database
			$sql = "INSERT INTO class (class_name) VALUES (?)";
			$result = mysqli_stmt_init($conn);
			if (!mysqli_stmt_prepare($result, $sql)) {
				echo "<script>alert('SQL_Error_INSERT_DATA');
		        window.location.href='class.php';
		        </script>";
		    }
		    else {
				// Execute the sql statement
		        mysqli_stmt_bind_param($result, 's' , $class_name);
		        mysqli_stmt_execute($result);
		        echo "<script>alert('Success Add New Class');
		        window.location.href='class.php';
		        </script>";
		    }
		// If the data redundent
        } else {
        	echo "<script>alert('Class Already Registered');
		        window.location.href='class.php';
		        </script>";
        }
	}
}




function addClasHistory($class_id, $teacher_id, $d){
	require 'connectDB.php';
	$sql = "INSERT INTO class_history (classHistory_date, class_id, teacher_id) VALUES (?, ?, ?)";

	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_SELECT_TEACHER_DATA');
		       window.location.href='registerteacher.php';
		       </script>";
    } else {

 		mysqli_stmt_bind_param($result, "sii", $d, $class_id, $teacher_id);
    	mysqli_stmt_execute($result);
    	 echo "<script>alert('SUCCESSS!!!');
		       window.location.href='adminTeacher.php';
		       </script>";
    }

}






// Record Student Details
function addStudent($student_id, $student_name, $student_ic, $parent_name, $parent_email, $class_id){
	require 'connectDB.php';

	$sql = "SELECT * FROM student WHERE student_id = ?";
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_ADD_STUDENT_DATA');
		        window.location.href='studentlist.php';
		        </script>";
    } 
    else { 
    	mysqli_stmt_bind_param($result, "s", $student_id);
        mysqli_stmt_execute($result);
        $resultl = mysqli_stmt_get_result($result);

        // If the details not redundent
        if (!$row = mysqli_fetch_assoc($resultl)){
        	$sql = "INSERT INTO student (student_id, student_name, student_ic, student_status, parent_name, parent_email,  class_id) VALUES (?,?,?,?,?, ?,?)";

        	$result = mysqli_stmt_init($conn);
			if (!mysqli_stmt_prepare($result, $sql)) {
				echo "<script>alert('SQL_Error_INSERT_STUDENT_DATA');
		         
		        </script>";
		    }
		    else {
		    	$student_status = "Active";
				// Execute the sql statement
		        mysqli_stmt_bind_param($result, 'ssssssi' , $student_id, $student_name, $student_ic, $student_status, $parent_name, $parent_email, $class_id);
		        mysqli_stmt_execute($result);
		        echo "<script>alert('Success Add New Student');
		        window.location.href='studentlist.php';
		        </script>";
		    }

        }
        else {
        	echo "<script>alert('RFID already registered');
		         
		        </script>";
        }
	}

}




function addStudent4($student_id, $student_name, $student_ic, $parent_name, $parent_email, $parent_contact, $class_id){
	require 'connectDB.php';

	$sql = "SELECT * FROM student WHERE student_id = ?";
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_ADD_STUDENT_DATA');
		        window.location.href='allStudentList.php';
		        </script>";
    } 
    else { 
    	mysqli_stmt_bind_param($result, "s", $student_id);
        mysqli_stmt_execute($result);
        $resultl = mysqli_stmt_get_result($result);

        // If the details not redundent
        if (!$row = mysqli_fetch_assoc($resultl)){
        	$sql = "INSERT INTO student (student_id, student_name, student_ic, student_status, parent_name, parent_email, parent_contact, class_id) VALUES (?,?,?,?,?,?,?,?)";
        	
        	$result = mysqli_stmt_init($conn);
			if (!mysqli_stmt_prepare($result, $sql)) {
				echo "<script>alert('SQL_Error_INSERT_STUDENT_DATA');
		         window.location.href='allStudentList.php';
		        </script>";
		    }
		    else {
		    	$student_status = "Active";
		    	if(empty($class_id)) {$class_id = NULL;}
				// Execute the sql statement
		        mysqli_stmt_bind_param($result, 'sssssssi' , $student_id, $student_name, $student_ic, $student_status ,$parent_name, $parent_email, $parent_contact, $class_id);
		        mysqli_stmt_execute($result);
		        echo "<script>alert('Success Add New Student');
		        window.location.href='allStudentList.php';
		        </script>";
		    }

        }
        else {
        	echo "<script>alert('RFID already registered');
		         
		        </script>";
        }
	}

}




function addStudentFromTeacher($student_id, $student_name, $student_ic, $parent_name, $parent_email, $parent_contact, $class_id){
	require 'connectDB.php';

	$sql = "SELECT * FROM student WHERE student_id = ?";
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_ADD_STUDENT_DATA');
		        window.location.href='teacherstudlist.php';
		        </script>";
    } 
    else { 
    	mysqli_stmt_bind_param($result, "s", $student_id);
        mysqli_stmt_execute($result);
        $resultl = mysqli_stmt_get_result($result);

        // If the details not redundent
        if (!$row = mysqli_fetch_assoc($resultl)){
        	$sql = "INSERT INTO student (student_id, student_name, student_ic, parent_name, parent_email, parent_contact, class_id) VALUES (?,?,?,?,?, ?,?)";

        	$result = mysqli_stmt_init($conn);
			if (!mysqli_stmt_prepare($result, $sql)) {
				echo "<script>alert('SQL_Error_INSERT_STUDENT_DATA');
		        window.location.href='teacherstudlist.php'; 
		        </script>";
		    }
		    else {
				// Execute the sql statement
		        mysqli_stmt_bind_param($result, 'ssssssi' , $student_id, $student_name, $student_ic, $parent_name, $parent_email, $parent_contact, $class_id);
		        mysqli_stmt_execute($result);
		        echo "<script>alert('Success Add New Student');
		        window.location.href='teacherstudlist.php';
		        </script>";
		    }

        }
        else {
        	echo "<script>alert('RFID already registered');
		         
		        </script>";
        }
	}

}



function displayAllAttendanceByMonth($month){
	require 'connectDB.php';

	$sql = "SELECT student.student_id AS id, student.student_name AS name, class.class_name AS class, attendance.attend_status AS status, attendance.dates AS dates FROM attendance RIGHT JOIN student ON attendance.student_id = student.student_id JOIN class ON student.class_id = class.class_id  WHERE MONTH(attendance.dates) = ? ORDER BY attendance.dates ASC";
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_ADD_STUDENT_DATA');
		        window.location.href='teacherstudlist.php';
		        </script>";
    } 
    else { 

    	mysqli_stmt_bind_param($result, "s", $month);
        mysqli_stmt_execute($result);
        $resultl = mysqli_stmt_get_result($result);
    	return $resultl;
}
}








function displayTodayAttendanceByMonth($class_id, $date){
	require 'connectDB.php';

	$sql = "SELECT student.student_id AS id, student.student_name AS name, class.class_name AS class, attendance.attend_status AS status FROM attendance RIGHT JOIN student ON attendance.student_id = student.student_id JOIN class ON student.class_id = class.class_id WHERE class.class_id = ? AND attendance.dates = ?";
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_ADD_STUDENT_DATA');
		        window.location.href='teacherstudlist.php';
		        </script>";
    } 
    else { 

    	mysqli_stmt_bind_param($result, "is", $class_id, $date);
        mysqli_stmt_execute($result);
        $resultl = mysqli_stmt_get_result($result);
    	return $resultl;
}
}




function displayStudentAttendanceByClassAttend($class_id, $dates){
	require 'connectDB.php';

	$sql = "SELECT student.student_id AS id, student.student_name AS name, class.class_name AS class, attendance.attend_status AS status FROM attendance RIGHT JOIN student ON attendance.student_id = student.student_id JOIN class ON student.class_id = class.class_id WHERE class.class_id = ? AND attendance.dates = ? AND attendance.attend_status != ?";
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_ADD_STUDENT_DATA');
		        window.location.href='teacherstudlist.php';
		        </script>";
    } 
    else { 
    	$attend_status = "Absent";
    	mysqli_stmt_bind_param($result, "iss", $class_id, $dates, $attend_status);
        mysqli_stmt_execute($result);
        $resultl = mysqli_stmt_get_result($result);
    	return $resultl;
}
}




function displayStudentAttendanceByClassAbsent($class_id, $dates){
	require 'connectDB.php';

	$sql = "SELECT student.student_id AS id, student.student_name AS name, class.class_name AS class, attendance.attend_status AS status FROM attendance RIGHT JOIN student ON attendance.student_id = student.student_id JOIN class ON student.class_id = class.class_id WHERE class.class_id = ? AND attendance.dates = ? AND attendance.attend_status = ?";
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_ADD_STUDENT_DATA');
		        window.location.href='teacherstudlist.php';
		        </script>";
    } 
    else { 
    	$attend_status = "Absent";
    	mysqli_stmt_bind_param($result, "iss", $class_id, $dates, $attend_status);
        mysqli_stmt_execute($result);
        $resultl = mysqli_stmt_get_result($result);
    	return $resultl;
}
}




function addTeacher($teacher_name, $teacher_email, $teacher_contact, $password_1, $class_id) {
	require 'connectDB.php';

	$sql = "SELECT * FROM teacher WHERE teacher_name = ? OR teacher_email = ?";
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_SEARCH_TEACHER_DATA');
		        window.location.href='studentlist.php';
		        </script>";
    } 
    else { 
    	mysqli_stmt_bind_param($result, "ss", $teacher_name, $teacher_email);
        mysqli_stmt_execute($result);
        $resultl = mysqli_stmt_get_result($result);

        // If the details not redundent
        if (!$row = mysqli_fetch_assoc($resultl)){

        	if(empty($class_id)) {
        		$class_id = null;
        	}

        	$sql = "INSERT INTO teacher (teacher_name,teacher_email, teacher_contact, teacher_password, class_id) VALUES (?,?,?,?,?)";

        	$result = mysqli_stmt_init($conn);
			if (!mysqli_stmt_prepare($result, $sql)) {
				echo "<script>alert('SQL_Error_INSERT_TEACHER_DATA');
		         window.location.href='adminTeacher.php';
		        </script>";
		    }
		    else {
				// Execute the sql statement
		        mysqli_stmt_bind_param($result, 'ssssi' , $teacher_name, $teacher_email, $teacher_contact,$password_1, $class_id);
		        mysqli_stmt_execute($result);
		        if(empty($class_id)) {
        			echo "<script>alert('Successfully Add New Teacher');
		         window.location.href='adminTeacher.php';
		        </script>";
        		}
		        $resultl = mysqli_stmt_get_result($result);
    			return $resultl;
		        
		    }
		} else {
			echo "<script>alert('Data exist in database');
		         window.location.href='registerteacher.php';
		        </script>";
		}
    }


}



function displayAdmin(){
	require 'connectDB.php';

	$sql = "SELECT * FROM admin";

	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_DISPLAY_ADMIN_DATA');
		        window.location.href='class.php';
		        </script>";
    } else {
		// mysqli_stmt_bind_param($result, 'i' , $class_id);
    	mysqli_stmt_execute($result);
    	$resultl = mysqli_stmt_get_result($result);
    	return $resultl;
    }

}

function displayAdminByID($admin_id) {
	require 'connectDB.php';

	$sql = "SELECT * FROM admin WHERE admin_id = ?";

	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
       
    } else {
		mysqli_stmt_bind_param($result, 'i' , $admin_id);
    	mysqli_stmt_execute($result);
    	$resultl = mysqli_stmt_get_result($result);
    	return $resultl;
    }

}


function displayClassHistoryByID($class_id){
	require 'connectDB.php';

	$sql = "SELECT * FROM class_history INNER JOIN teacher ON class_history.teacher_id = teacher.teacher_id WHERE class_history.class_id = ?";

	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_DISPLAY_CLASS_HISTORY_DATA');
		        window.location.href='class.php';
		        </script>";
    } else {
		mysqli_stmt_bind_param($result, 'i' , $class_id);
    	mysqli_stmt_execute($result);
    	$resultl = mysqli_stmt_get_result($result);
    	return $resultl;
    }


}







function displayCurrentDateAttendance($dates) {

	require 'connectDB.php';

	$sql = "SELECT * FROM attendance INNER JOIN student ON attendance.student_id = student.student_id WHERE dates =? AND time_in != '' ORDER BY time_in DESC";

	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_DISPLAY_Attendance_DATA');
		        window.location.href='date.php';
		        </script>";
    } else {
		mysqli_stmt_bind_param($result, 's' , $dates);
    	mysqli_stmt_execute($result);
    	$resultl = mysqli_stmt_get_result($result);
    	return $resultl;
    }

}




function displayDateAttendance($dates, $class_id){
	require 'connectDB.php';

	$sql = "SELECT attendance.attendance_id AS attendance_id, attendance.attend_status AS attend_status, student.student_id AS student_id, student.student_name AS student_name, student.student_ic AS student_ic FROM attendance INNER JOIN student ON attendance.student_id = student.student_id WHERE student.class_id = ? AND attendance.dates = ?";

	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_DISPLAY_Attendance_DATA');
		        window.location.href='date.php';
		        </script>";
    } else {
		mysqli_stmt_bind_param($result, 'is' , $class_id, $dates);
    	mysqli_stmt_execute($result);
    	$resultl = mysqli_stmt_get_result($result);
    	return $resultl;
    }

}

function displaystudentAttendanceByID($student_id, $attendance_id){
	require 'connectDB.php';

	$sql = "SELECT * FROM student INNER JOIN attendance ON student.student_id = attendance.student_id WHERE attendance.attendance_id = ?";

	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_DISPLAY_Attendance_DATA');
		        window.location.href='date.php';
		        </script>";
    } else {
		mysqli_stmt_bind_param($result, 'i' , $attendance_id);
    	mysqli_stmt_execute($result);
    	$resultl = mysqli_stmt_get_result($result);
    	return $resultl;
    }

}



function displayAttendanceByClassByMonth($class_id,$month){
	require 'connectDB.php';

	$sql = "SELECT student.student_id AS id, student.student_name AS name, class.class_name AS class, attendance.dates AS dates, attendance.attend_status AS status FROM attendance RIGHT JOIN student ON attendance.student_id = student.student_id JOIN class ON student.class_id = class.class_id WHERE class.class_id = ? AND MONTH(attendance.dates) = ? ORDER BY attendance.dates ASC";
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_ADD_STUDENT_DATA');
		        window.location.href='teacherstudlist.php';
		        </script>";
    } 
    else { 
    	
    	mysqli_stmt_bind_param($result, "is", $class_id, $month);
        mysqli_stmt_execute($result);
        $resultl = mysqli_stmt_get_result($result);
    	return $resultl;
}


}





function displayHoliday(){
	require 'connectDB.php';

	$sql = "SELECT * FROM holiday_date";

	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_DISPLAY_DATE_DATA');
		        window.location.href='date.php';
		        </script>";
    } else {

    	mysqli_stmt_execute($result);
    	$resultl = mysqli_stmt_get_result($result);
    	return $resultl;
    }

}



function displaySpecificHoliday($date_id){
	require 'connectDB.php';
	$sql = "SELECT * FROM holiday_date WHERE holiday_id = ?";

	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_DISPLAY_SPECIFIC_DATE_DATA');
		        window.location.href='date.php';
		        </script>";
    } else {
		mysqli_stmt_bind_param($result, 'i' , $date_id);
    	mysqli_stmt_execute($result);
    	$resultl = mysqli_stmt_get_result($result);
    	return $resultl;
    }


}


function displayAllClass() {
	require 'connectDB.php';

	$sql = "SELECT * FROM class";
	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_DISPLAY_CLASS_DATA');
		        window.location.href='class.php';
		        </script>";
    } else {

    	mysqli_stmt_execute($result);
    	$resultl = mysqli_stmt_get_result($result);
    	return $resultl;
    }
	
}



function displayClass() {
	require 'connectDB.php';

	$sql = "SELECT class.class_name AS class_name, class.class_id AS class_id, teacher.teacher_name AS teacher_name FROM class LEFT JOIN teacher ON class.class_id = teacher.class_id ORDER BY class.class_name";

	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_DISPLAY_CLASS_DATA');
		        window.location.href='class.php';
		        </script>";
    } else {

    	mysqli_stmt_execute($result);
    	$resultl = mysqli_stmt_get_result($result);
    	return $resultl;
    }

}




function displayClassByID($class_id){
	require 'connectDB.php';
	$sql = "SELECT * FROM class WHERE class_id=?";

	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_CLASS_DATA');
		        window.location.href='class.php';
		        </script>";
    } else { 
    	mysqli_stmt_bind_param($result, "i", $class_id);
        mysqli_stmt_execute($result);
        $resultl = mysqli_stmt_get_result($result);
        return $resultl;
	}



}



function displayClassForAddStudent($class_id) {
	require 'connectDB.php';
	$sql = "SELECT * FROM class WHERE class_id = ?";
	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_STUDENT_CLASS_DATA');
		       window.location.href='class.php';
		       </script>";
    } else {
    	mysqli_stmt_bind_param($result, 'i' , $class_id);
    	mysqli_stmt_execute($result);
    	$resultl = mysqli_stmt_get_result($result);
    	return $resultl;
    }

}


function displayStudent() {
	require 'connectDB.php';

	$sql = "SELECT * FROM student INNER JOIN parent ON student.parent_id = parent.parent_id ORDER BY student_name ASC";

	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_STUDENT_DATA');
		        window.location.href='class.php';
		        </script>";
    } else { 
        mysqli_stmt_execute($result);
        $resultl = mysqli_stmt_get_result($result);
        return $resultl;
	}
}





function displayStudentByClass($class_id) {
	require 'connectDB.php';

	$sql = "SELECT * FROM student INNER JOIN parent ON parent.parent_id = student.parent_id WHERE class_id = ? ORDER BY student_name ASC";

	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_STUDENT_DATA');
		        window.location.href='class.php';
		        </script>";
    } else { 
    	mysqli_stmt_bind_param($result, "i", $class_id);
        mysqli_stmt_execute($result);
        $resultl = mysqli_stmt_get_result($result);
        return $resultl;
	}
}



function displayStudentByID($student_id){
	require 'connectDB.php';
	$sql = "SELECT * FROM student INNER JOIN parent ON student.parent_id = parent.parent_id WHERE BINARY student.student_id = ?";

	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_STUDENT_DATA_BY_ID');
		        window.location.href='class.php';
		        </script>";
    } else { 
    	mysqli_stmt_bind_param($result, "s", $student_id);
        mysqli_stmt_execute($result);
        $resultl = mysqli_stmt_get_result($result);
        return $resultl;
	}

}


function displayStudentWithAttendance($attendance_id, $student_id) {
	require 'connectDB.php';

	$sql = "SELECT FROM student INNER JOIN attendance ON student.student_id = attendance.student_id WHERE attendance_id = ?";
	
	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_DISPLAY_CLASS_AVAILABLE_DATA');
		        window.location.href='adminteacher.php';
		        </script>";
    } else { 
    	mysqli_stmt_bind_param($result, "i", $attendance_id);
        mysqli_stmt_execute($result);
        $resultl = mysqli_stmt_get_result($result);
        return $resultl;
	}


}




function displayAvailableClass() {
	require 'connectDB.php';

	$sql = "SELECT class.class_id AS class_id, class.class_name AS class_name FROM class LEFT JOIN teacher ON class.class_id = teacher.class_id WHERE teacher_name IS NULL ORDER BY class.class_name";

	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_DISPLAY_CLASS_AVAILABLE_DATA');
		        window.location.href='adminteacher.php';
		        </script>";
    } else { 
        mysqli_stmt_execute($result);
        $resultl = mysqli_stmt_get_result($result);
        return $resultl;
	}
}


function displayClassExceptOneRow($class_id) {
	require 'connectDB.php';

	$sql = "SELECT * FROM class WHERE class_id != ?";
	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_DISPLAY_CLASS_AVAILABLE_DATA');
		        window.location.href='adminteacher.php';
		        </script>";
    } else { 
    	mysqli_stmt_bind_param($result, "i", $class_id);
        mysqli_stmt_execute($result);
        $resultl = mysqli_stmt_get_result($result);
        return $resultl;
	}

}


function displayAvailableClassTeacher() {
	require 'connectDB.php';

	$sql = "SELECT class.class_id AS class_id , class.class_name AS class_name FROM class LEFT JOIN teacher ON class.class_id = teacher.class_id WHERE teacher_name IS NULL ORDER BY class.class_name";

	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_DISPLAY_CLASS_AVAILABLE_DATA');
		        window.location.href='adminteacher.php';
		        </script>";
    } else { 
        mysqli_stmt_execute($result);
        $resultl = mysqli_stmt_get_result($result);
        return $resultl;
	}

}


function displayTeacher() {
	require 'connectDB.php';

	$sql = "SELECT teacher.teacher_id AS teacher_id, teacher.teacher_name AS teacher_name, teacher.teacher_email AS teacher_email, teacher.teacher_contact AS teacher_contact, class.class_id AS class_id, class.class_name AS class_name FROM teacher LEFT JOIN class ON teacher.class_id = class.class_id";

	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_STUDENT_DATA');
		        window.location.href='class.php';
		        </script>";
    } else { 
        mysqli_stmt_execute($result);
        $resultl = mysqli_stmt_get_result($result);
        return $resultl;
	}

}

function displayAvailableTeacher(){
	require 'connectDB.php';
	$sql = "SELECT * FROM teacher WHERE class_id IS NULL";

	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_STUDENT_DATA');
		        window.location.href='class.php';
		        </script>";
    } else { 
        mysqli_stmt_execute($result);
        $resultl = mysqli_stmt_get_result($result);
        return $resultl;
	}
}


function displaySpecificTeacher($class_id){
	require 'connectDB.php';
	$sql = "SELECT * FROM teacher WHERE class_id=?";

	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_STUDENT_DATA');
		        window.location.href='class.php';
		        </script>";
    } else { 
    	mysqli_stmt_bind_param($result, "i", $class_id);
        mysqli_stmt_execute($result);
        $resultl = mysqli_stmt_get_result($result);
        return $resultl;
	}
}

function displayTeacherByID($teacher_id) {
	require 'connectDB.php';
	$sql = "SELECT * FROM teacher WHERE teacher_id=?";

	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_STUDENT_DATA');
		        window.location.href='class.php';
		        </script>";
    } else { 
    	mysqli_stmt_bind_param($result, "i", $teacher_id);
        mysqli_stmt_execute($result);
        $resultl = mysqli_stmt_get_result($result);
        return $resultl;
	}
}


function displayTeacherByIDByClass($teacher_id){
	require 'connectDB.php';
	$sql = "SELECT * FROM teacher INNER JOIN class on teacher.class_id = class.class_id  WHERE teacher_id=?";

	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_STUDENT_DATA');
		        window.location.href='class.php';
		        </script>";
    } else { 
    	mysqli_stmt_bind_param($result, "i", $teacher_id);
        mysqli_stmt_execute($result);
        $resultl = mysqli_stmt_get_result($result);
        return $resultl;
	}

}



function displayTeacherByEmail($teacher_email){
	require 'connectDB.php';

	$sql = "SELECT * FROM teacher WHERE teacher_email=?";

	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_STUDENT_DATA');
		        window.location.href='class.php';
		        </script>";
    } else { 
    	mysqli_stmt_bind_param($result, "s", $teacher_email);
        mysqli_stmt_execute($result);
        $resultl = mysqli_stmt_get_result($result);
        return $resultl;
	}


}




function updateAdmin($admin_id, $name, $email, $contact){
	require 'connectDB.php';

	// Check if data already been added
	$sql = "SELECT * FROM admin WHERE BINARY admin_name = ? AND BINARY admin_email = ? AND admin_contact = ?";

	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_ADMIN_DATA');
		        window.location.href='listAdmin.php';
		        </script>";
    } else { 
		mysqli_stmt_bind_param($result, "sss", $name, $email, $contact);
        mysqli_stmt_execute($result);
        $resultl = mysqli_stmt_get_result($result);

        // If the details not redundent
        if (!$row = mysqli_fetch_assoc($resultl)){
        	$sql = "UPDATE admin SET admin_name = ?, admin_email = ?, admin_contact = ? WHERE admin_id =?";

        	$result = mysqli_stmt_init($conn);
			if (!mysqli_stmt_prepare($result, $sql)) {
				echo "<script>alert('SQL_Error_INSERT_DATA');
		        window.location.href='listAdmin.php';
		        </script>";
		    }
		    else {
				// Execute the sql statement
		        mysqli_stmt_bind_param($result, 'sssi' , $name, $email, $contact, $admin_id);
		        mysqli_stmt_execute($result);
		        echo "<script>alert('Success Update Admin');
		        window.location.href='listAdmin.php';
		        </script>";
		    }

		// Data exist in database
        } else {
        	echo "<script>alert('Data Exist In Database');
		        window.location.href='listAdmin.php';
		        </script>";
        }

}
}



function updatePasswordAdmin($admin_id, $admin_password){
	require 'connectDB.php';

	$sql = "UPDATE admin SET admin_password = ?, admin_login = 1 WHERE admin_id = ?";

	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_UPDATE_PASSWORD_DATA');
		        window.location.href='index.php';
		        </script>";
    } else { 
    	mysqli_stmt_bind_param($result, "si", $admin_password, $admin_id);
        mysqli_stmt_execute($result);
        echo "<script>alert('Successfully Update Password. Please Login');
		        window.location.href='index.php';
		        </script>";
         
	}



}


function updatePasswordTeacher($teacher_id, $teacher_password){
	require 'connectDB.php';

	$sql = "UPDATE teacher SET teacher_password = ?, teacher_login = 1 WHERE teacher_id = ?";

	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_UPDATE_PASSWORD_DATA');
		        window.location.href='index.php';
		        </script>";
    } else { 
    	mysqli_stmt_bind_param($result, "si", $teacher_password, $teacher_id);
        mysqli_stmt_execute($result);
        echo "<script>alert('Successfully Update Password. Please Login');
		        window.location.href='index.php';
		        </script>";
         
	}
}


function updateTeacherEmpty($teacher_id, $teacher_name, $teacher_email, $teacher_contact) {
	require 'connectDB.php';

	$sql = "SELECT * FROM teacher WHERE teacher_name = ? AND teacher_email = ? AND teacher_contact = ? AND class_id = NULL";

	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
		echo "<script>alert('SQL_Error_UPDATE_CLASS2_DATA');
				        window.location.href='registerTeacher.php';
				        </script>";
	} else {
		mysqli_stmt_bind_param($result, "sss", $teacher_name, $teacher_email, $teacher_contact);
        mysqli_stmt_execute($result);
        $resultl = mysqli_stmt_get_result($result);
		if (!$row = mysqli_fetch_assoc($resultl)) {
			
			$sql = "UPDATE teacher SET teacher_name = ? , teacher_email = ?, teacher_contact = ?, class_id = NULL WHERE teacher_id = ?";
			// Connection to database
			$result = mysqli_stmt_init($conn);
			if (!mysqli_stmt_prepare($result, $sql)) {
		        echo "<script>alert('SQL_Error_UPDATE_CLASS2_DATA');
				        window.location.href='registerTeacher.php';
				        </script>";
		    } else { 
		    	mysqli_stmt_bind_param($result, "sssi", $teacher_name, $teacher_email, $teacher_contact, $teacher_id);
		        mysqli_stmt_execute($result);
		        echo "<script>alert('Successfully Update Teacher');
				        window.location.href='adminteacher.php';
				        </script>";
		         
			}



		} else {
			echo "<script>alert('Data exist in database');
				        window.location.href='adminteacher.php';
				        </script>";
		}
	}

}



function updateTeacher($teacher_id, $teacher_name, $teacher_email, $teacher_contact, $class_id){
	require 'connectDB.php';



	$sql = "SELECT * FROM teacher WHERE teacher_name = ? AND teacher_email = ? AND teacher_contact = ? AND class_id = ?";

	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
		echo "<script>alert('SQL_Error_UPDATE_CLASS2_DATA');
				        window.location.href='registerTeacher.php';
				        </script>";
	} else {
		mysqli_stmt_bind_param($result, "sssi", $teacher_name, $teacher_email, $teacher_contact, $class_id);
        mysqli_stmt_execute($result);
        $resultl = mysqli_stmt_get_result($result);
		if (!$row = mysqli_fetch_assoc($resultl)) {
			
			$sql = "UPDATE teacher SET teacher_name = ? , teacher_email = ?, teacher_contact = ?, class_id = ? WHERE teacher_id = ?";
			// Connection to database
			$result = mysqli_stmt_init($conn);
			if (!mysqli_stmt_prepare($result, $sql)) {
		        echo "<script>alert('SQL_Error_UPDATE_CLASS2_DATA');
				        window.location.href='class.php';
				        </script>";
		    } else { 
		    	mysqli_stmt_bind_param($result, "sssii", $teacher_name, $teacher_email, $teacher_contact, $class_id, $teacher_id);
		        mysqli_stmt_execute($result);
		        echo "<script>alert('Successfully Update Teacher');
				        window.location.href='adminteacher.php';
				        </script>";
		         
			}



		} else {
			echo "<script>alert('Data exist in database');
				        window.location.href='adminteacher.php';
				        </script>";
		}
	}








	

}




function updateStudent($student_id, $student_name, $student_status, $student_ic, $student_address, $class_id, $page) {
	require 'connectDB.php';

	if ($student_status === 'Deactive') {
		$class_id = null;
	}


	if (empty($class_id)) {
		$sql = "UPDATE student SET student_name = ?, student_status = ?, student_ic = ?, student_address = ?, class_id = NULL WHERE student_id =?";
	} else {
		$sql = "UPDATE student SET student_name = ?, student_status = ?, student_ic = ?,  student_address = ?, class_id = ? WHERE student_id =?";
	}


	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_UPDATE_STUDENT_DATA1');
		        window.location.href='studentlist.php';
		        </script>";
    } else { 

    	if (empty($class_id)) {
    		mysqli_stmt_bind_param($result, "sssss", $student_name, $student_status, $student_ic, $student_address, $student_id);
    	} else {
    		mysqli_stmt_bind_param($result, "ssssis", $student_name, $student_status, $student_ic, $student_address, $class_id, $student_id);
    	}
    	
        mysqli_stmt_execute($result);

        if ($page ===1) {
        	 echo "<script>alert('Successfully Update Student Data');
		        window.location.href='allStudentList.php';
		        </script>";
        } else if ($page===2) {
        	 echo "<script>alert('Successfully Update Student Data');
		        window.location.href='studentlist.php';
		        </script>";
        } else if($page ===3){
        	echo "<script>alert('Successfully Update Student Data');
		        window.location.href='teacherstudlist.php';
		        </script>";
        }
       
         
 
	}

}


function updateStudentNewStudentID($student_id, $new_student_id, $student_name, $student_status, $student_ic, $student_address, $class_id, $page){
	require 'connectDB.php';

	if (empty($class_id)) {
		$sql = "UPDATE student SET student_name = ?, student_status = ?, student_ic = ?, student_address = ?, class_id = null, student_id = ? WHERE student_id =?";
	} else {
		$sql = "UPDATE student SET student_name = ?, student_status = ?, student_ic = ?,  student_address = ?, class_id = ?, student_id = ? WHERE student_id =?";

	}

	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_UPDATE_STUDENT_DATA2');
		        window.location.href='studentlist.php';
		        </script>";
    } else { 
    	mysqli_stmt_bind_param($result, "ssssiss", $student_name, $student_status, $student_ic, $student_address, $class_id, $new_student_id, $student_id);
        mysqli_stmt_execute($result);

         if ($page ===1) {
        	 echo "<script>alert('Successfully Update Student Data');
		        window.location.href='allStudentList.php';
		        </script>";
        } else if ($page===2) {
        	 echo "<script>alert('Successfully Update Student Data');
		        window.location.href='studentlist.php';
		        </script>";
        } else if ($page === 3) {
        	echo "<script>alert('Successfully Update Student Data');
		        window.location.href='teacherstudlist.php';
		        </script>";
         
 
		}
        }

}









function updateClass($class_name, $teacher_id, $class_id){
	require 'connectDB.php';

	$sql = "UPDATE class SET class_name=? WHERE class_id = ?";
	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_UPDATE_CLASS2_DATA');
		        window.location.href='class.php';
		        </script>";
    } else { 
    	mysqli_stmt_bind_param($result, "si", $class_name, $class_id);
        mysqli_stmt_execute($result);
        $resultl = mysqli_stmt_get_result($result);
         
        $sql = "UPDATE teacher SET class_id=? WHERE teacher_id = ?";
         if (!mysqli_stmt_prepare($result, $sql)) {
         	echo "<script>alert('SQL_Error_UPDATE_CLASS2_DATA');
		        window.location.href='class.php';
		        </script>";
         } else { 
    	mysqli_stmt_bind_param($result, "ii", $class_id, $teacher_id);
        mysqli_stmt_execute($result);
        $resultl = mysqli_stmt_get_result($result);
        echo "<script>alert('Successfully Updates');
		        window.location.href='class.php';
		        </script>";
    	}
	}
}


function updateClassEmpty($class_name, $teacher_id_moke, $class_id){
	require 'connectDB.php';

	$sql = "UPDATE class SET class_name=? WHERE class_id = ?";
	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_UPDATE_CLASS2_DATA');
		        window.location.href='class.php';
		        </script>";
    } else { 
    	mysqli_stmt_bind_param($result, "si", $class_name, $class_id);
        mysqli_stmt_execute($result);
         
        $sql = "UPDATE teacher SET class_id = NULL WHERE teacher_id = ?";

        $result = mysqli_stmt_init($conn);
         if (!mysqli_stmt_prepare($result, $sql)) {
         	echo "<script>alert('SQL_Error_UPDATE_CLASS2_DATA');
		        window.location.href='class.php';
		        </script>";
         } else { 
	    	mysqli_stmt_bind_param($result, "i" , $teacher_id_moke);
	        mysqli_stmt_execute($result);

	        echo "<script>alert('Successfully Update');
		        window.location.href='class.php';
		        </script>";
    	}
	}
}


function updatePreviousTeacher($teacher_id_moke){
	require 'connectDB.php';

	$sql = "UPDATE teacher SET class_id = NULL WHERE teacher_id = ?";

	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_SELECT_TEACHER_DATA');
		       window.location.href='editClass.php';
		       </script>";
    } else {

 		mysqli_stmt_bind_param($result, "i", $teacher_id_moke);
    	mysqli_stmt_execute($result);
    }


}


function updateDate($holiday_id, $startDate, $endDate, $holiday_type, $holiday_description) {
	require 'connectDB.php';


	$sql = "SELECT * FROM holiday_date WHERE holiday_start = ? AND holiday_end = ? AND holiday_type = ?";

	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_UPDATE_DATE_DATA');
		       window.location.href='editClass.php';
		       </script>";
    } else {

 		mysqli_stmt_bind_param($result, "sss", $startDate, $endDate, $holiday_type);
 		mysqli_stmt_execute($result);
    	$resultl = mysqli_stmt_get_result($result);

    	
   
		if (!$row = mysqli_fetch_assoc($resultl)) {
			$sql = "UPDATE holiday_date SET holiday_start = ?, holiday_end = ?, holiday_type = ?, holiday_description = ? WHERE holiday_id = ?";

			// Connection to database
			$result = mysqli_stmt_init($conn);
			if (!mysqli_stmt_prepare($result, $sql)) {
		        echo "<script>alert('SQL_UPDATE_DATE_DATA');
				       window.location.href='editClass.php';
				       </script>";
		    } else {

		 		mysqli_stmt_bind_param($result, "ssssi", $startDate, $endDate, $holiday_type, $holiday_description, $holiday_id);
		    	mysqli_stmt_execute($result);
		    	echo "<script>alert('Successfully Update');
				       window.location.href='date.php';
				       </script>";
		    }

		}
    	
    }




}


function deleteAdmin($admin_id){
	require 'connectDB.php';

	$sql = "DELETE FROM admin WHERE admin_id = ?";

	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_DELETE_ADMIN_DATA');
		        window.location.href='class.php';
		        </script>";
    } else { 
    	mysqli_stmt_bind_param($result, "i", $admin_id);
        mysqli_stmt_execute($result);
        echo "<script>alert('Successfully Delete');
		       window.location.href='listAdmin.php';
		       </script>";
	}
}





// If the class dont have any teacher
function deleteClass($class_id){
	require 'connectDB.php';

	$sql = "SELECT * FROM student WHERE class_id = ?";

	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_SELECT_STUDENT_DATA');
		        window.location.href='class.php';
		        </script>";
    } else { 
    	mysqli_stmt_bind_param($result, "i", $class_id);
        mysqli_stmt_execute($result);

        $resultl = mysqli_stmt_get_result($result);

        // If the details not redundent
        if (!$row = mysqli_fetch_assoc($resultl)){


			$sql = "DELETE FROM class WHERE class_id = ?";

			// Connection to database
			$result = mysqli_stmt_init($conn);
			if (!mysqli_stmt_prepare($result, $sql)) {
		        echo "<script>alert('SQL_Error_DELETE_CLASS_DATA');
				        window.location.href='class.php';
				        </script>";
		    } else { 
		    	mysqli_stmt_bind_param($result, "i", $class_id);
		        mysqli_stmt_execute($result);
		        echo "<script>alert('Successfully Delete Classs');
				        window.location.href='class.php';
				        </script>";
		        
		    }
        } else {
        	echo "<script>alert('Cannot Delete The Class Because Have The Have Students');
		        window.location.href='class.php';
		        </script>";
        }
        
        
    }

}




// If the class have any teacher
function deleteClassWithEditTeacher($class_id){
	require 'connectDB.php';


	$sql = "SELECT * FROM student WHERE class_id = ?";

	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_SELECT_STUDENT_DATA');
		        window.location.href='class.php';
		        </script>";
    } else { 
    	mysqli_stmt_bind_param($result, "i", $class_id);
        mysqli_stmt_execute($result);

        $resultl = mysqli_stmt_get_result($result);

        // If the details not redundent
        if (!$row = mysqli_fetch_assoc($resultl)){

        	$sql = "UPDATE teacher SET class_id = NULL WHERE class_id = ?";

        	$result = mysqli_stmt_init($conn);
        	if (!mysqli_stmt_prepare($result, $sql)) {
		        echo "<script>alert('SQL_Error_SELECT_STUDENT_DATA');
				        window.location.href='class.php';
				        </script>";
		    } else { 
		    	mysqli_stmt_bind_param($result, "i", $class_id);
		        mysqli_stmt_execute($result);

		        $sql = "DELETE FROM class WHERE class_id = ?";

				// Connection to database
				$result = mysqli_stmt_init($conn);
				if (!mysqli_stmt_prepare($result, $sql)) {
			        echo "<script>alert('SQL_Error_DELETE_CLASS_DATA');
					        window.location.href='class.php';
					        </script>";
			    } else { 
			    	mysqli_stmt_bind_param($result, "i", $class_id);
			        mysqli_stmt_execute($result);
			        echo "<script>alert('Successfully Delete Classs');
					        window.location.href='class.php';
					        </script>";
			        
			   }
			}
        } else {
        	echo "<script>alert('Cannot Delete The Class Because Have The Have Students');
		        window.location.href='class.php';
		        </script>";
        }   
    }
}



function deleteTeacher($teacher_id) {
	require 'connectDB.php';
	 $sql = "DELETE FROM teacher WHERE teacher_id = ?";

	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
	echo "<script>alert('SQL_Error_DELETE_CLASS_DATA');
		window.location.href='class.php';
		</script>";
	} else { 
		mysqli_stmt_bind_param($result, "i", $teacher_id);
		mysqli_stmt_execute($result);
		echo "<script>alert('Successfully Delete Teacher');
		window.location.href='adminteacher.php';
		</script>";
			        
	}
}


function deleteStudent($student_id) {
	require 'connectDB.php';
	 $sql = "DELETE FROM student WHERE student_id = ?";

	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
	echo "<script>alert('SQL_Error_DELETE_STUDENT_DATA');
		window.location.href='studentlist.php';
		</script>";
	} else { 
		mysqli_stmt_bind_param($result, "i", $teacher_id);
		mysqli_stmt_execute($result);
		echo "<script>alert('Successfully Delete Student');
		window.location.href='studentlist.php';
		</script>";
			        
	}
}




function deleteDate($holiday_id) {
	require 'connectDB.php';
	 $sql = "DELETE FROM holiday_date WHERE holiday_id = ?";

	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
	echo "<script>alert('SQL_Error_DELETE_HOLIDAY_DATA');
		window.location.href='studentlist.php';
		</script>";
	} else { 
		mysqli_stmt_bind_param($result, "i", $holiday_id);
		mysqli_stmt_execute($result);
		echo "<script>alert('Successfully Delete Date');
		window.location.href='date.php';
		</script>";
			        
	}
}












function verifyAdmin($admin_email, $admin_password) {
	require 'connectDB.php';

	// Check database if the date or description already been added
	$sql = "SELECT * FROM admin WHERE BINARY admin_email = ? AND BINARY admin_password = ?";

	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_LOGIN_DATA');
		        window.location.href='index.php';
		        </script>";
    } else { 
		mysqli_stmt_bind_param($result, "ss", $admin_email, $admin_password);
        mysqli_stmt_execute($result);
        $resultl = mysqli_stmt_get_result($result);

        if ($row = mysqli_fetch_assoc($resultl)){
        	return 9985;
        }
        else {
        	return 1;
        }

	}
}



function verifyTeacher($teacher_email, $teacher_password) {
	require 'connectDB.php';
	// Check database if the date or description already been added
	$sql = "SELECT * FROM teacher WHERE BINARY teacher_email = ? AND BINARY teacher_password = ?";
	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_LOGIN_DATA');
		        window.location.href='date.php';
		        </script>";
    } else { 
		mysqli_stmt_bind_param($result, "ss", $teacher_email, $teacher_password);
        mysqli_stmt_execute($result);
        $resultl = mysqli_stmt_get_result($result);

        // If the details not redundent
        if ($row = mysqli_fetch_assoc($resultl)){
        	return 2345;
        }
        else {
        	return 1;
        }

	}
	
}


function countTodayAttend($date){
	require 'connectDB.php';

	$sql = "SELECT COUNT(attendance_id) AS numberOfTodayAttend FROM attendance WHERE dates = ? AND attend_status = 'Attend'";

	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_STUDENT_CLASS_DATA');
		       window.location.href='class.php';
		       </script>";
    } else {
    	mysqli_stmt_bind_param($result, "s", $date);
    	mysqli_stmt_execute($result);
    	$resultl = mysqli_stmt_get_result($result);
    	return $resultl;
    }
}




function countTeacher(){
	require 'connectDB.php';

	$sql = "SELECT COUNT(teacher_id) AS numberOfTeacher FROM teacher";

	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_STUDENT_CLASS_DATA');
		       window.location.href='class.php';
		       </script>";
    } else {
    	mysqli_stmt_execute($result);
    	$resultl = mysqli_stmt_get_result($result);
    	return $resultl;
    }
}

function countClass(){
	require 'connectDB.php';

	$sql = "SELECT COUNT(class_id) AS numberOfClass FROM class";

	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_COUNT_CLASS_DATA');
		       window.location.href='class.php';
		       </script>";
    } else {
    	mysqli_stmt_execute($result);
    	$resultl = mysqli_stmt_get_result($result);
    	return $resultl;
    }
}

function countStudent(){
	require 'connectDB.php';

	$sql = "SELECT COUNT(student_id) AS numberOfStudent FROM student";

	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_STUDENT_CLASS_DATA');
		       window.location.href='class.php';
		       </script>";
    } else {
    	mysqli_stmt_execute($result);
    	$resultl = mysqli_stmt_get_result($result);
    	return $resultl;
    }
}


function countStudentByClass($class_id){
	require 'connectDB.php';

	$sql = "SELECT COUNT(*) AS numberOfStudent FROM student WHERE class_id = ?";

	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_STUDENT_CLASS_DATA');
		       window.location.href='class.php';
		       </script>";
    } else {
    	mysqli_stmt_bind_param($result, "i", $class_id);
    	mysqli_stmt_execute($result);
    	$resultl = mysqli_stmt_get_result($result);
    	return $resultl;
    }
}



function countStudentInAttendanceByClass($class_id){
	require 'connectDB.php';

	$sql = "SELECT COUNT(*) AS numberOfStudent FROM attendance INNER JOIN student ON attendance.student_id = student.student_id WHERE student.class_id = ?";

	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_STUDENT_CLASS_DATA');
		       window.location.href='class.php';
		       </script>";
    } else {
    	mysqli_stmt_bind_param($result, "i", $class_id);
    	mysqli_stmt_execute($result);
    	$resultl = mysqli_stmt_get_result($result);
    	return $resultl;
    }
}




function countStudentAbsent($class_id, $dates){
	require 'connectDB.php';

	$sql = "SELECT COUNT(*) AS 'totalAbsent' FROM attendance JOIN student ON attendance.student_id = student.student_id WHERE student.class_id = ? AND attendance.dates = ? AND attendance.attend_status = ?";

	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_STUDENT_CLASS_DATA');
		       window.location.href='class.php';
		       </script>";
    } else {
    	$attend_status = "Absent";
 		mysqli_stmt_bind_param($result, "iss", $class_id, $dates, $attend_status);
    	mysqli_stmt_execute($result);
    	$resultl = mysqli_stmt_get_result($result);
    	return $resultl;
    }


}





function countAttendStudentByClassAttend($class_id, $dates){
	require 'connectDB.php';

	$sql = "SELECT COUNT(*) AS 'totalAttend' FROM attendance JOIN student ON attendance.student_id = student.student_id WHERE student.class_id = ? AND attendance.dates = ? AND attendance.attend_status = ?";

	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_STUDENT_CLASS_DATA');
		       window.location.href='class.php';
		       </script>";
    } else {
    	$attend_status = "Attend";
 		mysqli_stmt_bind_param($result, "iss", $class_id, $dates, $attend_status);
    	mysqli_stmt_execute($result);
    	$resultl = mysqli_stmt_get_result($result);
    	return $resultl;
    }
}



function countMedicalLeaveStudentByClassAttend($class_id, $dates){
	require 'connectDB.php';

	$sql = "SELECT COUNT(*) AS 'totalMedicalLeave' FROM attendance JOIN student ON attendance.student_id = student.student_id WHERE student.class_id = ? AND attendance.dates = ? AND attendance.attend_status = ?";

	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_STUDENT_CLASS_DATA');
		       window.location.href='class.php';
		       </script>";
    } else {
    	$attend_status = "Medical Leave";
 		mysqli_stmt_bind_param($result, "iss", $class_id, $dates, $attend_status);
    	mysqli_stmt_execute($result);
    	$resultl = mysqli_stmt_get_result($result);
    	return $resultl;
    }
}


function countAttendLateStudentByClassAttend($class_id, $dates){
	require 'connectDB.php';

	$sql = "SELECT COUNT(*) AS 'totalAttendLate' FROM attendance JOIN student ON attendance.student_id = student.student_id WHERE student.class_id = ? AND attendance.dates = ? AND attendance.attend_status = ?";

	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_STUDENT_CLASS_DATA');
		       window.location.href='class.php';
		       </script>";
    } else {
    	$attend_status = "Attend Late";
 		mysqli_stmt_bind_param($result, "iss", $class_id, $dates, $attend_status);
    	mysqli_stmt_execute($result);
    	$resultl = mysqli_stmt_get_result($result);
    	return $resultl;
    }
}



function countAttendStudentByClassAbsent($class_id, $dates){
	require 'connectDB.php';

	$sql = "SELECT COUNT(*) AS 'totalAttend' FROM attendance JOIN student ON attendance.student_id = student.student_id WHERE student.class_id = ? AND attendance.dates = ? AND attendance.attend_status = ?";

	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_STUDENT_CLASS_DATA');
		       window.location.href='class.php';
		       </script>";
    } else {
    	$attend_status = "Absent";
 		mysqli_stmt_bind_param($result, "iss", $class_id, $dates, $attend_status);
    	mysqli_stmt_execute($result);
    	$resultl = mysqli_stmt_get_result($result);
    	return $resultl;
    }
}



function countAttendStatusByMonth($month,$year, $class_id) {
	require 'connectDB.php';

	$sql = "SELECT attend_status, COUNT(attend_status) AS Status FROM attendance INNER JOIN student ON student.student_id = attendance.student_id WHERE Month(attendance.dates) = ? AND YEAR(attendance.dates) = ? AND student.class_id = ? GROUP BY attendance.attend_status ORDER BY attendance.attend_status DESC";


	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_STUDENT_CLASS_DATA');
		       window.location.href='class.php';
		       </script>";
    } else {
 		mysqli_stmt_bind_param($result, "iii", $month, $year, $class_id);
    	mysqli_stmt_execute($result);
    	$resultl = mysqli_stmt_get_result($result);
    	return $resultl;
    }


}


function countDayByMonthAndClass($class_id, $month){
	require 'connectDB.php';

	$sql = "SELECT COUNT(DISTINCT dates) AS numberOfDayByMonth FROM attendance INNER JOIN student ON attendance.student_id = student.student_id WHERE MONTH(dates) = ? AND student.class_id = ? GROUP BY MONTH(dates)";

	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_STUDENT_CLASS_DATA');
		       window.location.href='class.php';
		       </script>";
    } else {
    	 mysqli_stmt_bind_param($result, "ii", $month, $class_id);
    	mysqli_stmt_execute($result);
    	$resultl = mysqli_stmt_get_result($result);
    	return $resultl;
    }


}



function countTotalAttentByMonthAndClass($class_id, $month){
	require 'connectDB.php';

	$sql = "SELECT COUNT(*) AS numberOfAttendStudent FROM attendance INNER JOIN student ON attendance.student_id = student.student_id WHERE MONTH(dates) = ? AND student.class_id = ? AND attendance.attend_status = 'Attend'";

	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_STUDENT_CLASS_DATA');
		       window.location.href='class.php';
		       </script>";
    } else {
    	 mysqli_stmt_bind_param($result, "ii", $month, $class_id);
    	mysqli_stmt_execute($result);
    	$resultl = mysqli_stmt_get_result($result);
    	return $resultl;
    }

}










function countTotalAttentLateByMonthAndClass($class_id, $month){
	require 'connectDB.php';

	$sql = "SELECT COUNT(*) AS numberOfAttendLateStudent FROM attendance INNER JOIN student ON attendance.student_id = student.student_id WHERE MONTH(dates) = ? AND student.class_id = ? AND attendance.attend_status = 'Attend Late'";

	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_STUDENT_CLASS_DATA');
		       window.location.href='class.php';
		       </script>";
    } else {
    	 mysqli_stmt_bind_param($result, "ii", $month, $class_id);
    	mysqli_stmt_execute($result);
    	$resultl = mysqli_stmt_get_result($result);
    	return $resultl;
    }

}


function countTotalMedicalLeaveByMonthAndClass($class_id, $month){
	require 'connectDB.php';

	$sql = "SELECT COUNT(*) AS numberOfMedicalLeaveStudent FROM attendance INNER JOIN student ON attendance.student_id = student.student_id WHERE MONTH(dates) = ? AND student.class_id = ? AND attendance.attend_status = 'Medical Leave'";

	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_STUDENT_CLASS_DATA');
		       window.location.href='class.php';
		       </script>";
    } else {
    	 mysqli_stmt_bind_param($result, "ii", $month, $class_id);
    	mysqli_stmt_execute($result);
    	$resultl = mysqli_stmt_get_result($result);
    	return $resultl;
    }

}


function countTotalAbsentByMonthAndClass($class_id, $month){
	require 'connectDB.php';

	$sql = "SELECT COUNT(*) AS numberOfAbsentStudent FROM attendance INNER JOIN student ON attendance.student_id = student.student_id WHERE MONTH(dates) = ? AND student.class_id = ? AND attendance.attend_status = 'Absent'";

	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_STUDENT_CLASS_DATA');
		       window.location.href='class.php';
		       </script>";
    } else {
    	 mysqli_stmt_bind_param($result, "ii", $month, $class_id);
    	mysqli_stmt_execute($result);
    	$resultl = mysqli_stmt_get_result($result);
    	return $resultl;
    }

}

function countTotalOtherByMonthAndClass($class_id, $month){
	require 'connectDB.php';

	$sql = "SELECT COUNT(*) AS numberOfOther FROM attendance INNER JOIN student ON attendance.student_id = student.student_id WHERE MONTH(dates) = ? AND student.class_id = ? AND attendance.attend_status = 'Other'";

	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_STUDENT_CLASS_DATA');
		       window.location.href='class.php';
		       </script>";
    } else {
    	 mysqli_stmt_bind_param($result, "ii", $month, $class_id);
    	mysqli_stmt_execute($result);
    	$resultl = mysqli_stmt_get_result($result);
    	return $resultl;
    }

}



function countTotalAttendanceByMonthAndClass($class_id, $month){
	require 'connectDB.php';

	$sql = "SELECT COUNT(*) AS numberOfAttendaceStudent FROM attendance INNER JOIN student ON attendance.student_id = student.student_id WHERE MONTH(dates) = ? AND student.class_id = ?";

	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_STUDENT_CLASS_DATA');
		       window.location.href='class.php';
		       </script>";
    } else {
    	mysqli_stmt_bind_param($result, "ii", $month, $class_id);
    	mysqli_stmt_execute($result);
    	$resultl = mysqli_stmt_get_result($result);
    	return $resultl;
    }
}

function updateMC($attendance_img) {
	require 'connectDB.php';

	$sql = "UPDATE attendance SET attendance_img = ? WHERE  attendance_id = ?";
	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_IMG_DATA');
		       window.location.href='teacherstudattend.php';
		       </script>";
    } else {
 $attendance_id= 49;
 		mysqli_stmt_bind_param($result, "bi", $attendance_img, $attendance_id);
    	mysqli_stmt_execute($result);
    	 echo "<script>alert('SUCCESSS!!!');
		       window.location.href='teacherstudattend.php';
		       </script>";
    }
}




function getTeacherID($class_id){
	require 'connectDB.php';

	$sql = "SELECT * FROM teacher WHERE class_id = ?";

	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_SELECT_TEACHER_DATA');
		       window.location.href='registerteacher.php';
		       </script>";
    } else {

 		mysqli_stmt_bind_param($result, "i", $class_id);
    	mysqli_stmt_execute($result);
    	$resultl = mysqli_stmt_get_result($result);
    	return $resultl;
    }
}




 ?>








