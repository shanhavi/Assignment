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
               <span class="word">Exam Creations</span>
             
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
                         <h5 class="modal-title" id="exampleModalLabel">Add Exam</h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                         </button>
                       </div>
                       <div class="modal-body">

                      <form method="POST">
                        <div class="form-row">
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
                             placeholder="Name">
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
                             placeholder="Date">
                         </div>
                         <div class="form-group col-md-6">
                           <label > Exam Time</label>
                           <input 
                             type="Time"
                             name="extime" 
                             class="form-control" 
                             id="inputEmail4" 
                             placeholder="Date">
                         </div>
                         <div class="form-group col-md-6">
                           <label >Results Date</label>
                           <input 
                             type="date"
                             name="results" 
                             class="form-control" 
                             id="inputEmail4" 
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
                    <h6 class="m-0 font-weight-bold text-primary">View Exam</h6>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                       <thead>
                         <tr>
                          <th>Student ID</th>
                          <th>Exam Name</th>
                          <th>Seme ID</th>
                          <th>Exam Date</th>
                          <th>Exam Time</th>
                          <th>Results Date</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php

                        include '../../connection.php';

                        $sql="SELECT * FROM exam e INNER JOIN student s ON e.stu_id=s.Stu_id INNER JOIN semester se ON e.seme_id=se.Semi_ID ORDER BY  Exam_id DESC";

                        $query=mysqli_query($con,$sql);

                        while ($row=mysqli_fetch_array($query)) {

                          ?>

                          <tr>
                            <td><?php echo $row['Stu_name']; ?></td>
                            <td><?php echo $row['ex_name']; ?></td>
                            <td><?php echo $row['Semi_name']; ?></td>
                            <td><?php echo $row['ex_date']; ?></td>
                            <td><?php echo $row['ex_time']; ?></td>
                            <td><?php echo $row['results_date']; ?></td>

                            <td>

                              <a href="crud/delete.php?id=<?php echo $row['Exam_id']; ?>"class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                              <a href="view-single.php?id=<?php echo $row['Exam_id']; ?>" class="btn btn-primary"><i class="fa fa-eye"></i></a>

                              <a href="edit.php?id=<?php echo $row['Exam_id']; ?>" class="btn btn-success" ><i class="fas fa-edit"></i></i></a>

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
  $StudentID=$_POST['StudentID'];
  $exname=$_POST['exname'];
  $SemeID=$_POST['SemeID'];
  $exdate=$_POST['exdate'];
  $extime=$_POST['extime'];
  $results=$_POST['results'];
  


  include '../../connection.php';

  $sql="INSERT INTO exam (stu_id,ex_name,seme_id,ex_date,ex_time,results_date) VALUES ('$StudentID','$exname','$SemeID','$exdate','$extime','$results')";


  $query= mysqli_query($con,$sql);

  if ($query) {
    ?>

    <script>
      $.alert({
        title: 'Alert!',
        content: 'exam Create successfully!!!!',
        type:'green',
      });
      function pageRedirect() {
        window.location.replace("createExam.php");
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
