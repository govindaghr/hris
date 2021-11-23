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
		$fiscal_yr=mysqli_real_escape_string($con,$_REQUEST["fiscal_yr"]);
		$rating=mysqli_real_escape_string($con,$_REQUEST["rating"]);
		$remarks=mysqli_real_escape_string($con,$_REQUEST["remarks"]);

        $sql = mysqli_query($con,"SELECT emp_id FROM performance_rating WHERE emp_id = '".$emp_id."' AND fiscal_yr='".$fiscal_yr."'");
        $count = mysqli_num_rows($sql);
        if($count >= 1){
            ?>
            <script type="text/javascript">
                alert("Employee Rating Already Added");
                window.location.href = "../add_performance_rating.php?id=<?=$emp_id;?>";
            </script>
            <?php
            exit();
        }

		$qry="INSERT INTO `performance_rating`(`emp_id`, `fiscal_yr`, `rating`, `remarks`) VALUES ('".$emp_id."', '".$fiscal_yr."', '".$rating."', '".$remarks."')";
		
		if(mysqli_query($con,$qry)){
			mysqli_close($con);
            ?>
            <script type="text/javascript">
                alert("Data Saved Successfully");
                window.location.href = "../add_performance_rating.php?id=<?=$emp_id;?>";
            </script>
            <?php
		}
		
		else{	
			echo('<div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert">&times;</button>Posts Addition Failed.</div>'); 
		}
		 
?>