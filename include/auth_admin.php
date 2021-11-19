<?php
	if(!isset($_SESSION['acl']) || (trim($_SESSION['acl']) != 1) || !isset($_SESSION['emp_id']) || (trim($_SESSION['emp_id']) == '')) {
		session_write_close();
		
		header("location:./login.php");
		exit();
	}
?>