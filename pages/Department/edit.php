<?php

  $id=$_GET['id'];

  include '../../connection.php';

  $sql="SELECT * FROM deparrtment WHERE Dep_id='$id'";

  $query=mysqli_query($con,$sql);

  while ($row=mysqli_fetch_array($query)) {

    $dtype=$row['Dep_name'];
    $Employeefk=$row['emp_id_fk'];

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
           <span class="word">Edit Department Details</span>

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
                         <label for="inputState">Department Type</label>
                         <select 
                         id="inputState" 
                         class="form-control"
                         name="dtype"
                         value="<?php echo $dtype; ?>" >
                           <option value="<?php echo $dtype; ?>"><?php echo $dtype; ?></option>
                           
                                   <option value="Diploma">Diploma</option>
                                   <option value="HND">HND</option>
                                   <option value="Degree">Degree</option>
                                   <option value="MBA">MBA</option>
                                   <option value="MBA">Management</option>
                                   <option value="MBA">WEB</option>
                                   <option value="MBA">Hardware</option>
                                   <option value="MBA">Animations</option>
                                   <option value="MBA">3D</option>
                                   <option value="MBA">Graphics</option>
                         </select>
                       </div>
                      <div class="form-group col-md-6">
                         <label for="inputState">Employee name</label>
                         <select
                           type="text" 
                           name="Employeefk" 
                           class="form-control"
                           required="" 
                           value="<?php echo $Employeefk; ?>">
                       
                         <?php
                         include "../../connection.php";
                         $query ="SELECT * FROM employee";
                         $result = mysqli_query($con,$query);

                         while ($row = mysqli_fetch_array($result))
                         {
                           ?>
                           <option value=<?php echo $row["Emp_id"]?>> <?php echo $row["Emp_name"]?></option>
                           <?php
                         }
                         ?>
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

