<?php
session_start();
include('connection/db.php');

$login = $_SESSION['email'];
$JOb_title = $_POST['job_title'];
$Description = $_POST['Description'];
$country = $_POST['country']; 
$state = $_POST['state'];
$city = $_POST['city'];
$Keyword = $_POST['Keyword'];
$category = $_POST['category'];


$sql = mysqli_query($c, "INSERT INTO all_jobs (customer_email, job_title, des, country, state, city ,category,Keyword) VALUES ('$login', '$JOb_title', '$Description', '$country', '$state', '$city' ,'$category','$Keyword')");

if ($sql) {
    echo "Data has been successfully Inserted!";
    // JavaScript code to show a pop-up message
    echo "<script>alert('Data has been successfully Inserted!');</script>";
} else {
    echo "Some error occurred. Please try again!";
}
?>
