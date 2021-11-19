<?php
	//Start session
	session_start();
	//Check whether the session variable SESS_MEMBER_ID is present or not
	if(!isset($_SESSION['emp_id']) || (trim($_SESSION['emp_id']) == '')) {
		header("location:".$_SERVER['DOCUMENT_ROOT']."/hris/login.php");
		exit();
	} 
	require_once('../include/connection.php');
    // `tr_id`, `course_title`, `start_date`, `end_date`, `emp_id`, `funding_source`, `remarks`
	
		$emp_id=mysqli_real_escape_string($con,$_REQUEST["emp_id"]);
		$course_title=mysqli_real_escape_string($con,$_REQUEST["course_title"]);
		$funding_source=mysqli_real_escape_string($con,$_REQUEST["funding_source"]);
		$start_date=mysqli_real_escape_string($con,$_REQUEST["start_date"]);
		$end_date=mysqli_real_escape_string($con,$_REQUEST["end_date"]);
		$remarks=mysqli_real_escape_string($con,$_REQUEST["remarks"]);
		
		$qry="INSERT INTO `training`(`emp_id`, `course_title`, `funding_source`, `start_date`, `end_date`, `remarks`) VALUES('".$emp_id."', '".$course_title."', '".$funding_source."', '".$start_date."', '".$end_date."', '".$remarks."')";
		
		if(mysqli_query($con,$qry)){
			mysqli_close($con);
            ?>
            <script type="text/javascript">
                alert("Data Saved Successfully");
                window.location.href = "../trainings.php";
            </script>
            <?php
		}
		
		else{	
			echo('<div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert">&times;</button>Posts Addition Failed.</div>'); 
		}
		 
?>