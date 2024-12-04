<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Signin Template · Bootstrap v5.1</title>
    <link href="https://getbootstrap.com/docs/5.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .form-signin {
            max-width: 330px;
            padding: 15px;
            margin: 0 auto;
        }

        .form-signin .form-floating:focus-within {
            z-index: 2;
        }

        .form-signin input[type="email"],
        .form-signin input[type="password"] {
            height: auto;
            border-radius: 0;
        }
    </style>
</head>

<body class="text-center">

    <main class="form-signin">
        <form action="new-post.php" method="post">
            <img class="mb-4" src="admin\img\Online job portal.png" alt="" width="72" height="57">
            <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
            <div class="form-floating">
                <input type="email" class="form-control" name="email" id="floatingInput" placeholder="name@example.com" required>
                <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password" required>
                <label for="floatingPassword">Password</label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit" name="submit">Sign In</button>
            <p class="mt-5 mb-3 text-muted">&copy; 2017-2021</p>
        </form>
    </main>

</body>

</html>


<?php
include('connection/db.php');

if(isset($_POST['submit'])){
   $email=$_POST['email'];
   $pass=$_POST['password'];

  $query=mysqli_query($c,"select * from admin_login where admin_email='$email' and admin_pass='$pass' and admin_type='2' ");

if($query){

  if(mysqli_num_rows($query)>0){

    $_SESSION['email'] = $email;
    header('location:admin/admin_dashboard.php');
  
  }else{
    echo "<script>alert('Email or Password not match !! , Please try again ')</script>";
  }
}
}
?>