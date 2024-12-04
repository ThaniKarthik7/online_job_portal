<?php
include('connection/db.php');
$Company=$_POST['company'];
$Description=$_POST['Description'];
$admin=$_POST['admin'];

$query= mysqli_query($c,"insert into company(company,des,admin) values ('$Company','$Description','$admin')");
//var_dump($query);
if ($query){
echo  "Data has been successfully Inserted !";
}
else{  
    echo "some error please try again !";
}
?>