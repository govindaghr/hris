<?php
include('./include/header.php');
$eid = $_GET['id'];
$qry=mysqli_query($con,"SELECT `employee_id`, `cid`, `name` FROM `employee` WHERE employee_id='".$eid."'");
list($employee_id, $cid, $name )=mysqli_fetch_row($qry);

?>                
                
                <!-- Begin Page Content -->
                <div class="container-fluid">
                        <div class="col-xl-12 col-md-12  bg-white">
                            <div class="p-5">
                                <!-- Page Heading -->
                                <div class="text-center">
                                    <h1 class="h3 mb-0 text-gray-800"><?=$name;?></h1>
                                    <h1 class="h3 mb-0 text-gray-800"><?=$employee_id;?></h1>
                                </div>
                                <hr>
                            </div>
                        </div>


                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Employee Release (<?=$eid;?>)</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nominated_for</th>
                                            <th>Start_date</th>
                                            <th>End_date</th>
                                            <th>Nomination_date</th>
                                            <th>Nominated_by</th>
                                            <th>Date Signed</th>
                                            <th>Signed By</th>
                                            <th>Approval Status</th>
                                            <th>Remarks</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        $tr_Qry=mysqli_query($con,"SELECT `sr_id`, `empid`, `nominated_for`, `start_date`, `end_date`, `nomination_date`, `nominated_by`, `date_approved`, `approved_by`, `approval_status`, `remarks` FROM `staff_release` WHERE `empid`='".$eid."' ORDER BY `end_date` DESC");

                                        while(list($sr_id, $emp_id, $nominated_for, $start_date, $end_date, $nomination_date, $nominated_by, $date_approved, $approved_by, $approval_status, $remarks)=mysqli_fetch_row($tr_Qry)){
                                        ?>
                                        <tr>
                                            <td><?=$nominated_for;?></td>
                                            <td><?=$start_date;?></td>
                                            <td><?=$end_date;?></td>
                                            <td><?=$nomination_date;?></td>
                                            <td><?=$nominated_by;?></td>
                                            <td><?=$date_approved;?></td>
                                            <td><?=$approved_by;?></td>
                                            <td><?=$approval_status;?></td>
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
