<?php
include('./include/header.php');
?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <!-- <h1 class="h3 mb-2 text-gray-800">Qualification Details</h1>-->
                    <p class="mb-4"><a href="add_training.php" type="button" class="btn btn-primary btn-user">Add Training Attended</a></p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Training Details</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Course Title</th>
                                            <th>Funding Source</th>
                                            <th>Start Date</th>
                                            <th>Completion date</th>
                                            <th>Manage</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Course Title</th>
                                            <th>Funding Source</th>
                                            <th>Start Date</th>
                                            <th>Completion date</th>
                                            <th>Manage</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        $tr_Qry=mysqli_query($con,"SELECT `tr_id`, `course_title`, `start_date`, `end_date`, `emp_id`, `funding_source`, `remarks` FROM `training` WHERE emp_id=".$emp_id);
                                        while(list($tr_id, $course_title, $start_date, $end_date, $emp_id, $funding_source, $remarks)=mysqli_fetch_row($tr_Qry)){
                                        ?>
                                        <tr>
                                            <td><?=$course_title;?></td>
                                            <td><?=$funding_source;?></td>
                                            <td><?=$start_date;?></td>
                                            <td><?=$end_date;?></td>
                                            <td><a href="edit_training.php?id=<?=$tr_id;?>">Edit</a> <a href="#" onclick="confirmDelete()">delete</a></td>
                                        </tr>
                                            <script>
                                                function confirmDelete() {                                        
                                                var getConfirm = confirm("Are you sure you want to delete");
                                                        if(getConfirm == true){
                                                            window.location.href="./training/delete_training.php?id=<?=$tr_id;?>"
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

<?php
include('./include/footer.php');
?>
