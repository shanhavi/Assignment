<?php 
$id=$_GET['id'];

include '../../connection.php';

$sql="SELECT * FROM offers WHERE Off_ID='$id'";

$query=mysqli_query($con,$sql);

while ($row=mysqli_fetch_array($query)) {
  $oamount=$row['Off_amount'];
  $Otype=$row['offertype'];
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
           <span class="word">Edit payment Details</span>

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
                        <label>Offers Amount</label>
                        <input 
                        type="text"
                        name="oamount" 
                        class="form-control" 
                        id="inputPassword4" 
                        placeholder="Amount"
                        value="<?php echo $oamount; ?>" >
                      </div> 

                        <div class="form-group col-md-6">
                          <label>Offers Type</label>
                          <input 
                          type="text"
                          name="Otype" 
                          class="form-control" 
                          id="inputPassword4" 
                          placeholder="Otype"
                          value="<?php echo $Otype; ?>">

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


   