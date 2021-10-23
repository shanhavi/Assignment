


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
           <span class="word">Course Creations</span>

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
                  <h5 class="modal-title" id="exampleModalLabel">Add Course</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">

                  <form method="POST">
                    <div class="form-row">
                    <div class="form-group col-md-6">
                      <label>Course Name</label>
                      <input 
                        type="text" 
                        class="form-control"
                        name="name" 
                        id="inputPassword4" 
                        placeholder="Name">
                    </div>
                   
                  
                    <div class="form-group col-md-6">
                      <label >Duration</label>
                      <input 
                        type="text"
                        name="duration" 
                        class="form-control" 
                        id="inputPassword4" 
                        placeholder="Duration">
                    </div>
                    <div class="form-group col-md-6">
                      <label >Amount</label>
                      <input 
                        type="text"
                        name="amount" 
                        class="form-control" 
                        id="inputPassword4" 
                        placeholder="Amount">
                    </div>
                    <div class="form-group col-md-6">
                      <label >Sector</label>
                     <select
                       type="text" 
                       name="SectorID" 
                       class="form-control"
                       required="" 
                       >

                      <?php
                      include "../../connection.php";
                      $query ="SELECT * FROM sector";
                      $result = mysqli_query($con,$query);

                      while ($row = mysqli_fetch_array($result))
                      {
                        ?>
                        <option value=<?php echo $row["sec_id"]?>> <?php echo $row["sec_type"]?></option>
                        <?php
                      }
                      ?>
                     </select>
                    </div>
                    <div class="form-group col-md-6">
                      <label >Offer Id</label>
                     <select
                       type="text" 
                       name="OfferId" 
                       class="form-control"
                       required="" 
                       >

                      <?php
                      include "../../connection.php";
                      $query ="SELECT * FROM offers";
                      $result = mysqli_query($con,$query);

                      while ($row = mysqli_fetch_array($result))
                      {
                        ?>
                        <option value=<?php echo $row["Off_ID"]?>> <?php echo $row["Off_amount"]?></option>
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
        <h6 class="m-0 font-weight-bold text-primary">View Course</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
           <thead>
             <tr>
              <th>Course Name</th>
               <th>Duration</th>
              <th>Amount</th>
              <th>Sector</th>
              <th>Offer ID</th>
              <th>introduced date</th>
               <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php

            include '../../connection.php';

            $sql="SELECT * FROM course c INNER JOIN Sector se ON c.Sector=se.sec_id INNER JOIN offers o ON c.Off_Id_fk=o.Off_ID ORDER BY  C_ID DESC";

            $query=mysqli_query($con,$sql);

            while ($row=mysqli_fetch_array($query)) {

              ?>

              <tr>
                <td><?php echo $row['C_Name']; ?></td>
              
            
                <td><?php echo $row['Duration']; ?></td>
                
                <td><?php echo $row['Amount']; ?></td>
                <td><?php echo $row['sec_type']; ?></td>
                
                <td><?php echo $row['Off_amount']; ?></td>
                   <td><?php echo $row['postingdate']; ?></td>
                

                <td>

                  <a href="crud/delete.php?id=<?php echo $row['C_ID']; ?>"class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                  <a href="view-single.php?id=<?php echo $row['C_ID']; ?>" class="btn btn-primary"><i class="fa fa-eye"></i></a>

                  <a href="edit.php?id=<?php echo $row['C_ID']; ?>" class="btn btn-success" ><i class="fas fa-edit"></i></i></a>

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
  $name=$_POST['name'];
  $duration=$_POST['duration'];
  $amount=$_POST['amount'];
  $SectorID=$_POST['SectorID'];
  $OfferId=$_POST['OfferId'];


  include '../../connection.php';

  $sql="INSERT INTO course (C_Name,  Duration, Amount, Sector, Off_Id_fk) VALUES ('$name','$duration','$amount','$SectorID','$OfferId')";


  $query= mysqli_query($con,$sql);

  if ($query) {
    ?>

    <script>
      $.alert({
        title: 'Alert!',
        content: 'course Create successfully!!!!',
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



