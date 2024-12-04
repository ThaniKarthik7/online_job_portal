<?php
include('connection/db.php');
$category=$_POST['category'];
$Description=$_POST['Description'];
$query= mysqli_query($c,"insert into job_category(category,des) values ('$category','$Description')");
//var_dump($query);
if ($query){
echo  "Data has been successfully Inserted !";
}else{  
    echo "some error please try again !";
}
?>