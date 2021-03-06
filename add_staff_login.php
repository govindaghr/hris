<?php
include('./include/header.php');
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
                                    <h1 class="h3 mb-0 text-gray-800">Add Login Details</h1>
                                </div>
                                <hr>
                                
                                <form class="user needs-validation" novalidate action = "./login/save_staff_login.php" method = "POST">
                                    
                                    <div class="form-group">
                                        <label for="empid" class="form-label">Employee ID</label>
                                        <input type="text" name="emp_id" id="empid" class="form-control" required >
                                    </div>

                                    <div class="form-group">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="text" name="password" id="course_title" class="form-control" required >
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="access_level" class="form-label">Access Level</label>
                                        <select class="form-select form-control" name="access_level" id="access_level" aria-label="Select access_level" required >
                                            <option value="" selected>Select</option>
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
                                            <option value="" selected>Select</option>
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
