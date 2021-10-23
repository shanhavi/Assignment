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
               <span class="word">Payment Handling</span>
             
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
                          <label>Total </label>
                          <input 
                            type="text"
                            name="fees" 
                            class="form-control" 
                            id="fees" 
                            placeholder="Total">
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
                          <label >advancefees</label>
                          <input 
                            type="text"
                            name="advancefees" 
                            class="form-control" 
                            id="advancefees" 
                            placeholder="advance">
                        </div>
                        <div class="form-group col-md-6">
                          <label >Balance</label>
                          <input 
                            type="text"
                            name="balance" 
                            class="form-control" 
                            id="balance" 
                            value="<?php echo $balance;?>" 
                            placeholder="balance" readonly>
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
                      <label >Batch ID</label>
                     <select
                       type="text" 
                       name="batchee" 
                       class="form-control"
                       required="" 
                       >

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
              <h6 class="m-0 font-weight-bold text-primary">View Payment </h6>
             </div>

             <div class="card-body">
               <div class="table-responsive">
                 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                    <th>Total Amount</th>
                    <th>course_id</th>
                    <th>Advance</th>
                    <th>Due balance</th>
                     <th>Pay Date</th>
                     <th>Payment Type ID</th>  
                    <th>Student ID</th>
                    <th>Batch ID</th>
                     <th>Action</th>
                   </tr>
                 </thead>
                 <tbody>
                   <?php

                   include '../../connection.php';

                   $sql="SELECT * FROM fee f INNER JOIN course c ON f.course_id_fk=c.C_ID INNER JOIN paymenttype pt ON f.Pay_Type=pt.Pay_type_id INNER JOIN student s ON f.Stu_ID_fk=s.Stu_id INNER JOIN batch b ON f.B_id_fk=b.B_ID  ORDER BY Fee_ID DESC";

                   $query=mysqli_query($con,$sql);

                   while ($row=mysqli_fetch_array($query)) {

                     ?>

                     <tr>
                      <td><?php echo $row['Py_total']; ?></td>
                       <td><?php echo $row['C_Name']; ?></td>
                       <td><?php echo $row['Py_advance']; ?></td>
                       <td><?php echo $row['balancepay']; ?></td>
                       <td><?php echo $row['Py_Date']; ?></td>
                       <td><?php echo $row['Pay_type']; ?></td>
                       <td><?php echo $row['Stu_name']; ?></td>
                       <td><?php echo $row['Batch_name']; ?></td>
                      
                                             
                      
                       <td>

                         <a href="crud/delete.php?id=<?php echo $row['Fee_ID']; ?>"class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                         <!-- <a href="view-single.php?id=<?php echo $row['Fee_ID']; ?>" class="btn btn-primary"><i class="fa fa-eye"></i></a> -->

                         <!-- <a href="edit.php?id=<?php echo $row['Fee_ID']; ?>" class="btn btn-success" ><i class="fas fa-edit"></i></i></a> -->
                         
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
      $("#advancefees").keyup( function(){
    
    var advancefees = parseInt($.trim($(this).val()));
    var totalfee = parseInt($("#fees").val());
    if( advancefees!='' && !isNaN(advancefees) && advancefees<=totalfee)
    {
    var balance = totalfee-advancefees;
    $("#balance").val(balance);
    
    }
    else{
    $("#balance").val(totalfee);
    }
    
    });
    </script>
    <!-- End custom js for this page -->
  </body>
</html>

<?php 
if (isset($_POST['submit'])) {
  $fees=$_POST['fees'];
  $coursee=$_POST['coursename'];
  $advancefees=$_POST['advancefees'];
  $sbalance=$_POST['balance'];
  $pdate=$_POST['pdate'];
  $PaymentTypeID=$_POST['PaymentTypeID'];
  $StudentID=$_POST['StudentID'];
  $batch=$_POST['batchee'];
   
 
  $balance=$fees -$advancefees;
  

  $year=date("Y");

$month=date("m");

if ($month<=6) {

   include '../../connection.php';

 $sqllimit="SELECT count(Stu_ID_fk) AS numberof FROM fee WHERE course_id_fk ='$coursee'AND B_id_fk='$batch' AND DATE(Py_Date) BETWEEN '{$year}-1-01' AND '{$year}-6-31' ";
 }
else{
   include '../../connection.php';
  $sqllimit="SELECT count(Stu_ID_fk) AS numberof FROM fee WHERE course_id_fk ='$coursee' AND B_id_fk='$batch'AND DATE(Py_Date) BETWEEN '{$year}-7-01' AND '{$year}-12-31' ";
}
 $query=mysqli_query($con,$sqllimit);

while ($row=mysqli_fetch_array($query)) {
  $courselimit=$row['numberof'];

  
  if ($courselimit>20) {
    ?>
      <script type="text/javascript">
        alert("limit crossed ")
      </script>
    <?php

  }

else{


 include '../../connection.php';
  $sql="INSERT INTO fee (Py_total, course_id_fk, Py_advance, balancepay, Py_Date, Pay_Type, Stu_ID_fk, B_id_fk) VALUES ('$fees','$coursee','$advancefees','$sbalance','$pdate','$PaymentTypeID','$StudentID','$batch')";


  $query= mysqli_query($con,$sql);

  if ($query) {
    ?>

    <script>
      $.alert({
        title: 'Alert!',
        content: 'student initial registered  successfully!!!!',
        type:'green',
      });
      function pageRedirect() {
        window.location.replace("createPayment.php");
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
}

}
?>



