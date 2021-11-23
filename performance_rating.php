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
                                            <th>Gender</th>
                                            <th>Phone No.</th>
                                            <th>Designation</th>
                                            <th>Department</th>
                                            <th>Position Level</th>
                                            <th>Manage</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Employee ID</th>
                                            <th>Name</th>
                                            <th>Gender</th>
                                            <th>Phone No.</th>
                                            <th>Designation</th>
                                            <th>Department</th>
                                            <th>Position Level</th>
                                            <th>Manage</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        $tr_Qry=mysqli_query($con,"SELECT `employee_id`, `name`, `gender`, `email`, `mobile`, `designation`, `department`, `position_level` FROM `employee` ORDER BY `position_level` ASC");
                                        while(list($employee_id, $name, $gender, $email, $mobile, $designation, $department, $position_level)=mysqli_fetch_row($tr_Qry)){
                                            list($dept)=mysqli_fetch_row(mysqli_query($con,"SELECT `dept_name` FROM `department` WHERE `dept_id`=".$department));
                                            list($desig)=mysqli_fetch_row(mysqli_query($con,"SELECT `desig_name` FROM `designation` WHERE `desig_id`=".$designation));
                                            list($pos)=mysqli_fetch_row(mysqli_query($con,"SELECT `pos_name` FROM `position_level` WHERE `pos_id`=".$department));
                                        ?>
                                        <tr>
                                            <td><?=$emp_id;?></td>
                                            <td><?=$name;?></td>
                                            <td><?=$gender;?></td>
                                            <td><?=$mobile;?></td>
                                            <td><?=$desig;?></td>
                                            <td><?=$dept;?></td>
                                            <td><?=$pos;?></td>
                                            <td><a class="btn btn-primary btn-user btn-sm" href="add_performance_rating.php?id=<?=$employee_id;?>">Add Ratings</a></td>
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
