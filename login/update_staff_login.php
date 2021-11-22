<?php
	//Start session
	session_start();
	//Check whether the session variable SESS_MEMBER_ID is present or not
	if(!isset($_SESSION['emp_id']) || (trim($_SESSION['emp_id']) == '')) {
		header("location:".$_SERVER['DOCUMENT_ROOT']."/hris/login.php");
		exit();
	} 
	require_once('../include/connection.php');
	
		$emp_id=mysqli_real_escape_string($con,$_REQUEST["emp_id"]);
		$access_level=mysqli_real_escape_string($con,$_REQUEST["access_level"]);
		$status=mysqli_real_escape_string($con,$_REQUEST["status"]);

		$qry="UPDATE `login` SET `access_level`='".$access_level."', `status`='".$status."' WHERE `emp_id`='".$emp_id."'";
		
		if(mysqli_query($con,$qry)){
			mysqli_close($con);
            ?>
            <script type="text/javascript">
                alert("Data Updated Successfully");
                window.location.href = "../staff_login.php";
            </script>
            <?php
		}
		
		else{	
			echo('<div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert">&times;</button>Posts Addition Failed.</div>'); 
		}
		 
?>