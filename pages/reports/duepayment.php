
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include '../../layout/head.php'  ?>
    <!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css
    "> -->
    <style type="text/css">
      .my-card
      {
          position:absolute;
          left:40%;
          top:-20px;
          border-radius:50%;
      }
    </style>
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
            
            <div class="jumbotron">
                <div class="card">         
                 <div class="card-body" >
                              
                     <h4 class="card-title">Date wise attendance</h4>
                     <form method="POST" action="">
                     <label >Choose Date</label> <input type="date" name="startdate">
                      <label >Choose Date</label> <input type="date" name="enddate">
                     <input  type="submit" name="submitnew" class="btn btn-secondary"  value="search"  >
                    </form>

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                   <thead>
                     <tr>
                      <th>Student ID</th>
                      <th>Attendance Date</th>
                      <th>Attendance Time</th>
                       <th>course ID</th>
                     </tr>
                  </thead>
                  <tbody>
                    <?php

                    if (isset($_POST['submitnew'])) 
                    {
                     $sdate=$_POST['startdate'];
                     $enddate=$_POST['enddate'];

                    include '../../connection.php';

                    $sql="SELECT * FROM studentattendance  where AT_date between '$sdate' and '$enddate' ORDER BY At_id DESC";

                    $query=mysqli_query($con,$sql);

                    while ($row=mysqli_fetch_array($query)) {

                      ?>

                      <tr>
                        <td><?php echo $row['St_id_fk']; ?></td>
                        <td><?php echo $row['At_Date']; ?></td>
                        <td><?php echo $row['At_time']; ?></td>
                         <td><?php echo $row['C_ID_fk']; ?></td>
                        
                                            
                        </tr>

                        <?php
                      }
                    }

                      ?> 
                   
                  </tbody>

                </table>

                             
      </div></div>

      <hr>   


      <div class="card">         
                 <div class="card-body" >       
                  <form method="POST" action="">
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
                            <option value= <?php echo $row ["Stu_id"]; ?> > <?php echo $row ["Stu_name"]; ?></option>
                            <?php 
                          } 
                         ?>
                       </select>
                     <input  type="submit" name="submit" class="btn btn-secondary"  value="search"  >
                    </form>
                   <table class="table table-bordered" id="dataTablenew" width="100%" cellspacing="0">
                   <thead>
                     <tr class="noExl">
                      <th>Attendance Date</th>
                      <th>Attendance Time</th>
                       <th>Course ID</th>
                     </tr>
                  </thead>
                  <tbody>
                    <?php

                    if (isset($_POST['submit'])) 
                    {
                     $sname=$_POST['StudentID'];
                    
                    include '../../connection.php';

                    $sql="SELECT * FROM studentattendance where St_id_fk='$sname' ORDER BY AT_date DESC";

                    $query=mysqli_query($con,$sql);

                    while ($row=mysqli_fetch_array($query)) {

                      ?>

                      <tr>
                         <td><?php echo $row['At_Date']; ?></td>
                        <td><?php echo $row['At_time']; ?></td>
                         <td><?php echo $row['C_ID_fk']; ?></td>
                        
                                            
                        </tr>

                        <?php
                      }
                    }

                      ?> 
                   
                  </tbody>

                </table>

                             
      </div>
    </div>

              



         
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          
          <!-- partial -->
        </div>
         <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <?php include '../../layout/script.php' ?>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Core plugin JavaScript-->
<script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="../../js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="../../vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="../../js/demo/chart-area-demo.js"></script>
<script src="../../js/demo/chart-pie-demo.js"></script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"> </script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="src/jquery.table2excel.js"></script>



        </body>

        </html>
