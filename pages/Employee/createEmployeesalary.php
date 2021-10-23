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
               <span class="word">Employee salary</span>
             
             </h4>
          
           </div> 
            <!-- Quick Action Toolbar Starts-->
            <div class="card">
              <div class="card-body">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
               +Add
             </button>

              <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
               <div class="modal-dialog">
                 <div class="modal-content">
                   <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel">Add salary</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                     </button>
                   </div>
                   <div class="modal-body">

                  <form method="POST">
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label>Amount</label>
                        <input 
                          type="text"
                          name="Amount" 
                          class="form-control" 
                          id="inputPassword4" 
                          placeholder="Amount">
                      </div>
                      <div class="form-group col-md-6">
                        <label >Salary Date</label>
                        <input 
                          type="Date"
                          name="Date" 
                          class="form-control" 
                          id="inputPassword4" 
                          placeholder="Date">
                      </div>
                    
                      
                      <div class="form-group col-md-6">
                         <label for="inputState">Employee ID</label>
                         <select
                           type="text" 
                           name="EmpID" 
                           class="form-control"
                           required="" 
                           >
                       
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

                       <div class="form-group col-md-6">
                         <label >Increment</label>
                         <input 
                           type="text"
                           name="Increment" 
                           class="form-control" 
                           id="inputPassword4" 
                           placeholder="Increment"
                           >
                       </div>
                            <div class="form-group col-md-6">
                             <label for="inputState">Status</label>
                             <select 
                             id="inputState" 
                             class="form-control"
                             name="status" 
                             required="">
                             <option selected>Choose...</option>
                             <option value="salary_issue">salary_issue</option>
                             <option value="not_issue">not_issue</option>
                           </select>

                         </div>
                       </div>

                         <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
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
            <!-- Quick Action Toolbar Ends-->
                <div class="card shadow mb-4">
                 <div class="card-header py-3">
                   <h6 class="m-0 font-weight-bold text-primary">View Employee Salary</h6>
                 </div>
                 <div class="card-body">
                   <div class="table-responsive">
                     <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                         <th>Amount</th>
                         <th>Salary Date</th>
                         <th>Employee Name</th>
                         <th>Increment</th>
                         <th>Status</th>
                         <th>Action</th>
                       </tr>
                     </thead>
                     <tbody>
                       <?php

                       include '../../connection.php';

                       $sql="SELECT * FROM salary s INNER JOIN employee e ON s.Emp_id_fk=e.Emp_id ORDER BY Sal_iD DESC";

                       $query=mysqli_query($con,$sql);

                       while ($row=mysqli_fetch_array($query)) {

                         ?>

                         <tr>
                           <td><?php echo $row['Amount']; ?></td>
                           <td><?php echo $row['Sal_date']; ?></td>
                           <td><?php echo $row['Emp_name']; ?></td>
                           <td><?php echo $row['Increment']; ?></td>

                          <td>
                            <?php
                            if ($row['status']=="salary_issue") {
                              echo '<span class="badge badge-success">salary_issue</span>';
                            }
                            else {
                              echo '<span class="badge badge-danger">not_issue</span>';
                            }
                            ?>

                          </td>
                           <td>

                             <a href="crud/delete1.php?id=<?php echo $row['Sal_iD']; ?>"class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                             <a href="view-single.php?id=<?php echo $row['Sal_iD']; ?>" class="btn btn-primary"><i class="fa fa-eye"></i></a>

                             <a href="edit.php?id=<?php echo $row['Sal_iD']; ?>" class="btn btn-success" ><i class="fas fa-edit"></i></i></a>

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

<?php 
if (isset($_POST['submit'])) {
  $Amount=$_POST['Amount'];
  $Date=$_POST['Date'];
  $Increment=$_POST['Increment'];
  $EmpID=$_POST['EmpID'];
  $status=$_POST['status'];
  
 

  include '../../connection.php';

  $sql="INSERT INTO salary( Amount, Sal_date, Emp_id_fk, Increment,status) VALUES ('$Amount','$Date','$EmpID','$Increment','$status')";


  $query= mysqli_query($con,$sql);

  if ($query) {
    ?>

    <script>
      $.alert({
        title: 'Alert!',
        content: 'successfully issued salary!!!!',
        type:'green',
      });
      function pageRedirect() {
        window.location.replace("createEmployeesalary.php");
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
