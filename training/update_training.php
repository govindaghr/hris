<?php
	//Start session
	session_start();
	//Check whether the session variable SESS_MEMBER_ID is present or not
	if(!isset($_SESSION['emp_id']) || (trim($_SESSION['emp_id']) == '')) {
		header("location:".$_SERVER['DOCUMENT_ROOT']."/hris/login.php");
		exit();
	} 
	require_once('../include/connection.php');
	
    $tr_id=mysqli_real_escape_string($con,$_REQUEST["tr_id"]);
    $emp_id=mysqli_real_escape_string($con,$_REQUEST["emp_id"]);
    $course_title=mysqli_real_escape_string($con,$_REQUEST["course_title"]);
    $funding_source=mysqli_real_escape_string($con,$_REQUEST["funding_source"]);
    $start_date=mysqli_real_escape_string($con,$_REQUEST["start_date"]);
    $end_date=mysqli_real_escape_string($con,$_REQUEST["end_date"]);
    $remarks=mysqli_real_escape_string($con,$_REQUEST["remarks"]);
		
		$qry="UPDATE `training` SET `course_title`='".$course_title."', `funding_source`='".$funding_source."', `start_date`='".$start_date."', `end_date`='".$end_date."', `remarks`='".$remarks."' WHERE `tr_id`='".$tr_id."'";

        if(mysqli_query($con,$qry)){
			mysqli_close($con);
            ?>
            <script type="text/javascript">
                alert("Data Updated Successfully");
                window.location.href = "../trainings.php";
            </script>
            <?php
		}
		
		else{	
			echo('<div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert">&times;</button>Posts Addition Failed.</div>'); 
		}
		 
?>