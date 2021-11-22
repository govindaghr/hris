<?php
include('./include/header.php');
$emp_id=$_GET['id'];
$login_Qry=mysqli_query($con,"SELECT `password`, `access_level`, `last_login`, `status` FROM `login` WHERE `emp_id`=".$emp_id);
list($password, $a_level, $last_login, $status1)=mysqli_fetch_row($login_Qry);

$access_lvl=mysqli_query($con,"SELECT `access_desc` FROM `access_level` WHERE `access_id`=".$a_level);
list($acl_d)=mysqli_fetch_row($access_lvl);

$sts=mysqli_query($con,"SELECT `status_desc` FROM `status` WHERE `status_id`=".$status1);
list($sts_desc)=mysqli_fetch_row($sts);

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
                                    <h1 class="h3 mb-0 text-gray-800">Edit Login Details</h1>
                                </div>
                                <hr>
                                
                                <form class="user needs-validation" novalidate action = "./login/update_staff_login.php" method = "POST">
                                    
                                    <div class="form-group">
                                        <label for="empid" class="form-label">Employee ID</label>
                                        <input type="text" name="emp_id" id="empid" class="form-control" value=<?=$emp_id;?> required readonly>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="access_level" class="form-label">Access Level</label>
                                        <select class="form-select form-control" name="access_level" id="access_level" aria-label="Select access_level" required >
                                            <option value="<?=$a_level;?>" selected><?=$acl_d;?></option>
                                            <?php

                                                $access_level=mysqli_query($con,"SELECT `access_id`, `access_desc` FROM `access_level`");
                                                while(list($access_id,$access_desc)=mysqli_fetch_row($access_level)){                                                        
                                                        echo '<option value="'.$access_id.'">'.$access_desc.'</option>';			
                                                }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="status" class="form-label">Status</label>
                                        <select class="form-select form-control" name="status" id="status" aria-label="Select status" required >
                                        <option value="<?=$status1;?>" selected><?=$sts_desc;?></option>
                                            <?php

                                                $status=mysqli_query($con,"SELECT `status_id`, `status_desc` FROM `status`");
                                                while(list($status_id,$status_desc)=mysqli_fetch_row($status)){                                                        
                                                        echo '<option value="'.$status_id.'">'.$status_desc.'</option>';			
                                                }
                                            ?>
                                        </select>
                                    </div>

                                    <a href="./staff_login.php" class="btn btn-primary btn-user btn-inline">Back<a>
                                    <button type="submit" class="btn btn-primary btn-user btn-inline">Save</button>
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
