<?php 
include('./include/header.php');
$qry=mysqli_query($con,"SELECT COUNT(`employee_id`) FROM `employee` ");
list($counts)=mysqli_fetch_row($qry);

 ?>
<!-- Begin Page Content -->
 <div class="container-fluid">
    <!-- <a href="#" class="btn btn-success btn-icon-split">
        <span class="icon text-white-50">
            <i class="fas fa-check"></i>
        </span>
        <span class="text">Split Button Success</span>
    </a> -->
    
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard </h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
    </div>
    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Employees (Total)
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$counts;?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6 mb-4">
            <!-- Illustrations -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Welcome Here</h6>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                            src="img/undraw_posting_photo.svg" alt="...">
                    </div>
                    <p>The human resource information system collects and stores data on an organization’s employees. It encompasses the basic functionalities needed for end-to-end human resources management. It is a system for performance monitoring, management, and maintaining proper records of employee’s details. Human resource information systems also help to keep track of changes to anything related to employees. Such human resource information systems are also required in college institutions</p>
                </div>
            </div>
        </div>
        
        <div class="col-lg-6 mb-4">
            <!-- Approach -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Notifications</h6>
                </div>
                <div class="card-body">
                    <p class="mb-0">You do not have any notifications for now.</p>
                </div>
            </div>

        </div>
    </div>

    <!-- Content Row -->

</div>
<!-- /.container-fluid -->

<?php include('./include/footer.php') ?>