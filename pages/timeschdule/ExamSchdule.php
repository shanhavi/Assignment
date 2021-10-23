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
                            <label for="inputState">Exam ID</label>
                            <select
                              type="text" 
                              name="Exam_id_fk" 
                              class="form-control"
                              required="" 
                              >
                              <?php

                              include "../../connection.php";
                              $query="SELECT * FROM exam";
                              $result=mysqli_query($con,$query);

                              while ($row=mysqli_fetch_array($result)) {
                                ?>
                                <option value= <?php echo $row["Exam_id"];?>> <?php echo $row["ex_name"]; ?> </option>
                                <?php 
                              } 


                               ?>
                            </select>
                          </div>
                          <div class="form-group col-md-6">
                                <label>Exam date</label>
                                <input 
                                  type="date"
                                  name="Sdate" 
                                  class="form-control" 
                                  id="inputPassword4" 
                                  placeholder="Name">
                              </div>
                         
                          <div class="form-group col-md-6">
                            <label >course ID</label>
                           <select
                             type="text" 
                             name="Cu_id_fk" 
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
                                 <label for="inputState">Seme ID</label>
                                 <select
                                   type="text" 
                                   name="Sem_id_fk" 
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

                            
                           
                       </div>
                       <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
            <!-- Quick Action Toolbar Ends-->
                    
                <div class="card shadow mb-4">
                 <div class="card-header py-3">
                   <h6 class="m-0 font-weight-bold text-primary">View Exam</h6>
                 </div>
                 <div class="card-body">
                   <div class="table-responsive">
                     <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                         
                         <th>Exam</th>
                         <th>date</th>
                         <th>Course</th>
                         <th>Semister</th>

                       
                       </tr>
                     </thead>
                     <tbody>
                       <?php

                       include '../../connection.php';

                       $sql="SELECT * FROM examschdule es INNER JOIN exam e ON es.Exam_id_fk=e.Exam_id INNER JOIN course c ON es.Cu_id_fk=c.C_ID INNER JOIN semester s ON es.Sem_id_fk=s.Semi_ID  ";


                       $query=mysqli_query($con,$sql);

                       while ($row=mysqli_fetch_array($query)) {

                         ?>

                         <tr>
                           <td><?php echo $row['ex_name']; ?></td>
                           <td><?php echo $row['Sdate']; ?></td>
                           <td><?php echo $row['C_Name']; ?></td>
                           <td><?php echo $row['Semi_name']; ?></td>
                           

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
  $Exam_id_fk=$_POST['Exam_id_fk'];
  $Sdate=$_POST['Sdate'];
  $Cu_id_fk=$_POST['Cu_id_fk'];
  $Sem_id_fk=$_POST['Sem_id_fk'];



  include '../../connection.php';

  $sql="INSERT INTO examschdule (Exam_id_fk, Sdate, Cu_id_fk, Sem_id_fk) VALUES ('$Exam_id_fk','$Sdate','$Cu_id_fk','$Sem_id_fk')";

 
              
  $query= mysqli_query($con,$sql);

  if ($query) {
    ?>

    <script>
      $.alert({
        title: 'Alert!',
        content: 'Examschdule Create successfully!!!!',
        type:'green',
      });
      function pageRedirect() {
        window.location.replace("ExamSchdule.php");
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







