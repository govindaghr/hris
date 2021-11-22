<?php
include('./include/header.php');
$emp_id=$_GET['id'];
$login_Qry=mysqli_query($con,"SELECT `password`, `access_level`, `last_login`, `status` FROM `login` WHERE `emp_id`=".$emp_id);
list($password, $a_level, $last_login, $status1)=mysqli_fetch_row($login_Qry);

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
                                    <h1 class="h3 mb-0 text-gray-800">Change Password</h1>
                                </div>
                                <hr>
                                
                                <form class="user needs-validation" novalidate action = "./login/update_password.php" method = "POST">
                                    
                                    <div class="form-group">
                                        <label for="empid" class="form-label">Employee ID</label>
                                        <input type="text" name="emp_id" id="empid" class="form-control" value=<?=$emp_id;?> required readonly>
                                    </div>

                                    <div class="form-group">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="text" name="password" id="course_title" class="form-control" required >
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
