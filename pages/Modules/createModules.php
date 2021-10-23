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
               <span class="word">Modules Creations</span>
             
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
                         <h5 class="modal-title" id="exampleModalLabel">Add Class</h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true"></span>
                         </button>
                       </div>
                       <div class="modal-body">

                        <form method="POST">
                          <div class="form-row">
                            <div class="form-group col-md-6">
                              <label> Modules Name</label>
                              <input 
                                type="text"
                                name="mname" 
                                class="form-control" 
                                id="inputPassword4" 
                                placeholder="Name">
                            </div>                 
                           <div class="form-group col-md-6">
                              <label for="inputState">Employee ID</label>
                              <select
                                type="text" 
                                name="EmployeeID" 
                                class="form-control"
                                required="" 
                                >
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
                                >
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
                    <h6 class="m-0 font-weight-bold text-primary">View Modules</h6>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                       <thead>
                         <tr>
                          <th>Modules Name</th>
                          <th>Employee ID</th>
                          <th>Course ID</th>
                          <th>Semester ID</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php

                        include '../../connection.php';

                        $sql="SELECT * FROM modules m INNER JOIN employee e ON m.Emp_ID_fk=e.Emp_id INNER JOIN course c ON m.C_ID_fk=c.C_ID INNER JOIN semester s ON m.Semi_ID_fk=s.Semi_ID ORDER BY  Modules_ID DESC";

                        $query=mysqli_query($con,$sql);

                        while ($row=mysqli_fetch_array($query)) {

                          ?>

                          <tr>
                            <td><?php echo $row['Module_name']; ?></td>
                            <td><?php echo $row['Emp_name']; ?></td>
                            <td><?php echo $row['C_Name']; ?></td>
                             <td><?php echo $row['Semi_name']; ?></td>

                            <td>

                              <a href="crud/delete.php?id=<?php echo $row['Modules_ID']; ?>"class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                              <a href="view-single.php?id=<?php echo $row['Modules_ID']; ?>" class="btn btn-primary"><i class="fa fa-eye"></i></a>

                              <a href="edit.php?id=<?php echo $row['Modules_ID']; ?>" class="btn btn-success" ><i class="fas fa-edit"></i></i></a>

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
  $mname=$_POST['mname'];
  $EmployeeID=$_POST['EmployeeID'];
  $CourseID=$_POST['CourseID'];
  $SemesterID=$_POST['SemesterID'];
  
  include '../../connection.php';

  $sql="INSERT INTO modules ( Module_name, Emp_ID_fk,C_ID_fk,Semi_ID_fk) VALUES ('$mname','$EmployeeID','$CourseID','$SemesterID')";


  $query= mysqli_query($con,$sql);

  if ($query) {
    ?>

    <script>
      $.alert({
        title: 'Alert!',
        content: 'modules Create successfully!!!!',
        type:'green',
      });
      function pageRedirect() {
        window.location.replace("createModules.php");
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
