<?php 
	require 'connectDB.php';

	$sql = ("SELECT * FROM attendance");
    $result = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($result, $sql)) {
            echo "SQL_Error_Select_device_mood";
            exit();
    } 
    else {
        mysqli_stmt_execute($result);
        $resultl = mysqli_stmt_get_result($result);
        if ($row = mysqli_fetch_assoc($resultl)){
        	$dates = $row['dates'];
        	echo "<script>alert('$dates');</script>"; 

            }
        }
    
?>

