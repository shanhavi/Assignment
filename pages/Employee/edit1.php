<?php

  $id=$_GET['id'];

  include '../../connection.php';

  $sql="SELECT * FROM employee WHERE Emp_id='$id'";

  $query=mysqli_query($con,$sql);

  while ($row=mysqli_fetch_array($query)) {

    $Amount=$row['Amount'];
    $Date=$row['Date'];
    $Increment=$row['Increment'];
    $EmpID=$row['EmpID'];
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
           <span class="word">Edit  Details</span>

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
                        <label>Employee Name</label>
                        <input 
                          type="text"
                          name="name" 
                          class="form-control" 
                          id="inputPassword4" 
                          placeholder="Name"
                          value="<?php echo $name; ?>" >
                      </div>
                      <div class="form-group col-md-6">
                        <label >Employee Address</label>
                        <input 
                          type="text"
                          name="eaddress" 
                          class="form-control" 
                          id="inputPassword4" 
                          placeholder="Address"
                          value="<?php echo $eaddress; ?>">
                      </div>
                      <div class="form-group col-md-6">
                        <label >Employee NIC</label>
                        <input 
                          type="text"
                          name="nic" 
                          class="form-control" 
                          id="inputPassword4" 
                          placeholder="NIC"
                          maxlength="10"
                          value="<?php echo $nic; ?>">
                      </div>
                      <div class="form-group col-md-6">
                        <label >Employee DOB</label>
                        <input 
                          type="date"
                          name="dob" 
                          class="form-control" 
                          id="inputEmail4" 
                          placeholder="DOB"
                          value="<?php echo $dob; ?>">
                      </div>
                      <div class="form-group col-md-6">
                        <label >Employee Email</label>
                        <input 
                          type="email"
                          name="email" 
                          class="form-control" 
                          id="inputEmail4" 
                          placeholder="Email"
                          value="<?php echo $email; ?>">
                      </div>
                       <div class="form-group col-md-6">
                        <label >Employee Username</label>
                        <input 
                          type="text"
                          name="username" 
                          class="form-control" 
                          id="inputEmail4" 
                          placeholder="Email"
                          value="<?php echo $username; ?>">
                      </div>
                      <div class="form-group col-md-6">
                        <label >Password</label>
                        <input 
                          type="password"
                          name="pass" 
                          class="form-control" 
                          id="inputPassword4" 
                          placeholder="Password"
                          value="<?php echo $pass; ?>">
                      </div>
                      <div class="form-group col-md-6">
                        <label >Appointed date</label>
                        <input 
                          type="date"
                          name="adate" 
                          class="form-control" 
                          id="inputPassword4" 
                          placeholder="Password"
                          value="<?php echo $adate; ?>">
                      </div>
                      
                      <div class="form-group col-md-6">
                           <label for="inputState">Gender</label>
                           <select 
                           id="inputState" 
                           class="form-control"
                           name="gender"
                           value="<?php echo $gender; ?>">
                             <option value="<?php echo $gender; ?>"><?php echo $gender; ?></option>
                             <option value="Male">Male</option>
                             <option value="Female">Female</option>
                           </select>
                         </div>
                         <div class="form-group col-md-6">
                           <label for="inputState">Department ID</label>
                           <select
                             type="text" 
                             name="depID" 
                             class="form-control"
                             required="" 
                             value="<?php echo $depID; ?>">
                             <?php
                             include "../../connection.php";
                             $query ="SELECT * FROM deparrtment";
                             $result = mysqli_query($con,$query);

                             while ($row = mysqli_fetch_array($result))
                             {
                               ?>
                               <option value=<?php echo $row["Dep_id"]?>> <?php echo $row["Dep_name"]?></option>
                               <?php
                             }
                             ?>
                           </select>
                         </div>
                         <div class="form-group col-md-6">
                           <label for="inputState">Employee Type ID</label>
                           <select
                             type="text" 
                             name="employeeID" 
                             class="form-control"
                             required="" 
                             value="<?php echo $employeeID; ?>">
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
                             <option value="<?php echo $status; ?>"><?php echo $status; ?></option>
                             <option value="Active">Active</option>
                             <option value="Deactive">Deactive</option>
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


   