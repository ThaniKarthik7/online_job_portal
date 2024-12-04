<?php
include('connection/db.php');
$del = $_GET['del'];

$query = mysqli_query($c, "delete from job_category where id='$del'");
if ($query) {
    // The alert message here indicates success
    echo "<script>alert('Record has been successfully deleted !!!')</script>";
    header('location:category.php');
} else {
    // The alert message here should indicate an error
    echo "<script>alert('Error: Record deletion failed !!!')</script>";
}

?>
