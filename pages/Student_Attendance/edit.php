<?php

  $id=$_GET['id'];

  include '../../connection.php';

  $sql="SELECT * FROM studentattendance WHERE At_id='$id'";

  $query=mysqli_query($con,$sql);

  while ($row=mysqli_fetch_array($query)) {

  $StudentID=$row['St_id_fk'];
  $Atime=$row['At_time'];
  $adate=$row['AT_date'];
  }
?>

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
           <span class="word">Edit Attendance Details</span>

         </h4>

       </div> 
       <!-- Quick Action Toolbar Starts-->
       <div class="card">
        <div class="card-body">

          <!-- Button trigger modal -->
             <form action="crud/update.php" method="POST">
                    <div class="form-row">
                      <input 
                        type="hidden" 
                        name="id"                          
                        class="form-control"
                        required="" 
                        value="<?php echo $id; ?>" 
                        
                      > 
                      <div class="form-group col-md-6">
                       <label for="inputState">Student ID</label>
                       <select
                         type="text" 
                         name="StudentID" 
                         class="form-control"
                         required="" 
                         value="<?php echo $StudentID; ?>" >
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
                     </div>

                      <div class="form-group col-md-6">
                       <label > Attendance Date</label>
                       <input 
                         type="date"
                         name="adate" 
                         class="form-control" 
                         id="inputEmail4" 
                         placeholder="Date"
                         value="<?php echo $adate; ?>" >
                     </div>

                      <div class="form-group col-md-6">
                       <label > Attendance Time</label>
                       <input 
                         type="datetime"
                         name="Atime" 
                         class="form-control" 
                         id="inputEmail4" 
                         placeholder="Date"
                         value="<?php echo $Atime; ?>">
                     </div>     
                   
                 </div>
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                 <input 
                 type="submit" 
                 name="submit"
                 class="btn btn-outline-info btn-icon-text"
                 value="UPDATE" 
                 >
               </form>

          <!-- Modal -->
         
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


  