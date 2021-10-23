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
               <span class="word">Employee Creations</span>
             
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
                     <h5 class="modal-title" id="exampleModalLabel">Add Payment</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                     </button>
                   </div>
                   <div class="modal-body">

                    <form method="POST">
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label>Employee Name</label>
                          <input 
                            type="text"
                            name="name" 
                            class="form-control" 
                            id="inputPassword4" 
                            placeholder="Name">
                        </div>
                        <div class="form-group col-md-6">
                          <label >Employee Address</label>
                          <input 
                            type="text"
                            name="eaddress" 
                            class="form-control" 
                            id="inputPassword4" 
                            placeholder="Address">
                        </div>
                        <div class="form-group col-md-6">
                          <label >Employee NIC</label>
                          <input 
                            type="text"
                            name="nic" 
                            class="form-control" 
                            id="inputPassword4" 
                            placeholder="NIC"
                            maxlength="10">
                        </div>
                        <div class="form-group col-md-6">
                          <label >Employee DOB</label>
                          <input 
                            type="date"
                            name="dob" 
                            class="form-control" 
                            id="inputEmail4" 
                            placeholder="DOB">
                        </div>
                        <div class="form-group col-md-6">
                          <label >Employee Email</label>
                          <input 
                            type="email"
                            name="email" 
                            class="form-control" 
                            id="inputEmail4" 
                            placeholder="Email">
                        </div>
                         <div class="form-group col-md-6">
                          <label >Employee Username</label>
                          <input 
                            type="text"
                            name="username" 
                            class="form-control" 
                            id="inputEmail4" 
                            placeholder="Email">
                        </div>
                        <div class="form-group col-md-6">
                          <label >Password</label>
                          <input 
                            type="password"
                            name="pass" 
                            class="form-control" 
                            id="inputPassword4" 
                            placeholder="Password">
                        </div>
                        <div class="form-group col-md-6">
                          <label >Appointed date</label>
                          <input 
                            type="date"
                            name="adate" 
                            class="form-control" 
                            id="inputPassword4" 
                            placeholder="Password">
                        </div>
                        
                        <div class="form-group col-md-6">
                             <label for="inputState">Gender</label>
                             <select 
                             id="inputState" 
                             class="form-control"
                             name="gender">
                               <option selected>Choose...</option>
                               <option value="Male">Male</option>
                               <option value="Female">Female</option>
                             </select>
                           </div>
                          <div class="form-group col-md-6">
                             <label for="inputState">Employee Type ID</label>
                             <select
                               type="text" 
                               name="employeeID" 
                               class="form-control"
                               required="" 
                               >
                               <?php
                               include "../../connection.php";
                               $query ="SELECT * FROM employee_type";
                               $result = mysqli_query($con,$query);

                               while ($row = mysqli_fetch_array($result))
                               {
                                 ?>
                                 <option value=<?php echo $row["et_id"]?>> <?php echo $row["employee_type"]?></option>
                                 <?php
                               }
                               ?>
                             </select>
                           </div>

                              <div class="form-group col-md-6">
                               <label for="inputState">Status</label>
                               <select 
                               id="inputState" 
                               class="form-control"
                               name="status" 
                               required="">
                               <option selected>Choose...</option>
                               <option value="Active">Active</option>
                               <option value="Deactive">Deactive</option>
                             </select>
                           </div>
                      </div>
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
            </div>
            <!-- Quick Action Toolbar Ends-->
            <div class="card shadow mb-4">
             <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">View Employee </h6>
             </div>

             <div class="card-body">
               <div class="table-responsive">
                 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                     <th>Employee Name</th>
                     <th>Employee Address</th>
                     <th>Employee NIC</th>
                     <th>Employee DOB</th>
                     <th>Employee Email</th>
                     <th>Employee Username</th>
                     <th>Password</th>
                     <th>Appointed date</th>
                     <th>Gender</th>
                     
                     <th>Employee type</th>
                     <th>Status</th>
                     <th>Action</th>
                   </tr>
                 </thead>
                 <tbody>
                   <?php

                   include '../../connection.php';

                   $sql="SELECT * FROM employee e INNER JOIN employee_type et ON e.Emp_type=et.et_id ORDER BY Emp_id DESC";

                   $query=mysqli_query($con,$sql);

                   while ($row=mysqli_fetch_array($query)) {

                     ?>

                     <tr>
                       <td><?php echo $row['Emp_name']; ?></td>
                       <td><?php echo $row['emp_Add']; ?></td>
                       <td><?php echo $row['nic']; ?></td>
                       <td><?php echo $row['DoB']; ?></td>
                       <td><?php echo $row['E_Email']; ?></td>
                       <td><?php echo $row['username']; ?></td>
                       <td><?php echo $row['password']; ?></td>
                       <td><?php echo $row['postingdate']; ?></td>
                       <td><?php echo $row['gender']; ?></td>
                       
                       <td><?php echo $row['employee_type']; ?></td>
                       <td>
                         <?php
                         if ($row['Status']=="Active") {
                           echo '<span class="badge badge-success">Active</span>';
                         }
                         else {
                           echo '<span class="badge badge-danger">Deactive</span>';
                         }
                         ?>

                       </td>
                       
                      
                       <td>

                         <a href="crud/delete.php?id=<?php echo $row['Emp_id']; ?>"class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                         <a href="view-single.php?id=<?php echo $row['Emp_id']; ?>" class="btn btn-primary"><i class="fa fa-eye"></i></a>

                         <a href="edit.php?id=<?php echo $row['Emp_id']; ?>" class="btn btn-success" ><i class="fas fa-edit"></i></i></a>

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
  $name=$_POST['name'];
  $eaddress=$_POST['eaddress'];
  $nic=$_POST['nic'];
  $dob=$_POST['dob'];
  $email=$_POST['email'];
  $username=$_POST['username'];
  $pass=$_POST['pass'];
  $adate=$_POST['adate'];
  $gender=$_POST['gender'];
  $employeeID=$_POST['employeeID'];
  $status=$_POST['status'];


  include '../../connection.php';

  $sql="INSERT INTO employee( Emp_name, emp_Add, nic, DoB, E_Email, username, password, postingdate, gender, Emp_type, Status) VALUES ('$name','$eaddress','$nic','$dob','$email','$username','$pass','$adate','$gender','$employeeID','$status')";


  $query= mysqli_query($con,$sql);

  if ($query) {
    ?>

    <script>
      $.alert({
        title: 'Alert!',
        content: 'employee Create successfully!!!!',
        type:'green',
      });
      function pageRedirect() {
        window.location.replace("createEmployee.php");
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
