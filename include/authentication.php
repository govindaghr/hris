<?php      
    ob_start();
	session_start();
	$errmsg_arr = array();
    include('connection.php');  
    $username = $_POST['user'];  
    $password = $_POST['pass'];  
      
    //to prevent from mysqli injection  
    $username = stripcslashes($username);  
    $password = stripcslashes($password);  
    $username = mysqli_real_escape_string($con, $username);  
    $password = mysqli_real_escape_string($con, $password);
    $sql = "SELECT emp_id, access_level FROM login WHERE emp_id = '$username' and password = '".sha1($password)."' AND status=1";
    $result = mysqli_query($con, $sql);
    // $row1 = mysqli_fetch_array($result, MYSQLI_ASSOC);  
    $count = mysqli_num_rows($result);
        
    if($count >= 1){ 
        $last_login = "UPDATE login SET last_login=now() WHERE emp_id='".$username."'";
        mysqli_query($con, $last_login);

        session_regenerate_id();
        $row = mysqli_fetch_assoc($result);	
        $_SESSION['emp_id'] = $row['emp_id'];
        $_SESSION['acl'] = $row['access_level'];
        session_write_close();
        header("location: ../index.php");
        exit();
    }  
    else{
        $errmsg_arr[] = 'User Credentials Invalid';
        $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
        session_write_close();
        header("location: ../login.php");
        exit();
    }

    mysqli_free_result($result);
    mysqli_close($con);
?> 