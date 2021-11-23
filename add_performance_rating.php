<?php
include('./include/header.php');
$eid = $_GET['id'];
?>                
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <!-- <h1 class="h3 mb-2 text-gray-800">Qualification Details</h1>-->
                    <!-- <p class="mb-4"><button class="btn btn-primary btn-user" href="#" data-toggle="modal" data-target="#performanceModal" >Add Ratings</button></p> -->

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Employee Performance Rating</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Fiscal Year</th>
                                            <th>Rating</th>
                                            <th>Remarks</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Fiscal Year</th>
                                            <th>Rating</th>
                                            <th>Remarks</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        $tr_Qry=mysqli_query($con,"SELECT `pr_id`, `emp_id`, `fiscal_yr`, `rating`, `remarks` FROM `performance_rating` WHERE `emp_id`='".$eid."' ORDER BY `fiscal_yr` DESC");
                                        while(list($pr_id, $emp_id, $fiscal_yr, $rating, $remarks)=mysqli_fetch_row($tr_Qry)){
                                        ?>
                                        <tr>
                                            <td><?=$fiscal_yr;?></td>
                                            <td><?=$rating;?></td>
                                            <td><?=$remarks;?></td>
                                            <td><a href="./performance_rating/delete_pr.php?id=<?=$pr_id;?>&emp_id=<?=$emp_id;?>" class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i>
                                    </a></td>
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

                    <!-- Content Row -->
                    <div class="row justify-content-center">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-6 col-md-6 mb-4  bg-white">
                            <div class="p-5">
                                <!-- Page Heading -->
                                <div class="text-center">
                                    <h1 class="h3 mb-0 text-gray-800">Add Performance Rating</h1>
                                </div>
                                <hr>
                                
                                <form class="user needs-validation" novalidate action = "./performance_rating/save_pr.php" method = "POST">
                                    
                                    <div class="form-group">
                                        <label for="empid" class="form-label">Employee ID</label>
                                        <input type="text" name="emp_id" id="empid" class="form-control" value="<?=$eid;?>" readonly required >
                                    </div>                        
                                    
                                    <div class="form-group">
                                        <label for="fiscal_yr" class="form-label">Fiscal Year</label>
                                        <select class="form-select form-control" name="fiscal_yr" id="fiscal_yr" aria-label="Select access_level" required >
                                            <option value="" selected>Select</option>
                                            <option value="2021-2022">2021-2022</option>
                                            <option value="2020-2021">2020-2021</option>
                                            <option value="2019-2020">2019-2020</option>
                                            <option value="2018-2019">2018-2019</option>
                                            <option value="2017-2018">2017-2018</option>
                                            <option value="2016-2017">2016-2017</option>                                            
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="rating" class="form-label">Rating</label>
                                        <input type="float" name="rating" id="rating" class="form-control" required >
                                    </div>

                                    <div class="form-group">
                                        <label for="remarks" class="form-label">Remarks</label>
                                        <textarea class="form-control" id="remarks" name="remarks" required></textarea>
                                    </div>
                                    
                                    <div class="form-group">
                                        <a href="./performance_rating.php" class="btn btn-primary btn-user btn-inline">Back<a>    
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
