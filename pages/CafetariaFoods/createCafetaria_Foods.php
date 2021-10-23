


<!DOCTYPE html>
<html lang="en">
<head>
  <?php include '../../layout/head.php'  ?>

</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <?php include '../../layout/navbar.php'  ?>      <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <?php include '../../layout/sidebar.php' ; ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">

         <div class="page-header">
          <h4 class="ml15"class="page-title">
           <span class="word">Cafetaria Foods Creations</span>

         </h4>

       </div> 
       <!-- Quick Action Toolbar Starts-->
       <div class="card">
        <div class="card-body">

          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
           +Add New
          </button>

          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Add Admin</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">

                  <form method="POST">
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label> Food name</label>
                        <input 
                        type="text"
                        name="name" 
                        class="form-control" 
                        id="inputPassword4" 
                        placeholder="Name"
                        required="">
                      </div>

                      <div class="form-group col-md-6">
                        <label > Food price</label>
                        <input 
                        type="text"
                        name="price" 
                        class="form-control" 
                        id="inputEmail4" 
                        placeholder="Email"
                        required="">
                      </div>

                      <div class="form-group col-md-6">
                        <label > Food code</label>
                        <input 
                        type="text"
                        name="food_code" 
                        class="form-control" 
                        id="inputEmail4" 
                        placeholder="Email"
                        required="">
                      </div>

                         <div class="form-group col-md-6">
                          <label for="inputState">Status</label>
                          <select 
                          id="inputState" 
                          class="form-control"
                          name="status" 
                          required="">
                          <option selected>Choose...</option>
                          <option value="Avalable">Avalable</option>
                          <option value="Not-Avalable">Not-Avalable</option>
                        </select>
                      </div>
                    
                 </div>
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                 <input 
                 type="submit" 
                 name="submit"
                 class="btn btn-outline-info btn-icon-text"
                 value="SUBMIT" 
                 >
               </form>

             </div>

           </div>
         </div>
       </div>
     </div>

     <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">View Cafetaria Foods</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
           <thead>
             <tr>
              <th>Food name</th>
              <th>Food price</th>
              <th>food_code</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php

            include '../../connection.php';

            $sql="SELECT * FROM cafeteria_foods ORDER BY  food_id DESC";

            $query=mysqli_query($con,$sql);

            while ($row=mysqli_fetch_array($query)) {

              ?>

              <tr>
                <td><?php echo $row['Food_name']; ?></td>
                <td><?php echo $row['Food_price']; ?></td>
                <td><?php echo $row['food_code']; ?></td>
                <td>
                  <?php
                  if ($row['status']=="Avalable") {
                    echo '<span class="badge badge-success">Avalable</span>';
                  }
                  else {
                    echo '<span class="badge badge-danger">Not-Avalable</span>';
                  }
                  ?>

                </td>
                <td>

                  <a href="crud/delete.php?id=<?php echo $row['food_id']; ?>"class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                  <a href="view-single.php?id=<?php echo $row['food_id']; ?>" class="btn btn-primary"><i class="fa fa-eye"></i></a>

                  <a href="edit.php?id=<?php echo $row['food_id']; ?>" class="btn btn-success" ><i class="fas fa-edit"></i></i></a>

                </tr>

                <?php
              }

              ?> 
            </td> 

          </tbody>

        </table>
      </div>
    </div>
  </div>
  
</div>

<!-- Quick Action Toolbar Ends-->

</div>
<!-- content-wrapper ends -->
<!-- partial:partials/_footer.html -->
<?php include '../../layout/footer.php'  ?>
<!-- partial -->
</div>
<!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<?php include '../../layout/script.php' ?>
<!-- End custom js for this page -->
</body>
</html>
<!-- insert code -->
<?php 
if (isset($_POST['submit'])) {
  $name=$_POST['name'];
  $price=$_POST['price'];
  $status=$_POST['status'];
  $food_code=$_POST['food_code'];

  include '../../connection.php';

  $sql="INSERT INTO cafeteria_foods (Food_name,Food_price,status,food_code) VALUES ('$name','$price','$status','$food_code')";


  $query= mysqli_query($con,$sql);

  if ($query) {
    ?>

    <script>
      $.alert({
        title: 'Alert!',
        content: 'cafeteria_foods Create successfully!!!!',
        type:'green',
      });
      function pageRedirect() {
        window.location.replace("createCafetaria_Foods.php");
      }      
      setTimeout("pageRedirect()", 2000);
    </script>
    <?php

  }
  else{
    ?>
    <script>
      $.alert({
        title: 'Alert!',
        content: 'Oops... Sorry Something Went Wrong!',
        type: 'red',
      });

    </script>
    <?php
  }



}


?>



