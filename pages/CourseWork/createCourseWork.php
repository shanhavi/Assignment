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
               <span class="word">Student CourseWork Creations</span>
             
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
                         <h5 class="modal-title" id="exampleModalLabel">Add CourseWork</h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true"></span>
                         </button>
                       </div>
                       <div class="modal-body">

                        <form method="POST">
                          <div class="form-row">
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
                                  <label for="inputState">Course ID</label>
                                   <select
                                   type="text" 
                                   name="CourseID" 

                                   class="form-control"
                                   required="" 
                                   >
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
                                         <label>Date</label>
                                         <input 
                                           type="Date"
                                           name="cwdate" 
                                           class="form-control" 
                                           id="inputPassword4" 
                                           placeholder="Date">
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
                <div class="card shadow mb-4">
                 <div class="card-header py-3">
                   <h6 class="m-0 font-weight-bold text-primary">View CourseWork</h6>
                 </div>
                 <div class="card-body">
                   <div class="table-responsive">
                     <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                         <th>Batch ID</th>
                         
                         <th>Seme ID</th>
                         <th>Course ID</th>
                         <th>Module ID</th>
                         
                         <th>Date</th>
                         <th>Action</th>
                       </tr>
                     </thead>
                     <tbody>
                       <?php

                       include '../../connection.php';

                       $sql="SELECT * FROM studentcoursework  ORDER BY  Sc_ID DESC";

                       $query=mysqli_query($con,$sql);

                       while ($row=mysqli_fetch_array($query)) {

                         ?>

                         <tr>
                           <td><?php echo $row['Bat_Id_fk']; ?></td>
                           
                           <td><?php echo $row['Semi_Id_fk']; ?></td>
                           <td><?php echo $row['Course_id_fk']; ?></td>
                           <td><?php echo $row['mod_id_fk']; ?></td>
                           
                           <td><?php echo $row['Date']; ?></td>

                           <td>

                             <a href="crud/delete.php?id=<?php echo $row['Sc_ID']; ?>"class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                             <a href="view-single.php?id=<?php echo $row['Sc_ID']; ?>" class="btn btn-primary"><i class="fa fa-eye"></i></a>

                             <a href="edit.php?id=<?php echo $row['Sc_ID']; ?>" class="btn btn-success" ><i class="fas fa-edit"></i></i></a>

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
  $BatchID=$_POST['BatchID'];
 
  $SemeID=$_POST['SemeID'];
  $CourseID=$_POST['CourseID'];
  $ModuleID=$_POST['ModuleID'];
 
  $cwdate=$_POST['cwdate'];
  

  include '../../connection.php';

  $sql="INSERT INTO studentcoursework(Bat_Id_fk,Semi_Id_fk,Course_id_fk,mod_id_fk,Date) VALUES ('$BatchID','$SemeID','$CourseID','$ModuleID','$cwdate')";


  $query= mysqli_query($con,$sql);

  if ($query) {
    ?>

    <script>
      $.alert({
        title: 'Alert!',
        content: 'studentcoursework Create successfully!!!!',
        type:'green',
      });
      function pageRedirect() {
        window.location.replace("createCourseWork.php");
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
