<?php
	//Start session
	session_start();
	//Check whether the session variable SESS_MEMBER_ID is present or not
	if(!isset($_SESSION['emp_id']) || (trim($_SESSION['emp_id']) == '')) {
		header("location:".$_SERVER['DOCUMENT_ROOT']."/hris/login.php");
		exit();
	} 
	require_once('../include/connection.php');
    
		$emp_id=mysqli_real_escape_string($con,$_REQUEST["empid"]);
		$nominated_for=mysqli_real_escape_string($con,$_REQUEST["nominated_for"]);
		$start_date=mysqli_real_escape_string($con,$_REQUEST["start_date"]);
		$end_date=mysqli_real_escape_string($con,$_REQUEST["end_date"]);
		$remarks=mysqli_real_escape_string($con,$_REQUEST["remarks"]);

        $nominated_by = $_SESSION['emp_id'];
        $nomination_date = date('Y-m-d');


		$qry="INSERT INTO `staff_release`(`empid`, `nominated_for`, `start_date`, `end_date`, `nomination_date`, `nominated_by`, `remarks`) VALUES  ('".$emp_id."', '".$nominated_for."', '".$start_date."', '".$end_date."', '".$nomination_date."', '".$nominated_by."', '".$remarks."')";
		
		if(mysqli_query($con,$qry)){
			mysqli_close($con);
            ?>
            <script type="text/javascript">
                alert("Data Saved Successfully");
                window.location.href = "../add_release_request.php?id=<?=$emp_id;?>";
            </script>
            <?php
		}
		
		else{	
			echo('<div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert">&times;</button>Posts Addition Failed.</div>'); 
		}
		 
?>