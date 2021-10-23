<?php

  $id=$_GET['id'];

  include '../../connection.php';

  $sql="SELECT * FROM modules WHERE Modules_ID='$id'";

  $query=mysqli_query($con,$sql);

  while ($row=mysqli_fetch_array($query)) {

      $mname=$row['Module_name'];
      $EmployeeID=$row['Emp_ID_fk'];
      $CourseID=$row['C_ID_fk'];
      $SemesterID=$row['Semi_ID_fk'];

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
                        <label> Modules Name</label>
                        <input 
                          type="text"
                          name="mname" 
                          class="form-control" 
                          id="inputPassword4" 
                          placeholder="Name"
                          value="<?php echo $mname; ?>">
                      </div>
                      <div class="form-group col-md-6">
                         <label for="inputState">Employee ID</label>
                         <select
                           type="text" 
                           name="EmployeeID" 
                           class="form-control"
                           required="" 
                           value="<?php echo $EmployeeID; ?>">
                           <?php
                           include "../../connection.php";

                           $query="SELECT * from employee e INNER JOIN employee_type et on e.Emp_type=et.et_id WHERE et.employee_type='Lecturer' ORDER BY Emp_id DESC ";
                           $result=mysqli_query($con,$query);
                           while ($row=mysqli_fetch_array($result)) {
                             ?>
                             <option value= <?php echo $row ["Emp_id"]; ?> ><?php echo $row ["Emp_name"];  ?></option>
                             <?php 
                            } 


                            ?>
                         </select>
                       </div>
                       <div class="form-group col-md-6">
                         <label for="inputState">Course ID</label>
                         <select
                           type="text" 
                           name="CourseID" 
                           class="form-control"
                           required="" 
                           value="<?php echo $CourseID; ?>">
                            <?php
                             include "../../connection.php";

                             $query="SELECT * from course";
                             $result=mysqli_query($con,$query);
                             while ($row=mysqli_fetch_array($result)) {
                               ?>
                               <option value= <?php echo $row ["C_ID"]; ?> ><?php echo $row ["C_Name"];  ?></option>
                               <?php 
                              } 


                              ?>
                           </select>
                          
                       </div>
                       <div class="form-group col-md-6">
                         <label for="inputState">Semester ID</label>
                         <select
                           type="text" 
                           name="SemesterID" 
                           class="form-control"
                           required="" 
                           value="<?php echo $SemesterID; ?>">
                               <?php
                               include "../../connection.php";
                               $query ="SELECT * FROM semester";
                               $result = mysqli_query($con,$query);

                               while ($row = mysqli_fetch_array($result))
                               {
                                 ?>
                                 <option value=<?php echo $row["Semi_ID"]?>> <?php echo $row["Semi_name"]?></option>
                                 <?php
                               }
                               ?>
                           
                           
                         </select>
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


   