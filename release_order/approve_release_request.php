<?php
	//Start session
	session_start();
	//Check whether the session variable SESS_MEMBER_ID is present or not
	if(!isset($_SESSION['emp_id']) || (trim($_SESSION['emp_id']) == '')) {
		header("location:".$_SERVER['DOCUMENT_ROOT']."/hris/login.php");
		exit();
	} 
	require_once('../include/connection.php');
    $sr_id=$_GET['id'];
    $approved_by=$_SESSION['emp_id'];
    $approval_status="Approved";
    $date_approved = date('Y-m-d');
    // `nominated_by`='[value-7]',`date_approved`='[value-8]',`approved_by`='[value-9]',`approval_status`='[value-10]'
		
		$qry="UPDATE `staff_release` SET `approved_by`='".$approved_by."', `approval_status`='".$approval_status."', `date_approved`='".$date_approved."' WHERE `sr_id`='".$sr_id."'";

        if(mysqli_query($con,$qry)){
			mysqli_close($con);
            ?>
            <script type="text/javascript">
                alert("Data Updated Successfully");
                window.location.href = "../release_order.php";
            </script>
            <?php
		}
		
		else{	
			echo('<div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert">&times;</button>Posts Addition Failed.</div>'); 
		}
		 
?>