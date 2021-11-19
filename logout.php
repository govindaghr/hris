<?php  
	session_start();
	$usr="";
	if(isset($_SESSION["emp_id"]) AND $_SESSION["emp_id"]<>""){
		$usr=$_SESSION["emp_id"];
	}
	if (isset($_SESSION['emp_id'])) {
	unset($_SESSION['emp_id']);
	}
	if (isset($_SESSION['acl'])) {
	unset($_SESSION['acl']);
	}
	//session_destroy();
	//session_unset();
	header("location:login.php");
?>