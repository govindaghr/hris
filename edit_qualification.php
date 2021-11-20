<?php
include('./include/header.php');
$q_id=$_GET['id'];

$qli_Qry=mysqli_query($con,"SELECT `q_id`, `emp_id`, `course_title`, `qualification_level`, `funding_source`, `country`, `college`, `certificate`, `start_date`, `end_date`, `remarks`, `verification_status` FROM `qualification` WHERE q_id=".$q_id);
list($q_id, $emp_id, $course_title, $qualification_level, $funding_source, $country, $college, $certificate, $start_date, $end_date, $remarks, $verification_status)=mysqli_fetch_row($qli_Qry);
?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Content Row -->
                    <div class="row justify-content-center">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-6 col-md-6 mb-4  bg-white">
                            <div class="p-5">
                                <!-- Page Heading -->
                                <div class="text-center">
                                    <h1 class="h3 mb-0 text-gray-800">Edit Qualification</h1>
                                </div>
                                <hr>

                                <form class="user needs-validation" novalidate action = "./qualification/update_qualification.php" enctype="multipart/form-data" method = "POST">
                                    <div class="mb-3 row">
                                        <label for="empid" class="col-sm-4 col-form-label">Employee ID</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="emp_id" id="empid" class="form-control-plaintext"  value="<?= $_SESSION['emp_id']; ?>" readonly>
                                            <input type="hidden" name="q_id" id="q_id" class="form-control-plaintext"  value="<?= $q_id;?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="course_title" class="form-label">Course Title</label>
                                        <input type="text" name="course_title" id="course_title" class="form-control" required value="<?= $course_title;?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="qualification_level" class="form-label">Qualification Level</label>
                                        <select class="form-select form-control" name="qualification_level" id="qualification_level" aria-label="Select qualification_level" required >
                                            <?php
                                            $qll=mysqli_query($con,"SELECT `ql_name` FROM `qualification_level` WHERE ql_id=".$qualification_level);
                                            list($qul_name)=mysqli_fetch_row($qll);
                                            ?>
                                            <option value="<?=$qualification_level;?>" selected><?=$qul_name;?></option>
                                            <?php
                                                $qualification_l=mysqli_query($con,"SELECT `ql_id`, `ql_name` FROM `qualification_level`");
                                                while(list($ql_id,$ql_name)=mysqli_fetch_row($qualification_l)){                                                        
                                                        echo '<option value="'.$ql_id.'">'.$ql_name.'</option>';			
                                                }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="funding_source" class="form-label">Funding Source</label>
                                        <input type="Text" name="funding_source" id="funding_source" class="form-control" required value="<?= $funding_source;?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="country" class="form-label">Country</label>
                                        <input type="text" name="country" id="country" class="form-control" required value="<?= $country;?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="college" class="form-label">College</label>
                                        <input type="text" name="college" id="college" class="form-control" required value="<?= $college;?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="start_date" class="form-label">Course Start date</label>
                                        <input type="date" name="start_date" id="start_date" class="form-control" required value="<?= $start_date;?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="end_date" class="form-label">Completion date</label>
                                        <input type="date" name="end_date" id="end_date" class="form-control" required value="<?= $end_date;?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="remarks" class="form-label">Remarks</label>
                                        <textarea class="form-control" name="remarks" id="remarks" rows="2"><?= $remarks;?></textarea>
                                    </div>

                                    <a href="./qualifications.php" class="btn btn-primary btn-user btn-inline">Back<a>
                                    <button type="submit" class="btn btn-primary btn-user btn-inline">Update</button>


                                    <hr>
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
