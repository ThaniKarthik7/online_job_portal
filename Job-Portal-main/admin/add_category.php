<?php
include('connection/db.php');
include('include/header.php');
include('include/sidebar.php');
?>


        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <nav aria-label="breadcrumb">
          
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="admin_dashboard.php">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="category.php">Category</a></li>
            <li class="breadcrumb-item"><a href="#">Add Category</a></li>
            
          </ol>
        </nav>
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
         <h1 class="h2">Add Category</h1> 
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2"> 
               
              </div>
              <!--<a class="btn btn-primary" href="add_customer.php">Add Customer </a>-->
            </div>
          </div>
          <div class="button text-center ">
            <div style="Width : 60%; margin-left : 20%; background-color : #F2F4F4;">
          
            <form action=""  method ="post"style="margin:3%; padding :3%;"name="Company_form"id="Company_form">
            <div id="msg"></div>
                    <div class= "from-group">
                    <label for="Customer Email">Category Name</label>
                    <input type="text" name="category" id="category"class="from-control" placeholder="Enter Company Name">
                </div>

                <div>
        
                <div class="from-group">
                    <label for="Customer Username">Description</label>
                    <textarea name="Description" id="Description" class="from-Control" cols="30" rows="10"></textarea>
                </div>
            
                <div>
            
                
                    <div class="from-group">
                   
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
<script>
  $(document).ready(function(){
    $("#submit").click(function(){
    var Description=$("#Description").val();
    var category=$("#category").val();
    
    if(Description==''){
        alert("Please Enter Description !!");
        return false;
    }
    if(category==''){
        alert("Please Enter Category Name !!");
        return false;
    }
    var data=$("#Company_form").serialize();
    $.ajax({
          type:"POST",
         url:"category_add.php",
          data: data,
           success:function(data){ 
        $("#msg").html(data);
         }
   });
  }); 
  });
  </script>

  </body>
</html>
  