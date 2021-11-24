<?php
include('./include/header.php');
$employee_id = $_GET['id'];
$qry=mysqli_query($con,"SELECT `employee_id`, `cid`, `name`, `gender`, `dob`, `email`, `mobile`, `designation`, `department`, `nationality`, `address`, `service_status`, `position_level` FROM `employee` WHERE employee_id='".$employee_id."'");
list($employee_id, $cid, $name, $gender, $dob, $email, $mobile, $designation, $department, $nationality, $address, $service_status, $position_level)=mysqli_fetch_row($qry);
?>

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Content Row -->
                    <div class="row justify-content-center">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-12 col-md-12  bg-white">
                            <div class="p-5">
                                <!-- Page Heading -->
                                <div class="text-center">
                                    <h1 class="h3 mb-0 text-gray-800">Biodata</h1>
                                </div>
                                <hr>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-6 bg-white">
                            <div class="p-5">
                                    <div class="form-group">
                                        <label for="emp_id" class="form-label">Employee ID</label>
                                        <input type="Number" name="emp_id" id="emp_id" class="form-control" value="<?=$employee_id; ?>" readonly >
                                    </div>

                                    <div class="form-group">
                                        <label for="cid" class="form-label">CID</label>
                                        <input type="Number" name="cid" id="cid" class="form-control" value="<?=$cid; ?>" readonly >
                                    </div>

                                    <div class="form-group">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="Text" name="name" id="name" class="form-control" value="<?=$name; ?>" readonly >
                                    </div>

                                    <div class="form-group">
                                        <label for="gender" class="form-label">Gender</label>
                                        <input type="Text" name="gender" id="gender" class="form-control" value="<?=$gender; ?>" readonly >
                                    </div>

                                    <div class="form-group">
                                        <label for="dob" class="form-label">Date of Birth</label>
                                        <input type="date" name="dob" id="dob" class="form-control" value="<?=$dob; ?>" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label for="nationality" class="form-label">Nationality</label>
                                        <input type="Text" name="nationality" id="nationality" class="form-control" value="<?=$nationality; ?>" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label for="address" class="form-label">Address</label>
                                        <textarea class="form-control" name="address" id="address" rows="2" readonly><?=$address; ?></textarea>
                                    </div>
                            </div>
                        </div>

                        <div class="col-xl-6 col-md-6 mb-4  bg-white">
                            <div class="p-5">
                                    
                                    <div class="form-group">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" name="email" id="email" class="form-control" value="<?=$email; ?>" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label for="phone_no" class="form-label">Phone No.</label>
                                        <input type="Text" name="phone_no" id="phone_no" class="form-control" value="<?=$mobile; ?>" readonly>
                                    </div>

                                    <div class="form-group">
                                    <?php
                                            list($desig_name)=mysqli_fetch_row(mysqli_query($con,"SELECT desig_name FROM designation WHERE desig_id = $designation"))
                                            ?>
                                        <label for="designation" class="form-label">Designation</label>
                                        <input type="Text" name="designation" id="designation" class="form-control" value="<?=$desig_name; ?>" readonly>
                                    </div>

                                    <div class="form-group">
                                    <?php
                                            list($pos_name)=mysqli_fetch_row(mysqli_query($con,"SELECT pos_name FROM position_level WHERE pos_id = $position_level"))
                                            ?>
                                        <label for="position" class="form-label">Position Level</label>
                                        <input type="Text" name="position" id="position" class="form-control" value="<?=$pos_name; ?>" readonly>
                                    </div>

                                    <div class="form-group">
                                    <?php
                                            list($dept)=mysqli_fetch_row(mysqli_query($con,"SELECT dept_name FROM department WHERE  dept_id= $department"))
                                            ?>
                                        <label for="department" class="form-label">Department</label>
                                        <input type="Text" name="department" id="department" class="form-control" value="<?=$dept; ?>" readonly>
                                    </div>
                            </div>
                        </div>
                        
                    </div>
                    <!-- Content Row -->

                </div>
                <!-- /.container-fluid -->

                 <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Qualification Details</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Course Title</th>
                                            <th>Qualification Level</th>
                                            <th>Funding Source</th>
                                            <th>Country</th>
                                            <th>Completion date</th>
                                            <th>Certificate</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        $qli_Qry=mysqli_query($con,"SELECT `q_id`, `emp_id`, `course_title`, `qualification_level`, `funding_source`, `country`, `certificate`, `start_date`, `end_date`, `remarks`, `verification_status` FROM `qualification` WHERE emp_id=".$employee_id);
                                        while(list($q_id, $emp_id, $course_title, $qualification_level, $funding_source, $country, $certificate, $start_date, $end_date, $remarks, $verification_status)=mysqli_fetch_row($qli_Qry)){
                                            list($ql)=mysqli_fetch_row(mysqli_query($con,"SELECT `ql_name` FROM `qualification_level` WHERE ql_id=".$qualification_level));
                                        ?>
                                        <tr>
                                            <td><?=$course_title;?></td>
                                            <td><?=$ql;?></td>
                                            <td><?=$funding_source;?></td>
                                            <td><?=$country;?></td>
                                            <td><?=$end_date;?></td>
                                            <td><a href="<?=$certificate;?>" target="_blank">view</a></td>
                                        </tr>
                                            <script>
                                                function confirmDelete() {                                        
                                                var getConfirm = confirm("Are you sure you want to delete");
                                                        if(getConfirm == true){
                                                            window.location.href="./qualification/delete_qualification.php?id=<?=$q_id;?>"
                                                        }
                                                        // else{
                                                        //     alert("You have cancelled!");
                                                        // }
                                                }
                                            </script>

                                        <?php                                            
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->


                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Training Details</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Course Title</th>
                                            <th>Funding Source</th>
                                            <th>Start Date</th>
                                            <th>Completion date</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        $tr_Qry=mysqli_query($con,"SELECT `tr_id`, `course_title`, `start_date`, `end_date`, `emp_id`, `funding_source`, `remarks` FROM `training` WHERE `verification_status`='1' AND `emp_id`=".$employee_id);
                                        while(list($tr_id, $course_title, $start_date, $end_date, $emp_id, $funding_source, $remarks)=mysqli_fetch_row($tr_Qry)){
                                        ?>
                                        <tr>
                                            <td><?=$course_title;?></td>
                                            <td><?=$funding_source;?></td>
                                            <td><?=$start_date;?></td>
                                            <td><?=$end_date;?></td>
                                        </tr>
                                        <?php                                            
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Employee Performance Rating</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Fiscal Year</th>
                                            <th>Rating</th>
                                            <th>Remarks</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        $tr_Qry=mysqli_query($con,"SELECT `pr_id`, `emp_id`, `fiscal_yr`, `rating`, `remarks` FROM `performance_rating` WHERE `emp_id`='".$employee_id."' ORDER BY `fiscal_yr` DESC");
                                        while(list($pr_id, $emp_id, $fiscal_yr, $rating, $remarks)=mysqli_fetch_row($tr_Qry)){
                                        ?>
                                        <tr>
                                            <td><?=$fiscal_yr;?></td>
                                            <td><?=$rating;?></td>
                                            <td><?=$remarks;?></td>
                                        </tr>
                                        <?php                                            
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->


<?php
include('./include/footer.php');
?>
