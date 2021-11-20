<?php
include('./include/header.php');
?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <!-- <h1 class="h3 mb-2 text-gray-800">Qualification Details</h1>-->
                    <p class="mb-4"><a href="add_qualification.php" type="button" class="btn btn-primary btn-user">Add Qualification</a></p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Qualification Details</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Course Title</th>
                                            <th>Qualification Level</th>
                                            <th>Funding Source</th>
                                            <th>Country</th>
                                            <th>Completion date</th>
                                            <th>Certificate</th>
                                            <th>Manage</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Course Title</th>
                                            <th>Qualification Level</th>
                                            <th>Funding Source</th>
                                            <th>Country</th>
                                            <th>Completion date</th>
                                            <th>Certificate</th>
                                            <th>Manage</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        $qli_Qry=mysqli_query($con,"SELECT `q_id`, `emp_id`, `course_title`, `qualification_level`, `funding_source`, `country`, `certificate`, `start_date`, `end_date`, `remarks`, `verification_status` FROM `qualification` WHERE emp_id=".$emp_id);
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
                                            <td><a href="edit_qualification.php?id=<?=$q_id;?>">Edit</a> <a href="#" onclick="confirmDelete()">delete</a></td>
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

<?php
include('./include/footer.php');
?>
