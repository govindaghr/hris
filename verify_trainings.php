<?php
include('./include/header.php');
?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <!-- <h1 class="h3 mb-2 text-gray-800">Qualification Details</h1>-->

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Verify Employee Trainings</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Employee ID</th>
                                            <th>Name</th>
                                            <th>Department</th>
                                            <th>Course Title</th>
                                            <th>Funding Source</th>
                                            <th>Start Date</th>
                                            <th>Completion date</th>
                                            <th>Manage</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Employee ID</th>
                                            <th>Name</th>
                                            <th>Department</th>
                                            <th>Course Title</th>
                                            <th>Funding Source</th>
                                            <th>Start Date</th>
                                            <th>Completion date</th>
                                            <th>Manage</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        $tr_Qry=mysqli_query($con,"SELECT `tr_id`, `course_title`, `start_date`, `end_date`, `emp_id`, `funding_source`, `remarks`, `name`, `department` FROM `training`, `employee` WHERE `emp_id`=`employee_id` AND `verification_status`=0");
                                        while(list($tr_id, $course_title, $start_date, $end_date, $emp_id, $funding_source, $remarks, $name, $department)=mysqli_fetch_row($tr_Qry)){
                                            list($dept)=mysqli_fetch_row(mysqli_query($con,"SELECT `dept_name` FROM `department` WHERE `dept_id`=".$department));
                                        ?>
                                        <tr>
                                            <td><?=$emp_id;?></td>
                                            <td><?=$name;?></td>
                                            <td><?=$dept;?></td>
                                            <td><?=$course_title;?></td>
                                            <td><?=$funding_source;?></td>
                                            <td><?=$start_date;?></td>
                                            <td><?=$end_date;?></td>
                                            <td><a href="#" onclick="confirmVerify()">Verify</a></td>
                                        </tr>
                                            <script>
                                                function confirmVerify() {                                        
                                                var getConfirm = confirm("Are you sure you want to Verify");
                                                        if(getConfirm == true){
                                                            window.location.href="./training/verify_individual_training.php?id=<?=$tr_id;?>"
                                                        }
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

                    <!-- Page Heading -->
                    <!-- <h1 class="h3 mb-2 text-gray-800">Qualification Details</h1>-->

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Verified Employee Training Details</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Employee ID</th>
                                            <th>Name</th>
                                            <th>Department</th>
                                            <th>Course Title</th>
                                            <th>Funding Source</th>
                                            <th>Start Date</th>
                                            <th>Completion date</th>
                                            <th>Manage</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Employee ID</th>
                                            <th>Name</th>
                                            <th>Department</th>
                                            <th>Course Title</th>
                                            <th>Funding Source</th>
                                            <th>Start Date</th>
                                            <th>Completion date</th>
                                            <th>Manage</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        $tr_Qry=mysqli_query($con,"SELECT `tr_id`, `course_title`, `start_date`, `end_date`, `emp_id`, `funding_source`, `remarks`, `name`, `department` FROM `training`, `employee` WHERE `emp_id`=`employee_id`  AND `verification_status`=1");
                                        while(list($tr_id, $course_title, $start_date, $end_date, $emp_id, $funding_source, $remarks, $name, $department)=mysqli_fetch_row($tr_Qry)){
                                            list($dept)=mysqli_fetch_row(mysqli_query($con,"SELECT `dept_name` FROM `department` WHERE `dept_id`=".$department));
                                        ?>
                                        <tr>
                                            <td><?=$emp_id;?></td>
                                            <td><?=$name;?></td>
                                            <td><?=$dept;?></td>
                                            <td><?=$course_title;?></td>
                                            <td><?=$funding_source;?></td>
                                            <td><?=$start_date;?></td>
                                            <td><?=$end_date;?></td>
                                            <td><a href="view_training.php?id=<?=$tr_id;?>">View</a></td>
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
