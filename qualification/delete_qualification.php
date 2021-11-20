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
    $sqlunlink = mysqli_query($con,"SELECT certificate FROM qualification WHERE q_id=".$id);
			while($row = mysqli_fetch_array($sqlunlink)){ 		
			$file = $row["certificate"];		
			// $pic1 = ("../$file");
				if (file_exists($file)) {
				unlink($file);
				}
			}
	
	$del_qualification="DELETE FROM qualification WHERE q_id=".$id;
	if(mysqli_query($con,$del_qualification)){
        mysqli_close($con);
            ?>
            <script type="text/javascript">
                alert("Data Deleted Successfully");
                window.location.href = "../qualifications.php";
            </script>
            <?php
    }
?>