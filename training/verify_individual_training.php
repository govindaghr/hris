<?php
//Start session
session_start();
//Check whether the session variable SESS_MEMBER_ID is present or not
if(!isset($_SESSION['emp_id']) || (trim($_SESSION['emp_id']) == '')) {
    header("location:".$_SERVER['DOCUMENT_ROOT']."/hris/login.php");
    exit();
} 
require_once('../include/connection.php');
$id=$_GET['id'];
	
	$del_training="UPDATE training SET `verification_status`='1' WHERE tr_id=".$id;
	if(mysqli_query($con,$del_training)){
        mysqli_close($con);
            ?>
            <script type="text/javascript">
                alert("Training Verified Successfully");
                window.location.href = "../verify_trainings.php";
            </script>
            <?php
    }
?>