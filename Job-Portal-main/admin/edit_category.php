<?php
include('connection/db.php');
include('include/header.php');
include('include/sidebar.php');
$id = $_GET['edit'];
$query = mysqli_query($c, "SELECT * FROM job_category WHERE id='$id'");
while($row=mysqli_fetch_array($query)){
    $category=$row['category'];
    $des=$row['des'];
}


?>


<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <nav aria-label="breadcrumb">
          
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="admin_dashboard.php">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="category.php">Company</a></li>
            <li class="breadcrumb-item"><a href="#">Update Company</a></li>
            
          </ol>
        </nav>
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
         <h1 class="h2">Update Company</h1> 
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2"> 
               
              </div>
              <!--<a class="btn btn-primary" href="add_customer.php">Add Customer </a>-->
            </div>
          </div>
          <div class="button text-center ">
            <div style="Width : 60%; margin-left : 20%; background-color : #F2F4F4;">
            <div id="msg"></div>
            <form action=""  method ="post"style="margin:3%; padding :3%;"name="customer_form"id="customer_form">
            
                    <div class= "from-group">
                    <label for="Customer Email">Enter Category Name</label>
                    <input type="Company" name="category" id="category" value="<?php echo $category; ?>" class="from-control" placeholder="Enter Category name">
                </div>

                <div>
        
                <div class="from-group">
                    <label for="Customer Username">Enter Description</label>
                <textarea name="des" id="des" class="from-control" cols="30" rows="10">
                    <?php echo $des; ?>
                </textarea>
                </div>

          

                    <input type="hidden" name ="id" id="id" value ="<?php echo $_GET['edit']; ?>">

                    <div class="from-group">
                   
                    <input type="submit" class="btn btn-block btn-success" placeholder="Update" name="submit" id="submit">
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
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><//script>')</script>
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


  </body>
</html>

<?php
include('connection/db.php');
if(isset($_POST['submit'])){
  $id = $_POST['id'];
  $category = $_POST['category']; // Note the uppercase 'C' for 'Company'
  $des = $_POST['des']; // Note the lowercase 'd' for 'des'
  
  $query = mysqli_query($c, "UPDATE job_category SET category='$category', des='$des' WHERE  id='$id'");
  
if($query1){
    echo"<script>
    alert('Record has been Update successfully !!!')</script>";

}else{
    echo"<script>alert('some error Please try again  !!!!!!)</script>";
}
}
?>