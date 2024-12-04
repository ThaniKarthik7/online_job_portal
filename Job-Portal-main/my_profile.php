<?php
include('include/my_profile.php');
include('connection/db.php');
include('include/header.php');

$query = mysqli_query($c, "SELECT * FROM profiles WHERE user_email='" . $_SESSION['email'] . "'");
while($row=mysqli_fetch_array($query)){
  $img=$row['img'];
  $name=$row['name'];
  $dob=$row['dob'];
  $number=$row['number'];
  $email=$row['email'];
}
?>

<br>

<div style="margin-left: 25%; width: 50%; border: 1px solid gray; padding: 10px;">
    <form action="profile_add.php" method="POST" id="profile_form" name="profile_form" enctype="multipart/form-data">
        <div class="row form-group">
            <div class="col-md-6 text-center">
            <img src="profile_img/<?php if(!empty($img)){echo $img;}else{ echo 'logo.png';} ?>" class="img-thumbnail" alt="Cinque Terre">
            </div>
            <div class="col-md-6">
                <label for="img">Choose Profile Picture:</label>
                <input type="file" class="form-control" name="img" id="img">
            </div>
        </div>
        <div class="row form-group">
            <div class="col-md-6">
                <label for="name">Enter Your Name</label>
                <input type="text" name="name" id="name" value="<?php echo $name; ?>" placeholder="Enter Your Name..." class="form-control">
            </div>
            <div class="col-md-6">
                <label for="dob">Enter Your DOB</label>
                <input type="date" name="dob" id="dob" value="<?php echo $dob; ?>" class="form-control">
            </div>
        </div>
        <div class="row form-group">
            <div class="col-md-6">
                <label for="number">Enter Your Mobile Number</label>
                <input type="text" name="number" id="number"value="<?php echo $number; ?>" placeholder="Enter Your Number..." class="form-control">
            </div>
            <div class="col-md-6">
                <label for="email">Enter Your Email</label>
                <input type="text" name="email" id="email" value="<?php echo $email; ?>" placeholder="Enter Your Email..." class="form-control">
            </div>
        </div>
        <div class="form-group text-center">
            <input type="submit" id="submit" name="Update" class="btn btn-success" value="Update">
        </div>
    </form>
</div>

<br>

<section class="ftco-section-parallax">
    <!-- Your parallax section content goes here -->
</section>

<?php
include('include/footer.php');
?>

<!--<script>
    $(document).ready(function(){
        $("#profile_form").submit(function(e){
            e.preventDefault();
            var formData = new FormData(this);

            $.ajax({
                url: "profile_add.php",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(data){
                    // Handle the response from the server
                    console.log(data);
                }
            });
        });
    });
</script>-->
