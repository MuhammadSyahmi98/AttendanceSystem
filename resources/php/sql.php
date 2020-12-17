<?php

// Record Holiday Date
function addDate($type, $description, $new_date_start, $new_date_end){
	require '/../../connectDB.php';

	// Check database if the date or description already been added
	$sql = "SELECT * FROM holiday_date WHERE holiday_description = ? || (holiday_start = ? && holiday_end = ?)";
	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_DATE_DATA');
		        window.location.href='date.php';
		        </script>";
    } else { 
		mysqli_stmt_bind_param($result, "sss", $description, $new_date_start, $new_date_end);
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
	require '/../../connectDB.php';

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

// Record Student Details
function addStudent($student_id, $student_name, $student_ic, $parent_name, $parent_email, $parent_contact, $class_id){
	require '/../../connectDB.php';

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
        	$sql = "INSERT INTO student (student_id, student_name, student_ic, parent_name, parent_email, parent_contact, class_id) VALUES (?,?,?,?,?, ?,?)";

        	$result = mysqli_stmt_init($conn);
			if (!mysqli_stmt_prepare($result, $sql)) {
				echo "<script>alert('SQL_Error_INSERT_STUDENT_DATA');
		         
		        </script>";
		    }
		    else {
				// Execute the sql statement
		        mysqli_stmt_bind_param($result, 'ssssssi' , $student_id, $student_name, $student_ic, $parent_name, $parent_email, $parent_contact, $class_id);
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


function addTeacher($teacher_name, $teacher_email, $teacher_contact, $password_1, $class_id) {
	require '/../../connectDB.php';

	$sql = "SELECT * FROM teacher WHERE teacher_name = ?";
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_SEARCH_TEACHER_DATA');
		        window.location.href='studentlist.php';
		        </script>";
    } 
    else { 
    	mysqli_stmt_bind_param($result, "s", $teacher_name);
        mysqli_stmt_execute($result);
        $resultl = mysqli_stmt_get_result($result);

        // If the details not redundent
        if (!$row = mysqli_fetch_assoc($resultl)){

        	$sql = "INSERT INTO teacher (teacher_name,teacher_email, teacher_contact, teacher_password, class_id) VALUES (?,?,?,?,?)";

        	$result = mysqli_stmt_init($conn);
			if (!mysqli_stmt_prepare($result, $sql)) {
				echo "<script>alert('SQL_Error_INSERT_TEACHER_DATA');
		         
		        </script>";
		    }
		    else {
				// Execute the sql statement
		        mysqli_stmt_bind_param($result, 'ssssi' , $teacher_name, $teacher_email, $teacher_contact,$password_1, $class_id);
		        mysqli_stmt_execute($result);
		        echo "<script>alert('Success Add New Teacher');
		        window.location.href='adminteacher.php';
		        </script>";
		    }
		}
    }


}




function displayHoliday(){
	require '/../../connectDB.php';

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
	require '/../../connectDB.php';
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



function displayClass() {
	require '/../../connectDB.php';

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
	require '/../../connectDB.php';
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
	require '/../../connectDB.php';
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


function displayStudentByClass($class_id) {
	require '/../../connectDB.php';

	$sql = "SELECT * FROM student WHERE class_id = ?";

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
	require '/../../connectDB.php';
	$sql = "SELECT * FROM student WHERE student_id = ?";

	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_STUDENT_DATA_BY_ID');
		        window.location.href='class.php';
		        </script>";
    } else { 
    	mysqli_stmt_bind_param($result, "i", $student_id);
        mysqli_stmt_execute($result);
        $resultl = mysqli_stmt_get_result($result);
        return $resultl;
	}

}




function displayAvailableClass() {
	require '/../../connectDB.php';

	$sql = "SELECT * FROM class LEFT JOIN teacher ON class.class_id = teacher.class_id WHERE teacher_name IS NULL ORDER BY class.class_name";

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
	require '/../../connectDB.php';

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
	require '/../../connectDB.php';

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
	require '/../../connectDB.php';

	$sql = "SELECT * FROM teacher LEFT JOIN class ON teacher.class_id = class.class_id";

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
	require '/../../connectDB.php';
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
	require '/../../connectDB.php';
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
	require '/../../connectDB.php';
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


function updateTeacherEmpty($teacher_id, $teacher_name, $teacher_email, $teacher_contact) {
	require '/../../connectDB.php';

	$sql = "UPDATE teacher SET teacher_name = ? , teacher_email = ?, teacher_contact = ?, class_id = NULL WHERE teacher_id = ?";
	// Connection to database
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_UPDATE_CLASS2_DATA');
		        window.location.href='class.php';
		        </script>";
    } else { 
    	mysqli_stmt_bind_param($result, "sssi", $teacher_name, $teacher_email, $teacher_contact, $teacher_id);
        mysqli_stmt_execute($result);
        echo "<script>alert('Successfully Update Teacher');
		        window.location.href='adminteacher.php';
		        </script>";
         
	}

}



function updateTeacher($teacher_id, $teacher_name, $teacher_email, $teacher_contact, $class_id){
	require '/../../connectDB.php';

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

}







function updateClass($class_name, $teacher_id, $class_id){
	require '/../../connectDB.php';

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
	require '/../../connectDB.php';

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




// If the class dont have any teacher
function deleteClass($class_id){
	require '/../../connectDB.php';

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
	require '/../../connectDB.php';


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
	require '/../../connectDB.php';
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




?>


