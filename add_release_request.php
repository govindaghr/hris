<?php
include('./include/header.php');
$eid = $_GET['id'];
?>                
                
                <!-- Begin Page Content -->
                <div class="container-fluid">
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
                                            <th>Date Approved</th>
                                            <th>Approved By</th>
                                            <th>Approval Status</th>
                                            <th>Remarks</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nominated_for</th>
                                            <th>Start_date</th>
                                            <th>End_date</th>
                                            <th>Nomination_date</th>
                                            <th>Nominated_by</th>
                                            <th>Date Approved</th>
                                            <th>Approved By</th>
                                            <th>Approval Status</th>
                                            <th>Remarks</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        $tr_Qry=mysqli_query($con,"SELECT `sr_id`, `empid`, `nominated_for`, `start_date`, `end_date`, `nomination_date`, `nominated_by`, `date_approved`, `approved_by`, `approval_status`, `remarks` FROM `staff_release` WHERE `empid`='".$eid."' ORDER BY `end_date` DESC");
                                    // if(mysqli_num_rows($tr_Qry)>0){
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
                                            <td><a href="./release_order/delete_rr.php?id=<?=$sr_id;?>&emp_id=<?=$emp_id;?>" class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></a></td>
                                        </tr>
                                        <?php
                                        }                                          
                                    // }
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

                    <!-- Content Row -->
                    <div class="row justify-content-center">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-6 col-md-6 mb-4  bg-white">
                            <div class="p-5">
                                <!-- Page Heading -->
                                <div class="text-center">
                                    <h1 class="h3 mb-0 text-gray-800">Add Staff Release Order</h1>
                                </div>
                                <hr>
                                
                                <form class="user needs-validation" novalidate action = "./release_order/save_release_request.php" method = "POST">
                                    
                                    <div class="form-group">
                                        <label for="empid" class="form-label">Employee ID</label>
                                        <input type="text" name="empid" id="empid" class="form-control" value="<?=$eid;?>" readonly required >
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="nominated_for" class="form-label">Nominated For</label>
                                        <input type="text" name="nominated_for" id="nominated_for" class="form-control" required >
                                    </div>

                                    <div class="form-group">
                                        <label for="start_date" class="form-label">Start_date</label>
                                        <input type="Date" name="start_date" id="start_date" class="form-control" required >
                                    </div>

                                    <div class="form-group">
                                        <label for="end_date" class="form-label">End_date</label>
                                        <input type="Date" name="end_date" id="end_date" class="form-control" required >
                                    </div>

                                    <div class="form-group">
                                        <label for="remarks" class="form-label">Remarks</label>
                                        <textarea class="form-control" id="remarks" name="remarks"></textarea>
                                    </div>
                                    
                                    <div class="form-group">
                                        <a href="./release_order.php" class="btn btn-default">Back<a>    
                                        <button type="submit" class="btn btn-primary" id="submitBtn">Save</button>
                                    </div>
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
