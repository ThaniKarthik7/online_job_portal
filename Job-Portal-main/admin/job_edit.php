<?php
include('include/header.php');
include('include/sidebar.php');
?>
<?php
include("connection/db.php");
echo $edit= $_GET['edit'];
$query=mysqli_query($c,"select * from all_jobs where job_id='$edit'");
while($row=mysqli_fetch_array($query)){
    $Title=$row['job_title'];
    $Description=$row['des'];
    $Country=$row['country'];
    $State=$row['state'];
    $City=$row['city'];
    $keyword=$row['keyword'];
    $category=$row['category'];
}
$categoryQuery = mysqli_query($c, "SELECT * FROM job_category");

?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
  <nav aria-label="breadcrumb">

    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="admin_dashboard.php">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="Job_create.php">All Job List</a></li>
      <li class="breadcrumb-item"><a href="#">Add JOB</a></li>

    </ol>
  </nav>
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Add JOB</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group mr-2">

      </div>
      <!--<a class="btn btn-primary" href="add_customer.php">Add Customer </a>-->
    </div>
  </div>
  <div class="button text-center ">
    <div style="Width : 60%; margin-left : 20%; background-color : #F2F4F4;">

      <form action="" method="post" style="margin:3%; padding :3%;" name="Job_form" id="Job_form">
        <div id="msg"></div>
        <div class="form-group">
          <label for="Customer Email">Job Title</label>
          <input type="text" value="<?php echo $Title; ?>" name="job_title" id="job_title" class="form-control" placeholder="Enter Job Title">
        </div>

        <div>

          <div class="from-group">
            <label for="Customer Username">Description</label>
            <textarea name="Description" id="Description" class="form-Control" cols="30" rows="10"><?php echo $Description; ?></textarea>
          </div>
          <div class="form-group">
            <label for="">Country</label>
            <textarea name="country" class="countries form-control" id="countryId" placeholder="Enter the Country Name"><?php echo $Country; ?></textarea>
          </div>
          <input type="hidden" name="id" id="is" value="<?php echo $_GET['edit']; ?>">
          <div class="form-group">
            <label for="">State</label>
            <textarea name="state" class="states form-control" id="stateId" Placeholder="Enter the State Name"><?php echo $State; ?></textarea>
          </div>
          <div class="form-group">
            <label for="">City</label>
            <textarea name="city" class="cities form-control" id="cityId" placeholder="Enter the City Name"><?php echo $City; ?></textarea>
          </div>
          <div class="form-group">
            <label for="">keyword</label>
            <textarea name="keyword" class="cities form-control" id="keyword" placeholder="Enter the keyword"><?php echo $keyword; ?></textarea>
            <div class="form-group">
    <label for="">Select category</label>
    <select name="category" class="form-control" id="category">
        <?php
        while($categoryRow=mysqli_fetch_array($categoryQuery)){
        ?>
        <option value ="<?php echo $categoryRow['id']; ?>" <?php if($categoryRow['id'] == $category) echo "selected"; ?>><?php echo $categoryRow['category'];?></option>
        <?php
        }
        ?>
    </select>
</div>
          <div class="form-group">

            <input type="submit" class="btn btn-block btn-success" placeholder="Save" name="submit" id="submit">
          </div>

        </div>
      </form>
    </div>



    <canvas class="my-4" id="myChart" width="900" height="380"></canvas>


    <div class="table-responsive">

    </div>
</main>
</div>
</div>

<!-- Bootstrap core JavaScript
    < ! ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script>
  window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><//script>')
</script>
<script src="../../assets/js/vendor/popper.min.js"></script>
<script src="../../dist/js/bootstrap.min.js"></script>

<!-- Icons -->
<script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
<script>
  feather.replace()
</script>


<!--datatables plugin-->
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css"></script>
<script>
  new DataTable('#example');
</script>
<script>
  $(document).ready(function() {
    $("#submit").click(function() {
      var Description = $("#Description").val();
      var job_title = $("#job_title").val();
      var countryId = $("#countryId").val();
      var stateId = $("#stateId").val();
      var cityId = $("#cityId").val();
      var keyword=$("#keyword").val();

      if (job_title == '') {
        alert("Please Enter Job Title !!");
        return false;
      }
      if (Description == '') {
        alert("Please Enter Description !!");
        return false;
      }
      if (countryId == '') {
        alert("Please Select CountryID !!");
        return false;
      }
      if (stateId == '') {
        alert("Please Select StateID !!");
        return false;
      }
      if (cityId == '') {
        alert("Please cityID !!");
        return false;
      }
      if (keyword == '') {
        alert("Please Keyword !!");
        return false;
      }
      var data = $("#Job_form").serialize();
     
    });
  });
</script>

</body>
</html>
<?php
include("connection/db.php");
if(isset($_POST['submit'])){
    $id=$_POST['id']; 
    $job_title=$_POST['job_title'];
    $Description=$_POST['Description'];
    $State=$_POST['state'];
    $Country=$_POST['country'];
    $City=$_POST['city'];
    $keyword=$_POST['keyword'];
    $category=$_POST['category'];
  
    $query = mysqli_query($c, "UPDATE all_jobs SET job_title='$job_title', des='$Description', state='$State', country='$Country', city='$City',keyword='$keyword' ,category='$category' WHERE job_id='$id'");
  
    if($query){
        echo "<script>alert('Record has been updated successfully !!!')</script>";
    } else {
        echo "<script>alert('Some error occurred. Please try again.')</script>";
    }
}
?>
