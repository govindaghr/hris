<?php
	//Start session
	session_start();
	// $path=$_SERVER['DOCUMENT_ROOT']."/hris";
	//Check whether the session variable SESS_MEMBER_ID is present or not
	if(!isset($_SESSION['emp_id']) || (trim($_SESSION['emp_id']) == '')) {
		// echo $path."/login.php";
		header("location:./login.php");
		exit();
	}
	else {
		include('./include/connection.php');
		$username = $_SESSION['emp_id'];
		$sql = "SELECT employee_id FROM employee WHERE employee_id = $username ";
    	$result = mysqli_query($con, $sql);
		// $row = mysqli_fetch_assoc($result);
		// echo $row['employee_id'];
    	$count = mysqli_num_rows($result);
		if($count <= 0){
			header("location:./add_profile.php");
			exit();
		}
	}
	
?>