<?php 
if(isset($_GET['cart'])) {
	$month = $_GET['month'];

	// Buat sql kat sini

	if ($month === "0") {
		$data = array(
		array(),
		array(),
		array(),
		array(),
		array()
	);
	} else {
		$data = array(
		array("Attend", "120", "240", 40),
		array("Attend Late", "120", "240", 20),
		array("Absent", "120", "240", 60),
		array("Medical Leave", "120", "240", 80),
		array("Other", "120", "240", 10)
	);
	}
	

	echo json_encode($data);
}
?>