


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
           <span class="word">cafetaria income Creations</span>

         </h4>

       </div> 
       <!-- Quick Action Toolbar Starts-->
       <div class="card">
        <div class="card-body">

          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            +Add
          </button>

          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Add cafetaria income</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">

                  <form method="POST">
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label> Food id</label>
                          <select
                          type="text" 
                          name="foodID" 
                          class="form-control"
                          required="" 
                          >
                          <?php
                          include "../../connection.php";
                          $query ="SELECT * FROM cafeteria_foods";
                          $result = mysqli_query($con,$query);

                          while ($row = mysqli_fetch_array($result))
                          {
                            ?>
                            <option value=<?php echo $row["food_id"]?>> <?php echo $row["Food_name"]?></option>
                            <?php
                          }
                          ?>
                        </select>
                      </div>

                      <div class="form-group col-md-6">
                        <label > Quantity</label>
                        <input 
                        type="text"
                        name="qty" 
                        class="form-control" 
                        id="inputEmail4" 
                        placeholder="Email"
                        required="">
                      </div>
                      <div class="form-group col-md-6">
                        <label > Total Income</label>
                        <input 
                        type="text"
                        name="tincome" 
                        class="form-control" 
                        id="inputEmail4" 
                        placeholder="Email"
                        required="">
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
        <h6 class="m-0 font-weight-bold text-primary">View cafetaria income</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
           <thead>
             <tr>
              <th>Food id</th>
              <th>Quantity</th>
              <th>Total Income</th>
            
            </tr>
          </thead>
          <tbody>
            <?php

            include '../../connection.php';

            $sql="SELECT * FROM cafetariaincome ci INNER JOIN cafeteria_foods cf ON ci.Food_id_fk=cf.food_id ORDER BY  CafeIncome_ID DESC";

            $query=mysqli_query($con,$sql);

            while ($row=mysqli_fetch_array($query)) {

              ?>

              <tr>
                <td><?php echo $row['Food_name']; ?></td>
                <td><?php echo $row['Quantity']; ?></td>
                <td><?php echo $row['Amount']; ?></td>

               
                </tr>

                <?php
              }

              ?> 
           

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
  $email=$_POST['email'];
  $username=$_POST['username'];
  $password=$_POST['password'];
  $status=$_POST['status'];


  include '../../connection.php';

  $sql="INSERT INTO `admin`(Admin_name,email,Admin_username,Admin_Password,status) VALUES ('$name','$email','$username','$password','$status')";



  $query= mysqli_query($con,$sql);

  if ($query) {
    ?>

    <script>
      $.alert({
        title: 'Alert!',
        content: 'Admin Create successfully!!!!',
        type:'green',
      });
      function pageRedirect() {
        window.location.replace("Create.php");
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



