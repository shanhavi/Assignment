<?php  
$id=$_GET['id'];

include '../../connection.php';

$sql="SELECT * FROM studentmeeting WHERE Stu_meet_id='$id'";

$query=mysqli_query($con,$sql);

while ($row=mysqli_fetch_array($query)) {

 $mtime=$row['meet_time'];
 $mdate=$row['meet_date'];
 $StudentID=$row['Stu_ID_fk'];
 $EmployeeID=$row['emp_id_fk'];
  # code...
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
           <span class="word">Edit Batch Details</span>

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
                      <label> Meeting Time</label>
                      <input 
                        type="time"
                        name="mtime" 
                        class="form-control" 
                        id="inputPassword4" 
                        placeholder="Time"
                        value="<?php echo $mtime; ?>" >
                    </div>
                    
                    <div class="form-group col-md-6">
                      <label > Meeting Date</label>
                      <input 
                        type="date"
                        name="mdate" 
                        class="form-control" 
                        id="inputEmail4" 
                        placeholder="Date"
                        value="<?php echo $mdate; ?>">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="inputState">Student ID</label>
                      <select
                        type="text" 
                        name="StudentID" 
                        class="form-control"
                        required="" 
                        value="<?php echo $StudentID; ?>">
                        <?php
                        include "../../connection.php";
                        $query ="SELECT * FROM student";
                        $result = mysqli_query($con,$query);

                        while ($row = mysqli_fetch_array($result))
                        {
                          ?>
                          <option value=<?php echo $row["Stu_id"]?>> <?php echo $row["Stu_name"]?></option>
                          <?php
                        }
                        ?>
                      </select>
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

                       $query="SELECT * from employee  ORDER BY Emp_id DESC ";
                       $result=mysqli_query($con,$query);
                       while ($row=mysqli_fetch_array($result)) {
                         ?>
                         <option value= <?php echo $row ["Emp_id"]; ?> ><?php echo $row ["Emp_name"];  ?></option>
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