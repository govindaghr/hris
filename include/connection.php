<?php
    date_default_timezone_set('Asia/Dhaka');      
    $host = "localhost";  
    $user = "root";  
    $password = '';  
    $db_name = "hris";  
      
    $con = mysqli_connect($host, $user, $password, $db_name);  
    if(mysqli_connect_errno()) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
    }
    $path = $_SERVER['DOCUMENT_ROOT']."/hris";
?>  