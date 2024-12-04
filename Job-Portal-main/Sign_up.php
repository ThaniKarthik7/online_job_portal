<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up Template · Bootstrap v5.1</title>
    
    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/5.1/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom styles for this template -->
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
        <form class="form-signin" action="Sign_up.php" method="post">
            <img class="mb-4" src="admin\img\Online job portal.png" alt="" width="72" height="57">
            <h1 class="h3 mb-3 fw-normal">Please sign up</h1>

            <div class="form-floating">
                <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating">
                <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>
            <div class="form-floating">
                <input type="text" name="first_name" class="form-control" id="first_name" placeholder="Enter the First Name">
                <label for="first_name">FIRST NAME</label>
            </div>
            <div class="form-floating">
                <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Enter the Last Name">
                <label for="last_name">LAST NAME</label>
            </div>
            <div class="form-floating">
                <input type="tel" name="mobile_number" class="form-control" id="Number" placeholder="Enter Your Mobile Number">
                <label for="Number">Mobile Number</label>
            </div>
            <div class="form-floating">
                <input type="date" class="form-control" id="DOB" name="DOB" placeholder="Enter Your DATE OF BIRTH">
                <label for="DOB">Date of Birth</label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit" name="submit">Sign up</button>            
            <a href="job-post.php">Already have an account?</a>
            <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>
        </form>
    </main>
</body>
</html>
<?php
include('connection/db.php');
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $DOB = $_POST['DOB'];
    $mobile_number = $_POST['mobile_number'];

    // Make sure to sanitize user inputs to prevent SQL injection
    $email = mysqli_real_escape_string($c, $email);
    $password = mysqli_real_escape_string($c, $password);
    $first_name = mysqli_real_escape_string($c, $first_name);
    $last_name = mysqli_real_escape_string($c, $last_name);
    $DOB = mysqli_real_escape_string($c, $DOB);
    $mobile_number = mysqli_real_escape_string($c, $mobile_number);

    $query = "INSERT INTO jobskeer (email, password, first_name, last_name, DOB, mobile_number) VALUES ('$email', '$password', '$first_name', '$last_name', '$DOB', '$mobile_number')";
    $result = mysqli_query($c, $query);

    if ($result) {
        echo "<script>alert('Registration successful. You can now log in!')</script>";
        header('location: job-post.php');
    } else {
        echo "<script>alert('Some error occurred. Please try again.')</script>";
    }
}
?>
