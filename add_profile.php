<?php
	//Start session
	session_start();
	//Check whether the session variable SESS_MEMBER_ID is present or not
	if(!isset($_SESSION['emp_id']) || (trim($_SESSION['emp_id']) == '')) {

		header("location:./login.php");
		exit();
	}
    include('./include/connection.php');
    	
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Human Resource Information System</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-lg-6">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Add Biodata</h1>
                                    </div>
                                    <hr>

                                    <form class="user needs-validation" novalidate action = "./profile/saveProfile.php" method = "POST">
                                        <div class="mb-3 row">
                                            <label for="empid" class="col-sm-4 col-form-label">Employee ID</label>
                                            <div class="col-sm-8">
                                            <input type="text" name="emp_id" id="empid" class="form-control-plaintext"  value="<?php echo $_SESSION['emp_id']; ?>" readonly>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="cid" class="form-label">CID</label>
                                            <input type="Number" name="cid" id="cid" class="form-control" required >
                                        </div>

                                        <div class="form-group">
                                            <label for="name" class="form-label">Name</label>
                                            <input type="Text" name="name" id="name" class="form-control" required >
                                        </div>

                                        <div class="form-group">
                                            <label for="gender" class="form-label">Gender</label>
                                            <select class="form-select form-control" name="gender" id="gender" aria-label="Select DeGendersignation" required >
                                                <option value="" selected>Select</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="dob" class="form-label">Date of Birth</label>
                                            <input type="date" name="dob" id="dob" class="form-control" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" name="email" id="email" class="form-control" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="phone_no" class="form-label">Phone No.</label>
                                            <input type="Number" name="phone_no" id="phone_no" class="form-control" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="designation" class="form-label">Designation</label>
                                            <select class="form-select form-control" name="designation" id="designation" aria-label="Select Designation" required >
                                                <option value="" selected>Select</option>
                                                <?php

                                                    $designation=mysqli_query($con,"SELECT desig_id, desig_name FROM designation");
                                                    while(list($desig_id,$desig)=mysqli_fetch_row($designation)){                                                        
                                                            echo '<option value="'.$desig_id.'">'.$desig.'</option>';			
                                                    }
                                                ?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="position" class="form-label">Position Level</label>
                                            <select class="form-select form-control" name="position" id="position" aria-label="Select Position level" required >
                                                <option value="" selected>Select</option>
                                                <?php
                                                    $position_level=mysqli_query($con,"SELECT pos_id, pos_name FROM position_level");
                                                    while(list($pos_id, $pos_name)=mysqli_fetch_row($position_level)){                                                        
                                                            echo '<option value="'.$pos_id.'">'.$pos_name.'</option>';			
                                                    }
                                                ?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="department" class="form-label">Department</label>
                                            <select class="form-select form-control" name="department" id="department" aria-label="Select department" required >
                                                <option value="" selected>Select</option>
                                                <?php
                                                    $dept=mysqli_query($con,"SELECT dept_id, dept_name FROM department");
                                                    while(list($dept_id,$dept_name)=mysqli_fetch_row($dept)){                                                         
                                                            echo '<option value="'.$dept_id.'">'.$dept_name.'</option>';			
                                                    }
                                                ?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="nationality" class="form-label">Nationality</label>
                                            <select class="form-select form-control" name="nationality" id="nationality" aria-label="Select DeGendersignation" required >
                                                <option value="Bhutanese" selected>Bhutanese</option>
                                                <option value="Foreigner">Foreigner</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="address" class="form-label">Address</label>
                                            <textarea class="form-control" name="address" id="address" rows="2" required></textarea>
                                        </div>

                                        <button type="submit" class="btn btn-primary btn-user btn-block">Save</button>


                                        <hr>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function () {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
            })
        })()
</script>

</body>

</html>