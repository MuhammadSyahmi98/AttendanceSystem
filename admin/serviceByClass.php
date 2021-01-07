<?php include "../resources/php/sql.php"; session_start();?>

<?php 
if(isset($_GET['carts'])) {
	$month = $_GET['month'];
	$class_id = $_SESSION['class_id'];

	if ($month === "0") {
		$data = array(
		array("Attend", "120", "240", 0),
		array("Attend Late", "120", "240", 0),
		array("Absent", "120", "240", 0),
		array("Medical Leave", "120", "240", 0),
		array("Other", "120", "240", 0)
	);
	} else {
		$month1 = (int) $month;
		$class_id = (int) $class_id;



		// Count attendance by month
		$result0 = countTotalAttendanceByMonthByClass($month1, $class_id);
		$row0 = mysqli_fetch_assoc($result0);
		$totalAttendance = $row0['totalAttendance'];


		// Attend by month
		$result = countAttendByMonthByClass($month1, $class_id);
		$row = mysqli_fetch_assoc($result);
		if (empty($row['totalAttend'])) {
			$totalAttend = 0;
		} else {
			$totalAttend = $row['totalAttend'];
		}



		// Attend Late by month
		$result2 = countAttendLateByMonthByClass($month1, $class_id);
		$row2 = mysqli_fetch_assoc($result2);
		if (empty($row2['totalAttendLate'])) {
			$totalAttendLate = 0;
		} else {
			$totalAttendLate = $row2['totalAttendLate'];
		}
		


		// Attend Late by month
		$result3 = countAbsentByMonthByClass($month1, $class_id);
		$row3 = mysqli_fetch_assoc($result3);
		if (empty($row3['totalAbsent'])) {
			$totalAbsent = 0;
		} else {
			$totalAbsent = $row3['totalAbsent'];
		}


		// Medical Leave Late by month
		$result4 = countMedicalLeaveByMonthByClass($month1, $class_id);
		$row4 = mysqli_fetch_assoc($result4);
		if (empty($row4['totalMedicalLeave'])) {
			$totalMedicalLeave = 0;
		} else {
			$totalMedicalLeave = $row4['totalMedicalLeave'];
		}
		


		// Other Late by month
		$result5 = countOtherByMonthByClass($month1, $class_id);
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