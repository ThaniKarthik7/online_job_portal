<?php
include('connection/db.php');
$del =$_GET['del'];
$query=mysqli_query($c,"delete from admin_login where id='$del'");
if($query){
    echo "<script>alert('Record has been successfully Delete !!!')</script>";
    header('location:Customer.php');
}else{
        echo "<script>alert('Record has been successfully Delete !!!')</script>";

    }

?>