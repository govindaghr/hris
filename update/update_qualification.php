<?php
	//Start session
	session_start();
	//Check whether the session variable SESS_MEMBER_ID is present or not
	if(!isset($_SESSION['emp_id']) || (trim($_SESSION['emp_id']) == '')) {
		header("location:".$_SERVER['DOCUMENT_ROOT']."/hris/login.php");
		exit();
	} 
	require_once('../include/connection.php');
	
		$q_id=mysqli_real_escape_string($con,$_REQUEST["q_id"]);
		$emp_id=mysqli_real_escape_string($con,$_REQUEST["emp_id"]);
		$course_title=mysqli_real_escape_string($con,$_REQUEST["course_title"]);		
		$qualification_level=mysqli_real_escape_string($con,$_REQUEST["qualification_level"]);
		$funding_source=mysqli_real_escape_string($con,$_REQUEST["funding_source"]);
		$country=mysqli_real_escape_string($con,$_REQUEST["country"]);		
		$college=mysqli_real_escape_string($con,$_REQUEST["college"]);		
		// $certificate=mysqli_real_escape_string($con,$_REQUEST["certificate"]);
		$start_date=mysqli_real_escape_string($con,$_REQUEST["start_date"]);
		$end_date=mysqli_real_escape_string($con,$_REQUEST["end_date"]);
		$remarks=mysqli_real_escape_string($con,$_REQUEST["remarks"]);
		
		$qry="UPDATE `qualification` SET `course_title`='".$course_title."', `qualification_level`='".$qualification_level."', `funding_source`='".$funding_source."', `country`='".$country."', `college`='".$college."', `start_date`='".$start_date."', `end_date`='".$end_date."', `remarks`='".$remarks."' WHERE q_id='".$q_id."'";

        if(mysqli_query($con,$qry)){
			mysqli_close($con);
            ?>
            <script type="text/javascript">
                alert("Data Updated Successfully");
                window.location.href = "../qualifications.php";
            </script>
            <?php
		}
		
		else{	
			echo('<div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert">&times;</button>Posts Addition Failed.</div>'); 
		}
		 
?>