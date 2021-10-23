<?php  
$id=$_GET['id'];

include '../../connection.php';

$sql="SELECT * FROM fee WHERE Fee_ID='$id'";

$query=mysqli_query($con,$sql);

while ($row=mysqli_fetch_array($query)) {

  $fees=$row['Py_total'];
   $coursee=$row['course_id_fk'];
   $advancefees=$row['Py_advance'];
   $sbalance=$row['balancepay'];
   $pdate=$row['Py_Date'];
   $PaymentTypeID=$row['Pay_Type'];
   $StudentID=$row['Stu_ID_fk'];
   $batch=$row['B_id_fk'];
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
                    <label>Total </label>
                    <input 
                      type="text"
                      name="fees" 
                      class="form-control" 
                      id="fees" 
                      placeholder="Total"
                      value="<?php echo $fees; ?>">
                  </div>
                    <div class="form-group col-md-6">
                    <label >course ID</label>
                   <select
                     type="text" 
                     name="coursename" 
                     class="form-control"
                     required="" 
                     value="<?php echo $coursename; ?>">

                    <?php
                    include "../../connection.php";
                    $query ="SELECT * FROM course";
                    $result = mysqli_query($con,$query);

                    while ($row = mysqli_fetch_array($result))
                    {
                      ?>
                      <option value=<?php echo $row["C_ID"]?>> <?php echo $row["C_Name"]?></option>
                      <?php
                    }
                    ?>
                   </select>
                  </div>
                  <div class="form-group col-md-6">
                    <label >advancefees</label>
                    <input 
                      type="text"
                      name="advancefees" 
                      class="form-control" 
                      id="advancefees" 
                      placeholder="advance"
                      value="<?php echo $advancefees; ?>">
                  </div>
                  <div class="form-group col-md-6">
                    <label >Balance</label>
                    <input 
                      type="text"
                      name="balance" 
                      class="form-control" 
                      id="balance" 
                      value="<?php echo $balance;?>" 
                      placeholder="balance" readonly
                      >
                  </div>
                  <div class="form-group col-md-6">
                    <label >Pay Date</label>
                    <input 
                      type="Date"
                      name="pdate" 
                      class="form-control" 
                      id="inputEmail4" 
                      placeholder="Date"
                      value="<?php echo $pdate; ?>">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputState">Payment Type ID</label>
                    <select
                      type="text" 
                      name="PaymentTypeID" 
                      class="form-control"
                      required="" 
                      value="<?php echo $PaymentTypeID; ?>">
                  
                    <?php
                    include "../../connection.php";
                    $query ="SELECT * FROM paymenttype";
                    $result = mysqli_query($con,$query);

                    while ($row = mysqli_fetch_array($result))
                    {
                      ?>
                      <option value=<?php echo $row["Pay_type_id"]?>> <?php echo $row["Pay_type"]?></option>
                      <?php
                    }
                    ?>
                      </select>
                  </div>
                      <div class="form-group col-md-6">
                     <label for="inputState">Student ID</label>
                     <select
                       type="text" 
                       name="StudentID" 
                       class="form-control"
                       required="" 
                       value="<?php echo $StudentID; ?>">

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
                <label >Batch ID</label>
               <select
                 type="text" 
                 name="batchee" 
                 class="form-control"
                 required="" 
                 value="<?php echo $batchee; ?>">

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
                                     
                 </div>

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