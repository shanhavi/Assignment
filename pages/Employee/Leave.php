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
               <span class="word">Employee Leave</span>
             
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
                     <h5 class="modal-title" id="exampleModalLabel">Employee Leave</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                     </button>
                   </div>
                   <div class="modal-body">

                    <form method="POST">
                      <div class="form-row">
                        <div class="form-group col-md-6">
                           <label for="inputState">Employee name</label>
                           <select
                             type="text" 
                             name="Employeename" 
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
                             <label for="inputState">Leave TYpe</label>
                             <select 
                             id="inputState" 
                             class="form-control"
                             name="Ltype" 
                             required="">
                             <option selected>Choose...</option>
                             <option value="Medical">Medical</option>
                             <option value="Other">Other</option>
                           </select>

                         </div>
                        
                        <div class="form-group col-md-6">
                          <label >From Date</label>
                          <input 
                            type="Date"
                            name="Date" 
                            class="form-control" 
                            id="inputPassword4" 
                            placeholder="Date"
                            >
                        </div>
                       
                        <div class="form-group col-md-6">
                          <label >End Date</label>
                          <input 
                            type="Date"
                            name="EDate" 
                            class="form-control" 
                            id="inputPassword4" 
                            placeholder="EDate"
                            >
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
            <!-- Quick Action Toolbar Ends-->
                <div class="card shadow mb-4">
                 <div class="card-header py-3">
                   <h6 class="m-0 font-weight-bold text-primary">View Employee Leave</h6>
                 </div>
                 <div class="card-body">
                   <div class="table-responsive">
                     <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                         <th>Employee name</th>
                         <th>Leave type </th>
                         <th>Form date</th>
                         <th>To date</th>
                        <th>Action</th>
                       </tr>
                     </thead>
                     <tbody>
                       <?php

                       include '../../connection.php';

                       $sql="SELECT * FROM leaves ORDER BY Leve_id DESC";

                       $query=mysqli_query($con,$sql);

                       while ($row=mysqli_fetch_array($query)) {

                         ?>

                         <tr>
                           <td><?php echo $row['emp_id_fk']; ?></td>
                           <td><?php echo $row['Leave_type']; ?></td>
                           <td><?php echo $row['Form_date']; ?></td>
                           <td><?php echo $row['todate']; ?></td>


                         
                          <!--  <td>

                             <a href="crud/delete.php?id=<?php echo $row['Leve_id']; ?>"class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                             <a href="view-single.php?id=<?php echo $row['Leve_id']; ?>" class="btn btn-primary"><i class="fa fa-eye"></i></a>

                             <a href="edit.php?id=<?php echo $row['Leve_id']; ?>" class="btn btn-success" ><i class="fas fa-edit"></i></i></a>

                           </tr>

                           <?php
                         }

                         ?> 
                       </td>  -->

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
  $Employeename=$_POST['Employeename'];
  $Ltype=$_POST['Ltype'];
  $Date=$_POST['Date'];
  $EDate=$_POST['EDate'];
  
  
 

  include '../../connection.php';

  $sql="INSERT INTO leaves (emp_id_fk, Leave_type, Form_date, todate) VALUES ('$Employeename','$Ltype',' $Date','$EDate')";


  $query= mysqli_query($con,$sql);

  if ($query) {
    ?>

    <script>
      $.alert({
        title: 'Alert!',
        content: 'leaves Create successfully!!!!',
        type:'green',
      });
      function pageRedirect() {
        window.location.replace("Leave.php");
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
