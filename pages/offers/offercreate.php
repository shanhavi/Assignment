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
           <span class="word">Offers Creations</span>

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
                <h5 class="modal-title" id="exampleModalLabel">Add Payment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">

                <form method="POST">
                 <div class="form-row">

                    
                   <div class="form-group col-md-6">
                     <label>Offers Amount</label>
                     <input 
                     type="text"
                     name="oamount" 
                     class="form-control" 
                     id="inputPassword4" 
                     placeholder="Amount">

                   </div>
                   <div class="form-group col-md-6">
                     <label>Offers Type</label>
                     <input 
                     type="text"
                     name="Otype" 
                     class="form-control" 
                     id="inputPassword4" 
                     placeholder="Otype">

                 </div>
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
   </div>
   <!-- Quick Action Toolbar Ends-->


   <div class="card shadow mb-4">
    <div class="card-header py-3">
     <h6 class="m-0 font-weight-bold text-primary">View Offers </h6>
    </div>

    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
         <thead>
           <tr>
           
            <th>Offers Amount</th>
           <th>Offer type</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php

          include '../../connection.php';

          $sql="SELECT * FROM offers  ORDER BY Off_ID DESC";

          $query=mysqli_query($con,$sql);

          while ($row=mysqli_fetch_array($query)) {

            ?>

            <tr>
               
              <td><?php echo $row['Off_amount']; ?></td>
               <td><?php echo $row['offertype']; ?></td>
               
               <td><?php echo $row['offdate']; ?></td>
             
              
              <td>

                <a href="crud/delete.php?id=<?php echo $row['Off_ID']; ?>"class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                <a href="view-single.php?id=<?php echo $row['Off_ID']; ?>" class="btn btn-primary"><i class="fa fa-eye"></i></a>

                <a href="edit.php?id=<?php echo $row['Off_ID']; ?>" class="btn btn-success" ><i class="fas fa-edit"></i></i></a>

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
  $oamount=$_POST['oamount'];
  $Otype=$_POST['Otype'];
 

  include '../../connection.php';

  $sql="INSERT INTO offers ( Off_amount, offertype) VALUES ('$oamount','$Otype')";

  $query=mysqli_query($con,$sql);

  if ($query) {
    ?>
    <script>
      $.alert({
        title: 'Alert!',
        content: 'Offers Create successfully!!!!',
        type:'green',
      });
      function pageRedirect() {
        window.location.replace("offercreate.php");
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