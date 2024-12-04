<?php
session_start();
error_reporting(0);
include('connection/db.php');

$img = "";
$name = "";

if(isset($_SESSION['email'])) {
    $header_query = mysqli_query($c, "SELECT * FROM profiles WHERE user_email='{$_SESSION['email']}'");
    $row = mysqli_fetch_array($header_query);
    
    if($row) {
        $img = $row['img'];
        $name = $row['name'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>JobPortal</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="index.php">JobPortal</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>

            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item<?php if($page=='home'){echo 'active';}?>"><a href="index.php" class="nav-link">Home</a></li>
                    <li class="nav-item<?php if($page=='about'){echo 'active';}?>"><a href="about.php" class="nav-link">About</a></li>
                    <li class="nav-item<?php if($page=='blog'){echo 'active';}?>"><a href="blog.php" class="nav-link">Blog</a></li>
                    <li class="nav-item<?php if($page=='contact'){echo 'active';}?>"><a href="contact.php" class="nav-link">Contact</a></li>
                    <?php
                    if(isset($_SESSION['email'])) { ?>
                        <li class="nav-item cta cta-colored"><a href="job-post.php" class="nav-link">
                            <?php if (empty($name)) { echo $_SESSION['email']; } else { echo $name; }?>
                        </a></li>
                        <li class="nav-item cta cta-colored dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="profile_img/<?php echo empty($img) ? 'logo.png' : $img;?>" class="" alt="Profile Picture" width="50" height="50">
                            </a>
                            <div class="dropdown-menu" aria-labelledby="profileDropdown">
                                <a class="dropdown-item" href="my_profile.php">My Profile</a>
                                <a class="dropdown-item" href="logout.php">Logout</a>
                            </div>
                        </li>
                    <?php
                    } else {
                    ?>
                        <li class="nav-item cta mr-md-2"><a href="job-post.php" class="nav-link">Login</a></li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
    <!-- END nav -->

    <!-- Rest of your HTML content goes here -->

  </body>
</html>
