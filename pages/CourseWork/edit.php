<?php  
$id=$_GET['id'];

include '../../connection.php';

$sql="SELECT * FROM studentcoursework WHERE Sc_ID='$id'";

$query=mysqli_query($con,$sql);

while ($row=mysqli_fetch_array($query)) {

  $BatchID=$row['Bat_Id_fk'];
  
   $SemeID=$row['Semi_Id_fk'];
   $CourseID=$row['Course_id_fk'];
   $ModuleID=$row['Sub_id_fk'];
  
   $cwdate=$row['Date'];
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
                        <label for="inputState">Batch ID</label>
                        <select
                          type="text" 
                          name="BatchID" 
                          class="form-control"
                          required="" 
                          value="<?php echo $BatchID; ?>" >
                          <?php
                          include "../../connection.php";
                          $query ="SELECT * FROM batch";
                          $result = mysqli_query($con,$query);

                          while ($row = mysqli_fetch_array($result))
                          {
                            ?>
                            <option value=<?php echo $row["B_ID"]?>> <?php echo $row["B_No"]?></option>
                            <?php
                          }
                          ?>
                        </select>
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
                             $query ="SELECT * FROM course";
                             $result = mysqli_query($con,$query);

                             while ($row = mysqli_fetch_array($result))
                             {
                               ?>
                               <option value=<?php echo $row["C_ID"]?>> <?php echo $row["C_Name"]?></option>
                               <?php
                             }
                             ?>
                           </select>
                         </div>
                         <div class="form-group col-md-6">
                               <label for="inputState">Module ID</label>
                                <select
                                type="text" 
                                name="ModuleID" 

                                class="form-control"
                                required="" 
                                value="<?php echo $ModuleID; ?>">
                                <?php
                                include "../../connection.php";
                                $query ="SELECT * FROM modules";
                                $result = mysqli_query($con,$query);

                                while ($row = mysqli_fetch_array($result))
                                {
                                  ?>
                                  <option value=<?php echo $row["Modules_ID"]?>> <?php echo $row["Module_name"]?></option>
                                  <?php
                                }
                                ?>
                              </select>
                            </div>
                      
                                 <div class="form-group col-md-6">
                                   <label>Date</label>
                                   <input 
                                     type="Date"
                                     name="cwdate" 
                                     class="form-control" 
                                     id="inputPassword4" 
                                     placeholder="Date"
                                     value="<?php echo $cwdate; ?>">
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