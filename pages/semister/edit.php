<?php

  $id=$_GET['id'];

  include '../../connection.php';

  $sql="SELECT * FROM semester WHERE Semi_ID='$id'";

  $query=mysqli_query($con,$sql);

  while ($row=mysqli_fetch_array($query)) {

    $sname=$row['Semi_name'];
   
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
           <span class="word">Edit semister Details</span>

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
                        <label>Semister Name</label>
                        <select 
                        id="inputState" 
                        class="form-control"
                        name="sname"
                         value="<?php echo $id; ?>" >
                          <option value="<?php echo $sname; ?>"><?php echo $sname; ?></option>
                          <option value="1st_semi">1st semi</option>
                          <option value="2nd_semi">2nd semi</option>
                          <option value="3rd_semi">3rd semi</option>
                          <option value="4th_semi">4th semi</option>
                        </select>
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


   