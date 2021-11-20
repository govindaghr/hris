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
		$course_title=mysqli_real_escape_string($con,$_REQUEST["course_title"]);		
		$qualification_level=mysqli_real_escape_string($con,$_REQUEST["qualification_level"]);
		$funding_source=mysqli_real_escape_string($con,$_REQUEST["funding_source"]);
		$country=mysqli_real_escape_string($con,$_REQUEST["country"]);		
		$college=mysqli_real_escape_string($con,$_REQUEST["college"]);		
		// $certificate=mysqli_real_escape_string($con,$_REQUEST["certificate"]);
		$start_date=mysqli_real_escape_string($con,$_REQUEST["start_date"]);
		$end_date=mysqli_real_escape_string($con,$_REQUEST["end_date"]);
		$remarks=mysqli_real_escape_string($con,$_REQUEST["remarks"]);
		
		$qry="INSERT INTO `qualification`(`emp_id`, `course_title`, `qualification_level`, `funding_source`, `country`, `college`, `start_date`, `end_date`, `remarks`) VALUES('".$emp_id."', '".$course_title."', '".$qualification_level."', '".$funding_source."', '".$country."', '".$college."', '".$start_date."', '".$end_date."', '".$remarks."')";
		
		if(mysqli_query($con,$qry)){
            $id = mysqli_insert_id($con);
            $date = new DateTime();
			$rd2 = date_timestamp_get($date);
	        if((!empty($_FILES["certificate"])) && ($_FILES['certificate']['error'] == 0)) {
				$ext = pathinfo($_FILES["certificate"]["name"])['extension'];
				// if ($ext == "pdf") 
				// {
					$upload_loc="../uploads/qualification/".$rd2.".".$ext;
                    $upload_dir="./uploads/qualification/".$rd2.".".$ext;
					//Attempt to move the uploaded file to it's new place
					if ((move_uploaded_file($_FILES['certificate']['tmp_name'],$upload_loc))) {
						$qry=("UPDATE qualification SET certificate='".$upload_dir."' WHERE q_id='".$id."'");//emp_id='".$emp_id."' AND qualification_level='".$qualification_level."'
						mysqli_query($con,$qry);
					}
                // }
            }
            
			mysqli_close($con);
            ?>
            <script type="text/javascript">
                alert("Data Saved Successfully");
                window.location.href = "../qualifications.php";
            </script>
            <?php
		}
		
		else{	
			echo('<div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert">&times;</button>Posts Addition Failed.</div>'); 
		}
		 
?>