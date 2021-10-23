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
               <span class="word">Department Creations</span>
             
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
                         <h5 class="modal-title" id="exampleModalLabel">Add Department</h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true"></span>
                         </button>
                       </div>
                       <div class="modal-body">

                        <form method="POST">
                          <div class="form-row">                     
                            <div class="form-group col-md-6">
                                 <label for="inputState">Department Type</label>
                                 <select 
                                 id="inputState" 
                                 class="form-control"
                                 name="dtype">
                                   <option selected>Choose...</option>
                                   <option value="Diploma">Diploma</option>
                                   <option value="HND">HND</option>
                                   <option value="Degree">Degree</option>
                                   <option value="MBA">MBA</option>
                                   <option value="MBA">Management</option>
                                   <option value="MBA">WEB</option>
                                   <option value="MBA">Hardware</option>
                                   <option value="MBA">Animations</option>
                                   <option value="MBA">3D</option>
                                   <option value="MBA">Graphics</option>

                                 </select>
                               </div>
                              <div class="form-group col-md-6">
                                 <label for="inputState">Employee name</label>
                                 <select
                                   type="text" 
                                   name="Employeefk" 
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
              <div class="card shadow mb-4">
          <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">View Department</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
           <thead>
             <tr>
              <th>Name</th>
              <th>Employees</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php

            include '../../connection.php';

            $sql="SELECT * FROM deparrtment d INNER JOIN employee e ON d.emp_id_fk=e.Emp_id ORDER BY  Dep_id DESC";

            $query=mysqli_query($con,$sql);

            while ($row=mysqli_fetch_array($query)) {

              ?>

              <tr>
                <td><?php echo $row['Dep_name']; ?></td>
                <td><?php echo $row['Emp_name']; ?></td>
                <td>

                  <a href="crud/delete.php?id=<?php echo $row['Dep_id']; ?>"class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                  <a href="view-single.php?id=<?php echo $row['Dep_id']; ?>" class="btn btn-primary"><i class="fa fa-eye"></i></a>

                  <a href="edit.php?id=<?php echo $row['Dep_id']; ?>" class="btn btn-success" ><i class="fas fa-edit"></i></i></a>

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
  $dtype=$_POST['dtype'];
  $Employeefk=$_POST['Employeefk'];
  
  include '../../connection.php';

  $sql="INSERT INTO `deparrtment`(Dep_name, emp_id_fk) VALUES ('$dtype','$Employeefk')";


  $query= mysqli_query($con,$sql);

  if ($query) {
    ?>

    <script>
      $.alert({
        title: 'Alert!',
        content: 'Department Create successfully!!!!',
        type:'green',
      });
      function pageRedirect() {
        window.location.replace("createDepartment.php");
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



