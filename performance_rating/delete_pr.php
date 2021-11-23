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
$emp_id=$_GET['emp_id'];
	$del_qry="DELETE FROM performance_rating WHERE pr_id=".$id;
	if(mysqli_query($con,$del_qry)){
        mysqli_close($con);
            ?>
            <script type="text/javascript">
                alert("Data Deleted Successfully");
                window.location.href = "../add_performance_rating.php?id=<?=$emp_id;?>";
            </script>
            <?php
    }
?>