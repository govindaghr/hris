<?php
include('./include/header.php');

$qry=mysqli_query($con,"SELECT `employee_id`, `cid`, `name`, `gender`, `dob`, `email`, `mobile`, `designation`, `department`, `nationality`, `address`, `service_status`, `position_level` FROM `employee` WHERE employee_id='".$emp_id."'");
list($employee_id, $cid, $name, $gender, $dob, $email, $mobile, $designation, $department, $nationality, $address, $service_status, $position_level)=mysqli_fetch_row($qry);
?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <!-- <div class="text-center">
                        <h1 class="h3 mb-0 text-gray-800">Biodata</h1>
                    </div> -->

                    <!-- Content Row -->
                    <div class="row justify-content-center">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-6 col-md-6 mb-4  bg-white">
                            <div class="p-5">
                                <!-- Page Heading -->
                                <div class="text-center">
                                    <h1 class="h3 mb-0 text-gray-800">Biodata</h1>
                                </div>
                                <hr>

                                <form class="user needs-validation" novalidate action = "./profile/updateProfile.php" method = "POST">
                                    <div class="mb-3 row">
                                        <label for="empid" class="col-sm-4 col-form-label">Employee ID</label>
                                        <div class="col-sm-8">
                                        <input type="text" name="emp_id" id="empid" class="form-control-plaintext"  value="<?= $_SESSION['emp_id']; ?>" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="cid" class="form-label">CID</label>
                                        <input type="Number" name="cid" id="cid" class="form-control" value="<?=$cid; ?>" required >
                                    </div>

                                    <div class="form-group">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="Text" name="name" id="name" class="form-control" value="<?=$name; ?>" required >
                                    </div>

                                    <div class="form-group">
                                        <label for="gender" class="form-label">Gender</label>
                                        <select class="form-select form-control" name="gender" id="gender" aria-label="Select DeGendersignation" required >
                                            <option value="<?=$gender; ?>" selected><?=$gender; ?></option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="dob" class="form-label">Date of Birth</label>
                                        <input type="date" name="dob" id="dob" class="form-control" value="<?=$dob; ?>" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" name="email" id="email" class="form-control" value="<?=$email; ?>" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="phone_no" class="form-label">Phone No.</label>
                                        <input type="Number" name="phone_no" id="phone_no" class="form-control" value="<?=$mobile; ?>" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="designation" class="form-label">Designation</label>
                                        <select class="form-select form-control" name="designation" id="designation" aria-label="Select Designation" required >
                                            <?php
                                            list($desig_name)=mysqli_fetch_row(mysqli_query($con,"SELECT desig_name FROM designation WHERE desig_id = $designation"))
                                            ?>
                                            <option value="<?=$designation; ?>" selected><?=$desig_name; ?></option>
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
                                            <?php
                                            list($desig_name)=mysqli_fetch_row(mysqli_query($con,"SELECT pos_name FROM position_level WHERE pos_id = $position_level"))
                                            ?>
                                            <option value="<?=$position_level; ?>" selected><?=$desig_name;?></option>
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
                                            <?php
                                            list($dept)=mysqli_fetch_row(mysqli_query($con,"SELECT dept_name FROM department WHERE  dept_id= $department"))
                                            ?>
                                            <option value="<?=$department;?>" selected><?=$dept;?></option>
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
                                        <option value="<?=$nationality;?>" selected><?=$nationality;?></option>    
                                        <option value="Bhutanese" selected>Bhutanese</option>
                                            <option value="Foreigner">Foreigner</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="address" class="form-label">Address</label>
                                        <textarea class="form-control" name="address" id="address" rows="2" required><?=$address; ?></textarea>
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-user btn-block">Update</button>


                                    <hr>
                                </form>
                            </div>
                        </div>
                        
                    </div>
                    <!-- Content Row -->

                </div>
                <!-- /.container-fluid -->

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

<?php
include('./include/footer.php');
?>
