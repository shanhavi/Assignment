<?php

  $id=$_GET['id'];

  include '../../connection.php';

  $sql="SELECT * FROM assignment WHERE A_Id='$id'";

  $query=mysqli_query($con,$sql);

  while ($row=mysqli_fetch_array($query)) {

    $add=$row['assignment_deadline_date'];
    $adt=$row['assignment_deadline_TIME'];
    $BatchID=$row['Batch_id'];
    $SemeID=$row['Semi_id_fk'];
    $ModuleID=$row['mod_id_fk'];
    $ard=$row['Ass_Res_Date'];
    $status=$row['status'];


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
           <span class="word">Edit Admin Details</span>

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
                        <label> Assignment DeadLine Date </label>
                        <input 
                          type="Date" 
                          class="form-control" 
                          id="inputPassword4" 
                          placeholder="DeadLine"
                          name="add"
                          value="<?php echo $add; ?>">
                      </div>

                      <div class="form-group col-md-6">
                        <label> Assignment DeadLine Time </label>
                        <input 
                          type="time" 
                          class="form-control" 
                          id="inputPassword4" 
                          placeholder="DeadLine"
                          name="adt"
                          value="<?php echo $adt; ?>">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputState">Batch ID</label>
                        <select
                          type="text" 
                          name="BatchID" 
                          class="form-control"
                          required="" 
                          value="<?php echo $BatchID; ?>">
                          <?php
                          include "../../connection.php";
                          $query ="SELECT * FROM batch";
                          $result = mysqli_query($con,$query);

                          while ($row = mysqli_fetch_array($result))
                          {
                            ?>
                            <option value=<?php echo $row["B_ID"]?>> <?php echo $row["Batch_name"]?></option>
                            <?php
                          }
                          ?>
                        </select>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputState">Seme ID</label>
                        <select
                          type="text" 
                          name="SemeID" 
                          class="form-control"
                          required="" 
                          value="<?php echo $SemeID; ?>">
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
                      <div class="form-group col-md-6">
                        <label for="inputState">Module ID</label>
                        <select
                          type="text" 
                          name="ModuleID" 
                          class="form-control"
                          required="" 
                          value="<?php echo $ModuleID; ?>">
                          <?php
                          include "../../connection.php";
                          $query ="SELECT * FROM modules";
                          $result = mysqli_query($con,$query);

                          while ($row = mysqli_fetch_array($result))
                          {
                            ?>
                            <option value=<?php echo $row["Modules_ID"]?>> <?php echo $row["Module_name"]?></option>
                            <?php
                          }
                          ?>
                        </select>
                      </div>
                     
                      <div class="form-group col-md-6">
                        <label> Assignment Results Date </label>
                        <input 
                          type="Date"
                          name="ard" 
                          class="form-control" 
                          id="inputPassword4" 
                          placeholder="Date"
                          value="<?php echo $ard; ?>">
                      </div> 
                         <div class="form-group col-md-6">
                          <label for="inputState">Status</label>
                          <select 
                          id="inputState" 
                          class="form-control"
                          name="status" 
                          required=""
                          value="<?php echo $status; ?>">
                          <option value="<?php echo $status; ?>"><?php echo $status; ?></option>
                          <option value="Published">Published</option>
                          <option value="Un_Published">Un_Published</option>
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


   