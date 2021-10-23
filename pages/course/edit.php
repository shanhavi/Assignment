<?php  
$id=$_GET['id'];

include '../../connection.php';

$sql="SELECT * FROM course WHERE C_ID='$id'";

$query=mysqli_query($con,$sql);

while ($row=mysqli_fetch_array($query)) {

 $name=$row['C_Name'];
 $duration=$row['Duration'];
 $amount=$row['Amount'];
 $SectorID=$row['Sector'];
 $OfferId=$row['Off_Id_fk'];
  # code...
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
           <span class="word">Edit course Details</span>

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
                        <label>Course Name</label>
                        <input 
                          type="text" 
                          class="form-control"
                          name="name" 
                          id="inputPassword4" 
                          placeholder="Name"
                          value="<?php echo $name; ?>">
                      </div>
                      <div class="form-group col-md-6">
                        <label >Duration</label>
                        <input 
                          type="text"
                          name="duration" 
                          class="form-control" 
                          id="inputPassword4" 
                          placeholder="Duration"
                          value="<?php echo $duration; ?>">
                      </div>
                      <div class="form-group col-md-6">
                        <label >Course Full Amount</label>
                        <input 
                          type="text"
                          name="amount" 
                          class="form-control" 
                          id="inputPassword4" 
                          placeholder="Amount"
                          value="<?php echo $amount; ?>">
                      </div>
                      <div class="form-group col-md-6">
                        <label >Sector</label>
                       <select
                         type="text" 
                         name="SectorID" 
                         class="form-control"
                         required="" 
                         value="<?php echo $SectorID; ?>">

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
                            <label for="inputState">Offer ID</label>
                             <select
                             type="text" 
                             name="OfferId" 

                             class="form-control"
                             required="" 
                             value="<?php echo $OfferId; ?>">
                             <?php 

                             include "../../connection.php";
                             $query="SELECT * FROM offers";
                             $result=mysqli_query($con,$query);

                             while ($row=mysqli_fetch_array($result)) {
                                ?>
                                <option value= <?php echo $row["Off_ID"];?>><?php echo $row["Off_amount"]; ?></option>
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


   <div class="modal fade" id="modal-primary">
        <div class="modal-dialog">
          <div class="modal-content bg-primary">
            <div class="modal-header">
              <h4 class="modal-title">Edit Admin Details</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
            <div class="card">
              <div class="card-body">
                 <form method="POST">
                   <div class="form-row">

                    <input 
                      type="hidden" 
                      name="id"                          
                      class="form-control"
                      required="" 
                      value="<?php echo $id; ?>" 
                      
                    >    
                     <div class="form-group col-md-6">
                       <label> Name</label>
                       <input 
                       type="text"
                       name="name" 
                       class="form-control" 
                       id="inputPassword4" 
                       placeholder="Name"
                       required=""
                      value="<?php echo $name; ?>" >
                     </div>

                     <div class="form-group col-md-6">
                       <label > Email</label>
                       <input 
                       type="email"
                       name="email" 
                       class="form-control" 
                       id="inputEmail4" 
                       placeholder="Email"
                       required=""
                       value="<?php echo $email; ?>">
                     </div>
                     <div class="form-group col-md-6">
                       <label > Username</label>
                       <input 
                       type="text"
                       name="username" 
                       class="form-control" 
                       id="inputEmail4" 
                       placeholder="Email"
                       required=""
                       value="<?php echo $username; ?>">
                     </div>
                     <div class="form-group col-md-6">
                       <label >Password</label>
                       <input 
                       type="password"
                       name="password" 
                       class="form-control" 
                       id="inputPassword4" 
                       placeholder="Password"
                       required=""
                       value="<?php echo $password; ?>">
                     </div>
                     <div class="form-group col-md-6">
                      <label for="inputState">Status</label>
                      <select 
                      id="inputState" 
                      class="form-control"
                      name="status" 
                      required=""
                      value="<?php echo $status; ?>">
                      <option selected>Choose...</option>
                      <option value="Active">Active</option>
                      <option value="Deactive">Deactive</option>
                    </select>
                  </div>
                </div>
                              
              </form>
              </div>
            </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
              
              <input 
              type="submit" 
              name="submit"
              class="btn btn-outline-info btn-icon-text"
              value="Update" 
              >
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>