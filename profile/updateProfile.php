<?php
	//Start session
	session_start();
	//Check whether the session variable SESS_MEMBER_ID is present or not
	if(!isset($_SESSION['emp_id']) || (trim($_SESSION['emp_id']) == '')) {
		header("location:../login.php");
		exit();
	} 
	require_once('../include/connection.php');
	// $emp_id=$_SESSION['emp_id'];
	
		$emp_id=mysqli_real_escape_string($con,$_REQUEST["emp_id"]);
		$cid=mysqli_real_escape_string($con,$_REQUEST["cid"]);		
		$name=mysqli_real_escape_string($con,$_REQUEST["name"]);
		$gender=mysqli_real_escape_string($con,$_REQUEST["gender"]);
		$dob=mysqli_real_escape_string($con,$_REQUEST["dob"]);		
		$email=mysqli_real_escape_string($con,$_REQUEST["email"]);
		$phone_no=mysqli_real_escape_string($con,$_REQUEST["phone_no"]);
		$designation=mysqli_real_escape_string($con,$_REQUEST["designation"]);
		$position=mysqli_real_escape_string($con,$_REQUEST["position"]);
		$department=mysqli_real_escape_string($con,$_REQUEST["department"]);
		$nationality=mysqli_real_escape_string($con,$_REQUEST["nationality"]);
		$address=mysqli_real_escape_string($con,$_REQUEST["address"]);
		
		$qry="UPDATE `employee` SET `cid`='".$cid."', `name`='".$name."', `gender`='".$gender."', `dob`='".$dob."', `email`='".$email."', `mobile`='".$phone_no."', `designation`='".$designation."', `department`='".$department."', `nationality`='".$nationality."', `address`='".$address."', `position_level`='".$position."' WHERE employee_id='".$emp_id."'";
		
		if(mysqli_query($con,$qry)){			
			mysqli_close($con);
            ?>
            <script type="text/javascript">
                alert("Data Updated Successfully");
                window.location.href = "../edit_profile.php";
            </script>
            <?php
		}
		
		else{	
			echo('<div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert">&times;</button>Posts Addition Failed.</div>'); 
		}
		 
?>