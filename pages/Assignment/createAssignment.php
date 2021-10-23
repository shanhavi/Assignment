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
               <span class="word">Assignment Creations</span>
             
             </h4>
          
           </div> 
            <!-- Quick Action Toolbar Starts-->
            <div class="card">
              <div class="card-body">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                +Add New
              </button>
                 <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                   <div class="modal-dialog">
                     <div class="modal-content">
                       <div class="modal-header">
                         <h5 class="modal-title" id="exampleModalLabel">Add Assignment</h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true"></span>
                         </button>
                       </div>
                       <div class="modal-body">

                       <form method="POST">
                         <div class="form-row">
                           <div class="form-group col-md-6">
                             <label> Assignment DeadLine Date </label>
                             <input 
                               type="Date" 
                               class="form-control" 
                               id="inputPassword4" 
                               placeholder="DeadLine"
                               name="add">
                           </div>

                           <div class="form-group col-md-6">
                             <label> Assignment DeadLine Time </label>
                             <input 
                               type="time" 
                               class="form-control" 
                               id="inputPassword4" 
                               placeholder="DeadLine"
                               name="adt">
                           </div>
                          
                           <div class="form-group col-md-6">
                             <label for="inputState">Batch ID</label>
                             <select
                               type="text" 
                               name="BatchID" 
                               class="form-control"
                               required="" 
                               >
                               <?php
                               include "../../connection.php";
                               $query ="SELECT * FROM batch";
                               $result = mysqli_query($con,$query);

                               while ($row = mysqli_fetch_array($result))
                               {
                                 ?>
                                 <option value=<?php echo $row["B_ID"]?>> <?php echo $row["Batch_name"]?></option>
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
                               >
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
                             <label for="inputState">Module ID</label>
                             <select
                               type="text" 
                               name="ModuleID" 
                               class="form-control"
                               required="" 
                               >
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
                             <label> Assignment Results Date </label>
                             <input 
                               type="Date"
                               name="ard" 
                               class="form-control" 
                               id="inputPassword4" 
                               placeholder="Date">
                           </div>

                              <div class="form-group col-md-6">
                               <label for="inputState">Status</label>
                               <select 
                               id="inputState" 
                               class="form-control"
                               name="status" 
                               required="">
                               <option selected>Choose...</option>
                               <option value="Published">Published</option>
                               <option value="Un_Published">Un_Published</option>
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
                 <div class="card shadow mb-4">
                  <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">View Assignment</h6>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                       <thead>
                         <tr>
                          <th>Assignment DeadLine Date </th>
                          <th>Assignment DeadLine Time</th>
                          <th>Batch ID</th>
                          <th>Semester ID</th>
                          <th>Module ID</th>
                         <th>Assignment Results Date</th>
                         <th>Status</th>
                         <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php

                        include '../../connection.php';

                        $sql="SELECT * FROM assignment a INNER JOIN batch b ON a.Batch_id=b.B_ID INNER JOIN semester s ON a.Semi_id_fk=s.Semi_ID INNER JOIN modules m ON a.mod_id_fk=m.Modules_ID ORDER BY A_ID DESC";

                        $query=mysqli_query($con,$sql);

                        while ($row=mysqli_fetch_array($query)) {

                          ?>

                          <tr>
                           
                            <td><?php echo $row['assignment_deadline_date']; ?></td>
                            <td><?php echo $row['assignment_deadline_TIME']; ?></td>
                            <td><?php echo $row['Batch_name']; ?></td>
                            <td><?php echo $row['Semi_name']; ?></td>
                            <td><?php echo $row['Module_name']; ?></td>
                            <td><?php echo $row['Ass_Res_Date']; ?></td>
                            <td><?php echo $row['status']; ?></td>

                            <td>

                              <a href="crud/delete.php?id=<?php echo $row['A_ID']; ?>"class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                              <a href="view-single.php?id=<?php echo $row['A_ID']; ?>" class="btn btn-primary"><i class="fa fa-eye"></i></a>

                              <a href="edit.php?id=<?php echo $row['A_ID']; ?>" class="btn btn-success" ><i class="fas fa-edit"></i></i></a>

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
  $add=$_POST['add'];
  $adt=$_POST['adt'];
  $BatchID=$_POST['BatchID'];
  $SemeID=$_POST['SemeID'];
  $ModuleID=$_POST['ModuleID'];
  $ard=$_POST['ard'];
  $status=$_POST['status'];


  include '../../connection.php';

  $sql="INSERT INTO assignment(assignment_deadline_date, assignment_deadline_TIME, Batch_id,Semi_id_fk, mod_id_fk, Ass_Res_Date,status) VALUES ('$add','$adt','$BatchID','$SemeID','$ModuleID','$ard','$status')";


  $query= mysqli_query($con,$sql);

  if ($query) {
    ?>

    <script>
      $.alert({
        title: 'Alert!',
        content: 'assignment Create successfully!!!!',
        type:'green',
      });
      function pageRedirect() {
        window.location.replace("createAssignment.php");
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
