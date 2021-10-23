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
               <span class="word">Exam Schdule</span>
             
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
                        <h5 class="modal-title" id="exampleModalLabel">Exam Schdule</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">

                     <form method="POST">
                       <div class="form-row">
                         <div class="form-group col-md-6">
                           <label> date</label>
                           <input 
                             type="date"
                             name="Sdate" 
                             class="form-control" 
                             id="inputPassword4" 
                             placeholder="Time">
                         </div>
                        
                         
                         <div class="form-group col-md-6">
                      <label for="inputState">Subject ID</label>
                      <select
                        type="text" 
                        name="Sbj_id_fk" 
                        class="form-control"
                        required="" 
                        >
                        <?php

                        include "../../connection.php";
                        $query="SELECT * FROM subject";
                        $result=mysqli_query($con,$query);

                        while ($row=mysqli_fetch_array($result)) {
                          ?>
                          <option value= <?php echo $row["Sub_ID"];?>> <?php echo $row["S_Name"]; ?> </option>
                          <?php 
                        } 


                         ?>
                      </select>
                    </div>

                          <div class="form-group col-md-6">
                              <label for="inputState">Course ID</label>
                              <select
                                type="text" 
                                name="Cu_id_fk" 
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
                                name="Sem_id_fk" 
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
                    <h6 class="m-0 font-weight-bold text-primary">Exam Schdule</h6>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                       <thead>
                         <tr>
                          <th>Subject</th>
                          <th>Date</th>
                          <th>Course</th>
                          <th>Semester</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                        <?php

                        include '../../connection.php';

                        $sql="SELECT * FROM Examschdule ES INNER JOIN subject s ON ES.Sbj_id_fk=s.Sub_ID INNER JOIN course C ON ES.Cu_id_fk=C.C_ID INNER JOIN semester SE ON ES.Sem_id_fk=SE.Semi_ID ORDER BY  ExS_int DESC";

                        $query=mysqli_query($con,$sql);

                        while ($row=mysqli_fetch_array($query)) {

                          ?>

                          <tr>
                            <td><?php echo $row['Sbj_id_fk']; ?></td>
                            <td><?php echo $row['Sdate']; ?></td>
                            <td><?php echo $row['Cu_id_fk']; ?></td>
                            <td><?php echo $row['Sem_id_fk']; ?></td>
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
  $Sbj_id_fk=$_POST['Sbj_id_fk'];
  $Sdate=$_POST['Sdate'];
  $Cu_id_fk=$_POST['Cu_id_fk'];
  $Sem_id_fk=$_POST['Sem_id_fk'];
  


  include '../../connection.php';

  $sql="INSERT INTO examschdule( Sbj_id_fk,Sdate,Cu_id_fk,Sem_id_fk) VALUES ('$Sbj_id_fk','$date','$Cu_id_fk','$Sem_id_fk')";


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
