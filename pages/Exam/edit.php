<?php  
$id=$_GET['id'];

include '../../connection.php';

$sql="SELECT * FROM exam WHERE Exam_id='$id'";

$query=mysqli_query($con,$sql);

while ($row=mysqli_fetch_array($query)) {

    $StudentID=$row['stu_id'];
    $exname=$row['ex_name'];
    $SemeID=$row['seme_id'];
    $exdate=$row['ex_date'];
    $extime=$row['ex_time'];
    $results=$row['results_date'];
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
                       <label for="inputState">Student ID</label>
                       <select
                         type="text" 
                         name="StudentID" 
                         class="form-control"
                         required="" 
                         value="<?php echo $StudentID; ?>">
                         <?php
                         include "../../connection.php";
                         $query="SELECT * FROM student";
                         $result=mysqli_query($con,$query);
                         while ($row=mysqli_fetch_array($result)) {
                          ?>
                            <option value=<?php echo $row ["Stu_id"]; ?>><?php echo $row ["Stu_name"];  ?></option>
                            <?php 
                          } 


                          ?>
                       </select>
                     </div>

                     <div class="form-group col-md-6">
                       <label>Exam Name</label>
                       <input 
                         type="text"
                         name="exname" 
                         class="form-control" 
                         id="inputPassword4" 
                         placeholder="Name"
                         value="<?php echo $exname; ?>">
                     </div>
                     <div class="form-group col-md-6">
                       <label for="inputState">Seme ID</label>
                       <select
                         type="text" 
                         name="SemeID" 
                         class="form-control"
                         required="" 
                         value="<?php echo $SemeID; ?>">
                         <?php
                         include "../../connection.php";
                         $query="SELECT * FROM semester";
                         $result=mysqli_query($con,$query);
                         while ($row=mysqli_fetch_array($result)) {
                          ?>
                            <option value=<?php echo $row ["Semi_ID"]; ?>><?php echo $row ["Semi_name"];  ?></option>
                            <?php 
                          } 
                          ?>
                       </select>
                     </div>
                     <div class="form-group col-md-6">
                       <label > Exam Date</label>
                       <input 
                         type="date"
                         name="exdate" 
                         class="form-control" 
                         id="inputEmail4" 
                         placeholder="Date"
                         value="<?php echo $exdate; ?>">
                     </div>
                     <div class="form-group col-md-6">
                       <label > Exam Time</label>
                       <input 
                         type="Time"
                         name="extime" 
                         class="form-control" 
                         id="inputEmail4" 
                         placeholder="Date"
                         value="<?php echo $extime; ?>">
                     </div>
                     <div class="form-group col-md-6">
                       <label >Results Date</label>
                       <input 
                         type="date"
                         name="results" 
                         class="form-control" 
                         id="inputEmail4" 
                         placeholder="Date"
                         value="<?php echo $results; ?>">
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