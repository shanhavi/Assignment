


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
           <span class="word">Sector Creations</span>

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
                  <h5 class="modal-title" id="exampleModalLabel">Add Sector</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">

                  <form method="POST">
                    <div class="form-row">
                      <div class="form-group col-md-6">
                       <label for="inputState">Department</label>
                       <select 
                       id="inputState" 
                       class="form-control"
                       name="Department" 
                       required="">
                       <?php
                       include "../../connection.php";
                       $query ="SELECT * FROM deparrtment";
                       $result = mysqli_query($con,$query);

                       while ($row = mysqli_fetch_array($result))
                       {
                         ?>
                         <option value=<?php echo $row["Dep_id"]?>> <?php echo $row["Dep_name"]?></option>
                         <?php
                       }
                       ?>
                     </select>
                   </div>
                     <div class="form-group col-md-6">
                       <label for="inputState">Sector</label>
                       <select 
                       id="inputState" 
                       class="form-control"
                       name="Sector" 
                       required="">
                       <option selected>Choose...</option>
                       <option value="HND_in_Coumputing">HND in Coumputing</option>
                       <option value="HND_in_BM">HND in Business Management</option>
                       <option value="Degree_in_SWE">Degree in Software engineering</option>
                       <option value="Degree_in_BM">Degree in Business Management</option>
                       <option value="L7">L7</option>
                       <option value="MBA">MBA</option>
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
        <h6 class="m-0 font-weight-bold text-primary">View Admin</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
           <thead>
             <tr>
              <th>Name</th>
              <th>department</th>
             <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php

            include '../../connection.php';

            $sql="SELECT * FROM sector s INNER JOIN deparrtment d ON s.dep_id_fk=d.Dep_id ORDER BY sec_id DESC";

            $query=mysqli_query($con,$sql);

            while ($row=mysqli_fetch_array($query)) {

              ?>

              <tr>
                <td><?php echo $row['sec_type']; ?></td>
                <td><?php echo $row['Dep_name']; ?></td>

                <td>

                  <a href="crud/delete.php?id=<?php echo $row['sec_id']; ?>"class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                  <a href="view-single.php?id=<?php echo $row['sec_id']; ?>" class="btn btn-primary"><i class="fa fa-eye"></i></a>

                  <a href="edit.php?id=<?php echo $row['sec_id']; ?>" class="btn btn-success" ><i class="fas fa-edit"></i></i></a>

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
  
  $Sector=$_POST['Sector'];
  $Department=$_POST['Department'];
  


  include '../../connection.php';

  $sql="INSERT INTO  sector ( sec_type, dep_id_fk) VALUES ('$Sector','$Department')";


  $query= mysqli_query($con,$sql);

  if ($query) {
    ?>

    <script>
      $.alert({
        title: 'Alert!',
        content: 'sector Create successfully!!!!',
        type:'green',
      });
      function pageRedirect() {
        window.location.replace("createSector.php");
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



