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
               <span class="word">Meetings Creations</span>
             
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
                        <h5 class="modal-title" id="exampleModalLabel">Add Meetings</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">

                     <form method="POST">
                       <div class="form-row">
                         <div class="form-group col-md-6">
                           <label> Meeting Time</label>
                           <input 
                             type="time"
                             name="mtime" 
                             class="form-control" 
                             id="inputPassword4" 
                             placeholder="Time">
                         </div>
                        
                         <div class="form-group col-md-6">
                           <label > Meeting Date</label>
                           <input 
                             type="date"
                             name="mdate" 
                             class="form-control" 
                             id="inputEmail4" 
                             placeholder="Date">
                         </div>
                         <div class="form-group col-md-6">
                           <label for="inputState">Student ID</label>
                           <select
                             type="text" 
                             name="StudentID" 
                             class="form-control"
                             required="" 
                             >
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
                             >
                             <?php
                             include "../../connection.php";
                             $query ="SELECT * FROM employee e INNER JOIN employee_type et ON e.Emp_type=et.et_id";
                             $result = mysqli_query($con,$query);

                             while ($row = mysqli_fetch_array($result))
                             {
                               ?>
                               <option value=<?php echo $row["Emp_id"]?>> <?php echo $row["employee_type"]?></option>
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
                    <h6 class="m-0 font-weight-bold text-primary">View Meetings</h6>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                       <thead>
                         <tr>
                          <th>Meeting Time</th>
                          <th>Meeting Date</th>
                          <th>Student ID</th>
                          <th>Employee ID</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                        <?php

                        include '../../connection.php';

                        $sql="SELECT * FROM studentmeeting sm INNER JOIN student s ON sm.Stu_ID_fk=s.Stu_id INNER JOIN employee e ON sm.emp_id_fk=e.Emp_id ORDER BY  Stu_meet_id DESC";

                        $query=mysqli_query($con,$sql);

                        while ($row=mysqli_fetch_array($query)) {

                          ?>

                          <tr>
                            <td><?php echo $row['meet_time']; ?></td>
                            <td><?php echo $row['meet_date']; ?></td>
                            <td><?php echo $row['Stu_name']; ?></td>
                            <td><?php echo $row['Emp_name']; ?></td>
                            <td>

                              <a href="crud/delete.php?id=<?php echo $row['Stu_meet_id']; ?>"class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                              <a href="view-single.php?id=<?php echo $row['Stu_meet_id']; ?>" class="btn btn-primary"><i class="fa fa-eye"></i></a>

                              <a href="edit.php?id=<?php echo $row['Stu_meet_id']; ?>" class="btn btn-success" ><i class="fas fa-edit"></i></i></a></td>

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
  $mtime=$_POST['mtime'];
  $mdate=$_POST['mdate'];
  $StudentID=$_POST['StudentID'];
  $EmployeeID=$_POST['EmployeeID'];
  


  include '../../connection.php';

  $sql="INSERT INTO studentmeeting( meet_time, meet_date,Stu_ID_fk,emp_id_fk) VALUES ('$mtime','$mdate','$StudentID','$EmployeeID')";


  $query= mysqli_query($con,$sql);

  if ($query) {
    ?>

    <script>
      $.alert({
        title: 'Alert!',
        content: 'studentmeeting Create successfully!!!!',
        type:'green',
      });
      function pageRedirect() {
        window.location.replace("createMeeting.php");
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
