<?php
	//Start session
	session_start();
	//Check whether the session variable SESS_MEMBER_ID is present or not
	if(!isset($_SESSION['emp_id']) || (trim($_SESSION['emp_id']) == '')) {
		header("location:".$_SERVER['DOCUMENT_ROOT']."/hris/login.php");
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
		
		$qry="INSERT INTO `employee` (`employee_id`, `cid`, `name`, `gender`, `dob`, `email`, `mobile`, `designation`, `department`, `nationality`, `address`, `service_status`, `position_level`) VALUES('".$emp_id."', '".$cid."', '".$name."', '".$gender."', '".$dob."', '".$email."', '".$phone_no."', '".$designation."', '".$department."', '".$nationality."', '".$address."', '1', '".$position."')";
		
		if(mysqli_query($con,$qry)){			
			mysqli_close($con);
            ?>
            <script type="text/javascript">
                alert("Data Saved Successfully");
                window.location.href = "<?=$path; ?>/index.php";
            </script>
            <?php
		}
		
		else{	
			echo('<div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert">&times;</button>Posts Addition Failed.</div>'); 
		}
		 
?>