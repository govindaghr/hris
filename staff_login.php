<?php
include('./include/header.php');
?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <!-- <h1 class="h3 mb-2 text-gray-800">Qualification Details</h1>-->
                    <p class="mb-4"><a href="add_staff_login.php" type="button" class="btn btn-primary btn-user">Add Employee</a></p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Employee Login</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Employee ID</th>
                                            <th>Access Level</th>
                                            <th>Status</th>
                                            <th>Last Login</th>
                                            <th>Manage</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Employee ID</th>
                                            <th>Access Level</th>
                                            <th>Status</th>
                                            <th>Last Login</th>
                                            <th>Manage</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        $acc_Qry=mysqli_query($con,"SELECT `emp_id`, `access_level`, `last_login`, `status` FROM `login` WHERE 1");
                                        while(list($emp_id, $access_level, $last_login, $status)=mysqli_fetch_row($acc_Qry)){
                                            list($al)=mysqli_fetch_row(mysqli_query($con,"SELECT `access_desc` FROM `access_level` WHERE `access_id`=".$access_level));
                                            list($sts)=mysqli_fetch_row(mysqli_query($con,"SELECT `status_desc` FROM `status` WHERE `status_id`=".$status));
                                        ?>
                                        <tr>
                                            <td><?=$emp_id;?></td>
                                            <td><?=$al;?></td>
                                            <td><?=$sts;?></td>
                                            <td><?=$last_login;?></td>
                                            <td><a class="btn btn-primary btn-user btn-sm" href="edit_pass.php?id=<?=$emp_id;?>">Edit</a>  <a class="btn btn-primary btn-user btn-sm" href="edit_password.php?id=<?=$emp_id;?>">ChangePassword</a></td>
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
