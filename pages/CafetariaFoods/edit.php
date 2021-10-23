<?php

  $id=$_GET['id'];

  include '../../connection.php';

  $sql="SELECT * FROM cafeteria_foods WHERE Food_ID='$id'";

  $query=mysqli_query($con,$sql);

  while ($row=mysqli_fetch_array($query)) {

      $name=$row['Food_name'];
     $price=$row['Food_price'];
    
     $food_code=$row['food_code'];
      $status=$row['status'];

  }
?>

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
           <span class="word">Edit Admin Details</span>

         </h4>

       </div> 
       <!-- Quick Action Toolbar Starts-->
       <div class="card">
        <div class="card-body">

          <!-- Button trigger modal -->
             <form action="crud/update.php" method="POST">
                    <div class="form-row">
                      <input 
                        type="hidden" 
                        name="id"                          
                        class="form-control"
                        required="" 
                        value="<?php echo $id; ?>" 
                        
                      >

                      <div class="form-group col-md-6">
                        <label> Food name</label>
                        <input 
                        type="text"
                        name="name" 
                        class="form-control" 
                        id="inputPassword4" 
                        placeholder="Name"
                        required=""
                        value="<?php echo $name; ?>">
                      </div>

                      <div class="form-group col-md-6">
                        <label > Food price</label>
                        <input 
                        type="text"
                        name="price" 
                        class="form-control" 
                        id="inputEmail4" 
                        placeholder="Email"
                        required=""
                        value="<?php echo $price; ?>">
                      </div>

                       <div class="form-group col-md-6">
                        <label > Food code</label>
                        <input 
                        type="text"
                        name="food_code" 
                        class="form-control" 
                        id="inputEmail4" 
                        placeholder="Email"
                        required=""
                        value="<?php echo $food_code; ?>">
                      </div>

                         <div class="form-group col-md-6">
                          <label for="inputState">Status</label>
                          <select 
                          id="inputState" 
                          class="form-control"
                          name="status" 
                          required=""
                          value="<?php echo $status; ?>">
                           <option value="<?php echo $status; ?>"><?php echo $status; ?></option>
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
                 value="UPDATE" 
                 >
               </form>

          <!-- Modal -->
         
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


   