<?php include "../resources/php/sql.php"; session_start();?>

<?php 
if(isset($_GET['cart'])) {
	$week = $_GET['week'];
	$class_id = $_SESSION['class_id'];

	if ($week === "0") {
		$data = array(
		array("Attend", "120", "240", 0),
		array("Attend Late", "120", "240", 0),
		array("Absent", "120", "240", 0),
		array("Medical Leave", "120", "240", 0),
		array("Other", "120", "240", 0)
	);
	} else {
		$week = (int) $week;


		// Count attendance by month
		$result0 = countTotalAttendanceByWeekByClass($week, $class_id);
		$row0 = mysqli_fetch_assoc($result0);
		$totalAttendance = $row0['totalAttendance'];


		// Attend by month
		$result = countAttendByWeekByClass($week, $class_id);
		$row = mysqli_fetch_assoc($result);
		if (empty($row['totalAttend'])) {
			$totalAttend = 0;
		} else {
			$totalAttend = $row['totalAttend'];
		}



		// Attend Late by month
		$result2 = countAttendLateByWeekByClass($week, $class_id);
		$row2 = mysqli_fetch_assoc($result2);
		if (empty($row2['totalAttendLate'])) {
			$totalAttendLate = 0;
		} else {
			$totalAttendLate = $row2['totalAttendLate'];
		}
		


		// Attend Late by month
		$result3 = countAbsentByWeekByClass($week, $class_id);
		$row3 = mysqli_fetch_assoc($result3);
		if (empty($row3['totalAbsent'])) {
			$totalAbsent = 0;
		} else {
			$totalAbsent = $row3['totalAbsent'];
		}


		// Medical Leave Late by month
		$result4 = countMedicalLeaveByWeekByClass($week, $class_id);
		$row4 = mysqli_fetch_assoc($result4);
		if (empty($row4['totalMedicalLeave'])) {
			$totalMedicalLeave = 0;
		} else {
			$totalMedicalLeave = $row4['totalMedicalLeave'];
		}
		


		// Other Late by month
		$result5 = countOtherByWeekByClass($week, $class_id);
		$row5 = mysqli_fetch_assoc($result5);
		if (empty($row5['totalOther'])) {
			$totalOther = 0;
		} else {
			$totalOther = $row5['totalOther'];
		}
		




		$data = array(
		array("Attend", "120", "240", $totalAttend),
		array("Attend Late", "120", "240", $totalAttendLate),
		array("Absent", "120", "240", $totalAbsent),
		array("Medical Leave", "120", "240", $totalMedicalLeave),
		array("Other", "120", "240", $totalOther)
	);
	}
	

	echo json_encode($data);
}
?>