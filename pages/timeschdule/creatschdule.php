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
               <span class="word">Timeschdule </span>
             
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
                         <h5 class="modal-title" id="exampleModalLabel">Timeschdule</h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                         </button>
                       </div>
                       <div class="modal-body">

                         <form method="POST">
                           <div class="form-row">
                         
                            <div class="form-group col-md-6">
                                  <label for="inputState">Employee ID</label>
                                  <select
                                    type="text" 
                                    name="Emp_Id_fk" 
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
                           <div class="form-group col-md-6">
                             <label for="inputState">Subject ID</label>
                             <select
                               type="text" 
                               name="Sub_id_fk" 
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
                                 <label for="inputState">Grade id</label>
                                  <select
                                  type="text" 
                                  name="Grade_id_fk" 

                                  class="form-control"
                                  required="" 
                                  >
                                  <?php 

                                  include "../../connection.php";
                                  $query="SELECT * FROM grate";
                                  $result=mysqli_query($con,$query);

                                  while ($row=mysqli_fetch_array($result)) {
                                     ?>
                                     <option value= <?php echo $row["Id"];?>><?php echo $row["Grade name"]; ?></option>
                                     <?php 
                                   } 

                                  ?>
                                </select>
                              </div>
                            
                            <div class="form-group col-md-6">
                                 <label for="inputState">Period id</label>
                                  <select
                                  type="text" 
                                  name="Period_id_fk" 

                                  class="form-control"
                                  required="" 
                                  >
                                  <?php 

                                  include "../../connection.php";
                                  $query="SELECT * FROM periods";
                                  $result=mysqli_query($con,$query);

                                  while ($row=mysqli_fetch_array($result)) {
                                     ?>
                                     <option value= <?php echo $row["peri_id"];?>><?php echo $row["period_start_time"]; ?></option>
                                     <?php 
                                   } 

                                  ?>
                                </select>
                              </div>

                               <div class="form-group col-md-6">
                                 <label for="inputState">days</label>
                                  <select
                                  type="date" 
                                  name=" Day_Id_fk" 

                                  class="form-control"
                                  required="" 
                                  >
                                  <?php 

                                  include "../../connection.php";
                                  $query="SELECT * FROM days";
                                  $result=mysqli_query($con,$query);

                                  while ($row=mysqli_fetch_array($result)) {
                                     ?>
                                     <option value= <?php echo $row["Day_id"];?>><?php echo $row["Day_name"]; ?></option>
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
                    <h6 class="m-0 font-weight-bold text-primary">View Course</h6>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                       <thead>
                         <tr>
                          <th>Emp Name</th>
                          <th>Subject</th>
                          <th>Grate</th>
                          <th>Periods</th>
                          <th>Days</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                        <?php

                        include '../../connection.php';

                        $sql="SELECT * FROM timeschdule ts INNER JOIN employee e ON ts.Emp_Id_fk=e.Emp_id INNER JOIN subject s ON ts.Sub_id_fk=s.Sub_ID INNER JOIN grate g ON ts.Grade_id_fk=g.Id INNER JOIN periods p ON ts.Period_id_fk=p.peri_id INNER JOIN days d ON ts.Day_Id_fk=d.Day_id ORDER BY Tb_ID DESC";


                        $query=mysqli_query($con,$sql);

                        while ($row=mysqli_fetch_array($query)) {

                          ?>

                          <tr>
                            <td><?php echo $row['Emp_name']; ?></td>
                            <td><?php echo $row['S_Name']; ?></td>
                            <td><?php echo $row['Grade name']; ?></td>
                            <td><?php echo $row['period_start_time']; ?></td>
                            <td><?php echo $row['Day_name']; ?></td>
                            

                          

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
  $Emp_Id_fk=$_POST['Emp_Id_fk'];
  $Sub_id_fk=$_POST['Sub_id_fk'];
  $Grade_id_fk=$_POST['Grade_id_fk'];
  $Period_id_fk=$_POST['Period_id_fk'];
  $Day_Id_fk=$_POST['Day_Id_fk'];
 


  include '../../connection.php';

  $sql="INSERT INTO timeschdule ( Emp_Id_fk, Sub_id_fk, Grade_id_fk, Period_id_fk, Day_Id_fk) VALUES ('$Emp_Id_fk','$Sub_id_fk','$Grade_id_fk','$Period_id_fk','$Day_Id_fk')";


  $query= mysqli_query($con,$sql);

  if ($query) {
    ?>

    <script>
      $.alert({
        title: 'Alert!',
        content: 'Timeschdule Create successfully!!!!',
        type:'green',
      });
      function pageRedirect() {
        window.location.replace("createtimeschdule.php");
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





