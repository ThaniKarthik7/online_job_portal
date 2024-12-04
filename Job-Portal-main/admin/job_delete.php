<?php
include('connection/db.php');
$del = $_GET['del'];
$query = mysqli_query($c, "delete from all_jobs where job_id='$del'");

if ($query) {
    echo "<script>alert('Record has been successfully Deleted !!!')</script>";
    header('location: Job_create.php'); // Redirect after displaying the alert
} else {
    echo "<script>alert('Failed to delete the record.')</script>";
}
?>
