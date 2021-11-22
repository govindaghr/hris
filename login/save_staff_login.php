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
		$password=mysqli_real_escape_string($con,$_REQUEST["password"]);
		$access_level=mysqli_real_escape_string($con,$_REQUEST["access_level"]);
		$status=mysqli_real_escape_string($con,$_REQUEST["status"]);

        $sql = mysqli_query($con,"SELECT emp_id, access_level FROM login WHERE emp_id = '$emp_id'");
        $count = mysqli_num_rows($sql);
        if($count >= 1){
            ?>
            <script type="text/javascript">
                alert("Employee Already Added");
                window.location.href = "../add_staff_login.php";
            </script>
            <?php
            exit();
        }

		$qry="INSERT INTO `login`(`emp_id`, `password`, `access_level`, `status`) VALUES('".$emp_id."', '".sha1($password)."', '".$access_level."', '".$status."')";
		
		if(mysqli_query($con,$qry)){
			mysqli_close($con);
            ?>
            <script type="text/javascript">
                alert("Data Saved Successfully");
                window.location.href = "../staff_login.php";
            </script>
            <?php
		}
		
		else{	
			echo('<div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert">&times;</button>Posts Addition Failed.</div>'); 
		}
		 
?>