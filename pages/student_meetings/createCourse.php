
\<!DOCTYPE html>
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
           <span class="word">timeschdule</span>

         </h4>

       </div> 
       <!-- Quick Action Toolbar Starts-->
       <div class="card">
        <div class="card-body">

          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            +Add
          </button>

          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">timeschdule</h5>
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
                             <option value=<?php echo $row["Emp_id"]?>> <?php echo $row["EmpF_name"]?></option>
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
                          <label for="inputState">Grade_id_fk</label>
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
                          <label for="inputState">Period_id_fk</label>
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
                           type="text" 
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

     <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">View Time Schdule</h6>
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

            $sql="SELECT * FROM timeschdule T INNER JOIN employee e ON e.Emp_id=T.Emp_Id_fk INNER JOIN subject s ON s.Sub_ID=T.Sub_id_fk INNER JOIN grate G ON G.Id=T.Grade_id_fk INNER JOIN
            periods P ON P.peri_id=T.Period_id_fk INNER JOIN
            days D ON D.Day_id=T.Day_Id_fk ORDER BY Tb_ID DESC";


            $query=mysqli_query($con,$sql);

            while ($row=mysqli_fetch_array($query)) {

              ?>

              <tr>
                <td><?php echo $row['Emp_Id_fk']; ?></td>
                <td><?php echo $row['Sub_id_fk']; ?></td>
                <td><?php echo $row['Grade_id_fk']; ?></td>
                <td><?php echo $row['Period_id_fk']; ?></td>
                <td><?php echo $row['Day_Id_fk']; ?></td>
                

              

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
<!-- insert code -->
<?php 
if (isset($_POST['submit'])) {
  $name=$_POST['Emp_Id_fk'];
  $duration=$_POST['Sub_id_fk'];
  $amount=$_POST['Grade_id_fk'];
  $SectorID=$_POST['Period_id_fk'];
  $StudentID=$_POST['Day_Id_fk'];
 


  include '../../connection.php';

  $sql="INSERT INTO timeschdule( Emp_Id_fk,Sub_id_fk,Grade_id_fk,Period_id_fk,Day_Id_fk) VALUES ('$Emp_Id_fk','$Sub_id_fk','$Grade_id_fk','$Period_id_fk','$Day_Id_fk')";


  $query= mysqli_query($con,$sql);

  if ($query) {
    ?>

    <script>
      $.alert({
        title: 'Alert!',
        content: 'timeschdule Create successfully!!!!',
        type:'green',
      });
      function pageRedirect() {
        window.location.replace("createCourse.php");
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



