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
               <span class="word">Due payments Check </span>
             
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
                     <h5 class="modal-title" id="exampleModalLabel">Add Due Payment</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true"></span>
                     </button>
                   </div>
                   <div class="modal-body">

                   <form method="POST">
                       <div class="form-row">
                            <div class="form-group col-md-6">
                           <label for="inputState">Student ID</label>
                           <select
                             type="text" 
                             name="StudentID" 
                             class="form-control"
                             required="" 
                             >

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
                           <label for="inputState">Payment Type ID</label>
                           <select
                             type="text" 
                             name="PaymentTypeID" 
                             class="form-control"
                             required="" 
                             >
                         
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
                      <label >course ID</label>
                     <select
                       type="text" 
                       name="coursename" 
                       class="form-control"
                       required="" 
                       >

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
                           <label >Balance</label>
                           <input 
                             type="text"
                             name="balance" 
                             class="form-control" 
                             id="balance" 
                            placeholder="balance" >
                         </div>


                         <div class="form-group col-md-6">
                           <label >Paying amount</label>
                           <input 
                             type="Text"
                             name="payingamount" 
                             class="form-control" 
                             id="payingamount" 
                             placeholder="Date">
                         </div>
                           <div class="form-group col-md-6">
                           <label >new balance </label>
                           <input 
                             type="Text"
                             name="newbalance" 
                             class="form-control" 
                             id="newbalance"
                             value="<?php echo $newbalance?>" 
                             placeholder="Date">
                         </div>

                         <div class="form-group col-md-6">
                           <label >Pay Date</label>
                           <input 
                             type="Date"
                             name="pdate" 
                             class="form-control" 
                             id="inputEmail4" 
                             placeholder="Date">
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
            <!-- Quick Action Toolbar Ends-->
            <div class="card shadow mb-4">
             <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">View due Payments </h6>
             </div>

             <div class="card-body">
               <div class="table-responsive">
                 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                    <th>Student ID</th>
                     <th>Payment Type ID</th>
                     <th>course id</th>
                     <th>balance</th>
                     <th>paying amount</th>
                      <th>new balance</th>
                     <th>Pay Date</th>  
                     <th>Action</th>
                   </tr>
                 </thead>
                 <tbody>
                   <?php

                   include '../../connection.php';

                   $sql="SELECT * FROM duepayment dp INNER JOIN student s ON dp.student_id_fk=s.Stu_id INNER JOIN paymenttype pt ON dp.pt_id_fk=pt.Pay_type_id INNER JOIN course c ON dp.course_id_fk=c.C_ID ORDER BY dp_id DESC";

                   $query=mysqli_query($con,$sql);

                   while ($row=mysqli_fetch_array($query)) {

                     ?>
        
                     <tr>
                       <td><?php echo $row['Stu_name']; ?></td>
                        <td><?php echo $row['Pay_type']; ?></td>
                       <td><?php echo $row['C_Name']; ?></td>
                      
                       <td><?php echo $row['balance']; ?></td>
                       <td><?php echo $row['p_amount']; ?></td>
                         <td><?php echo $row['newbal']; ?></td>
                       <td><?php echo $row['datep']; ?></td>
                      
                                             
                      
                       <td>

                         <a href="crud/delete.php?id=<?php echo $row['dp_id']; ?>"class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                         <!-- <a href="view-single.php?id=<?php echo $row['dp_id']; ?>" class="btn btn-primary"><i class="fa fa-eye"></i></a> -->

                         <!-- <a href="edit.php?id=<?php echo $row['dp_id']; ?>" class="btn btn-success" ><i class="fas fa-edit"></i></i></a> -->

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
    <script type="text/javascript">
     $("#payingamount").keyup( function(){
    
    var payingamount = parseInt($.trim($(this).val()));
    var balance = parseInt($("#balance").val());
    if( payingamount!='' && !isNaN(payingamount) && payingamount<=balance)
    {
    var newbalance = balance-payingamount;
    $("#newbalance").val(newbalance);
    
    }
    else{
    $("#newbalance").val(balance);
    }
    
    });
    </script>

  <!-- End custom js for this page -->
  </body>
</html>

<?php 
if (isset($_POST['submit'])) {
  $pbalance=$_POST['balance'];
  $advancefees=$_POST['payingamount'];
  $pdate=$_POST['pdate'];
  $PaymentTypeID=$_POST['PaymentTypeID'];
  $StudentID=$_POST['StudentID'];
  $coursee=$_POST['coursename'];
   
  $sbalance=$_POST['newbalance'];
  $newbalance=$balance -$payingamount;

 

  include '../../connection.php';

  $sql="INSERT INTO duepayment(student_id_fk,pt_id_fk,course_id_fk,balance,p_amount,newbal,datep) VALUES ('$StudentID','$PaymentTypeID','$coursee','$pbalance','$advancefees','$sbalance','$pdate')";


  $query= mysqli_query($con,$sql);

  if ($query) {
    ?>

    <script>
      $.alert({
        title: 'Alert!',
        content: 'Payment Create successfully!!!!',
        type:'green',
      });
      function pageRedirect() {
        window.location.replace("createduePayment.php");
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



