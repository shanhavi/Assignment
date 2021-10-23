<?php

  $id=$_GET['id'];

  include '../../connection.php';

  $sql="SELECT * FROM student WHERE Stu_id='$id'";

  $query=mysqli_query($con,$sql);

  while ($row=mysqli_fetch_array($query)) {

    $sname=$row['Stu_name'];
    $sadd=$row['S_Add'];
    $snic=$row['nic'];
    $sdob=$row['DoB'];
    $snum=$row['St_number'];
    $semail=$row['S_Email'];
    $suname=$row['username'];
    $spass=$row['password'];
    $sststus=$row['Status'];

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
           <span class="word">Edit student Details</span>

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
                    id="inputPassword4" 
                    placeholder="Name"
                    value="<?php echo $id; ?>">
                  <div class="form-group col-md-6">
                    <label>Student Name</label>
                    <input 
                    type="text"
                    name="sname" 
                    class="form-control" 
                    id="inputPassword4" 
                    placeholder="Name"
                    value="<?php echo $sname; ?>">
                  </div>
                  <div class="form-group col-md-6">
                    <label >Student Address</label>
                    <input 
                    type="text"
                    name="sadd" 
                    class="form-control" 
                    id="inputPassword4" 
                    placeholder="Address"
                    value="<?php echo $sadd; ?>">
                  </div>
                  <div class="form-group col-md-6">
                    <label >Student NIC</label>
                    <input 
                    type="text"
                    name="snic" 
                    class="form-control" 
                    id="inputPassword4" 
                    placeholder="NIC"
                    maxlength="10"
                    value="<?php echo $snic; ?>">
                  </div>
                  <div class="form-group col-md-6">
                    <label >Student DOB</label>
                    <input 
                    type="date"
                    name="sdob" 
                    class="form-control" 
                    id="inputEmail4" 
                    placeholder="DOB"
                    value="<?php echo $sdob; ?>">
                  </div>
                  <div class="form-group col-md-6">
                    <label >Student Number</label>
                    <input 
                    type="text"
                    name="snum" 
                    class="form-control" 
                    id="inputEmail4" 
                    placeholder="Number"
                    maxlength="10"
                    value="<?php echo $snum; ?>">
                  </div>
                  <div class="form-group col-md-6">
                    <label >Student Email</label>
                    <input 
                    type="email"
                    name="semail" 
                    class="form-control" 
                    id="inputEmail4" 
                    placeholder="Email"
                    value="<?php echo $semail; ?>">
                  </div>
                  <div class="form-group col-md-6">
                    <label >UserName</label>
                    <input 
                    type="text"
                    name="suname" 
                    class="form-control" 
                    id="inputEmail4" 
                    placeholder="UserName"
                    value="<?php echo $suname; ?>">
                  </div>
                  
                  <div class="form-group col-md-6">
                   <label for="inputState">Status</label>
                   <select 
                   id="inputState"
                   name="sststus" 
                   class="form-control"
                   value="<?php echo $spass; ?>">
                    <option value="<?php echo $sststus; ?>"><?php echo $sststus; ?></option>
                   <option value="Active">Active</option>
                   <option value="Deactive">Deactive</option>
                 </select>
               </div>
             </div>

             <input 
             type="submit" 
             name="submit"
             class="btn btn-outline-info btn-icon-text"
             value="Update" 
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


   <div class="modal fade" id="modal-primary">
        <div class="modal-dialog">
          <div class="modal-content bg-primary">
            <div class="modal-header">
              <h4 class="modal-title">Edit Admin Details</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
            <div class="card">
              <div class="card-body">
                 <form method="POST">
                   <div class="form-row">

                    <input 
                      type="hidden" 
                      name="id"                          
                      class="form-control"
                      required="" 
                      value="<?php echo $id; ?>" 
                      
                    >    
                     <div class="form-group col-md-6">
                       <label> Name</label>
                       <input 
                       type="text"
                       name="name" 
                       class="form-control" 
                       id="inputPassword4" 
                       placeholder="Name"
                       required=""
                      value="<?php echo $name; ?>" >
                     </div>

                     <div class="form-group col-md-6">
                       <label > Email</label>
                       <input 
                       type="email"
                       name="email" 
                       class="form-control" 
                       id="inputEmail4" 
                       placeholder="Email"
                       required=""
                       value="<?php echo $email; ?>">
                     </div>
                     <div class="form-group col-md-6">
                       <label > Username</label>
                       <input 
                       type="text"
                       name="username" 
                       class="form-control" 
                       id="inputEmail4" 
                       placeholder="Email"
                       required=""
                       value="<?php echo $username; ?>">
                     </div>
                     <div class="form-group col-md-6">
                       <label >Password</label>
                       <input 
                       type="password"
                       name="password" 
                       class="form-control" 
                       id="inputPassword4" 
                       placeholder="Password"
                       required=""
                       value="<?php echo $password; ?>">
                     </div>
                     <div class="form-group col-md-6">
                      <label for="inputState">Status</label>
                      <select 
                      id="inputState" 
                      class="form-control"
                      name="status" 
                      required=""
                      value="<?php echo $status; ?>">
                      <option selected>Choose...</option>
                      <option value="Active">Active</option>
                      <option value="Deactive">Deactive</option>
                    </select>
                  </div>
                </div>
                              
              </form>
              </div>
            </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
              
              <input 
              type="submit" 
              name="submit"
              class="btn btn-outline-info btn-icon-text"
              value="Update" 
              >
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>