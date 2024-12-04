<?php
include('connection/db.php');

include('include/header.php');
include('include/sidebar.php');
?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="admin_dashboard.php">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="#">Apply Jobs</a></li>
        </ol>
    </nav>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Applied Jobs</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2"></div>
          
        </div>
    </div>

    <form action="" style="border: 1px solid gray; width: 60%; margin-left: 10%; padding: 10px;">
    <?php
include('connection/db.php');

// Check if 'id' parameter is present in the URL
if(isset($_GET['id'])){
    // Sanitize the input to prevent SQL injection
    $id = mysqli_real_escape_string($c, $_GET['id']);
    // Initialize $query1 to an empty result set
    $query1 = mysqli_query($c, "SELECT * FROM job_apply LEFT JOIN all_jobs ON job_apply.id_job = all_jobs.job_id WHERE id='$id'");
    //var_dump($query1);

    while ($row = mysqli_fetch_assoc($query1)) { // Fetch rows and iterate
    ?>
        <div class="form-group">
            <label for="">Job Title:</label>
            <span><?php echo $row['job_title']; ?></span>
        </div>

        <div class="form-group">
            <label for="">Job Seeker Name:</label>
            <span><?php echo $row['first_name'] . ' ' . $row['last_name']; ?></span>
        </div>

        <div class="form-group">
            <label for="">Job Description:</label>
            <span><?php echo $row['des']; ?></span>
        </div>

        <div class="form-group">
            <label for="">Job Seeker Email:</label>
            <span><?php echo $row['job_seeker']; ?></span>
        </div>

        <div class="form-group">
            <label for="">Job Seeker Mobile Number:</label>
            <span><?php echo $row['mobile_number']; ?></span>
        </div>

        <div class="form-group">
            <label for="">Job Seeker File:</label>
            <span><a href="http://localhost/job_protol/files/<?php echo $row['file']; ?>">Download file</a></span>
        </div>
    <?php 
    } 

}
?>

<a href="send_mail.php ?id=<?php echo $id ;?>"class="btn btn-success">Accept</a>
<a href="reject_job.php?id=<?php echo $id ;?>"class="btn btn-danger">Reject</a>


</form>



    <canvas class="my-4" id="myChart" width="900" height="380"></canvas>

    <div class="table-responsive">
    </div>
</main>
</div>
</div>
<!-- Bootstrap core JavaScript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script>
    window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')
</script>
<script src="../../assets/js/vendor/popper.min.js"></script>
<script src="../../dist/js/bootstrap.min.js"></script>

<!-- Icons -->
<!--<script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">

<script>
    feather.replace()
</script>

<!--datatables plugin-->
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
</body>
</html>
