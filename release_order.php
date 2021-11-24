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
                            <h6 class="m-0 font-weight-bold text-primary">Employee Release Request Trainings</h6>
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
                                        $sql = "SELECT `employee_id`, `name`, `gender`, `email`, `mobile`, `designation`, `department`, `position_level` FROM `employee` WHERE 1 ";

                                        if ($acl==2){
                                            list($hod_dept)=mysqli_fetch_row(mysqli_query($con,"SELECT `department` FROM `employee` WHERE employee_id=".$emp_id));

                                            $sql.=" AND `department` = $hod_dept ";
                                        }
                                        $sql.=" ORDER BY `position_level` ASC";
                                        
                                        
                                        // ORDER BY `position_level` ASC"
                                        $tr_Qry=mysqli_query($con,$sql);
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
                                            <td>
                                                <?php if($acl==2){ ?>
                                                <a class="btn btn-primary btn-user btn-sm" href="add_release_request.php?id=<?=$employee_id;?>">Add Release</a>
                                                <?php } ?>
                                            </td>
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
