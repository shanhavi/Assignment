
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include '../../layout/head.php'  ?>
    <!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css
    "> -->
    <style type="text/css">
      .my-card
      {
          position:absolute;
          left:40%;
          top:-20px;
          border-radius:50%;
      }
    </style>
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
            
            <div class="jumbotron">
           

                   <h3>Income Summary </h3>
                <div class="card" >
                  <div class="card-body" style="margin: 0;">
                              
                     <h4 class="card-title">Due payment Summary - Current Month </h4>
                       <table id="tblCustomers" class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                   <thead>
                     <tr>
                     <th>Payment Type ID</th>
                     <th>paying amount</th>
                      <th>Pay Date</th> 
                     </tr>
                  </thead>
                  <tbody>
                    <?php

                   include '../../connection.php';

                   $sql="SELECT * FROM duepayment where MONTH(datep) = MONTH(NOW()) ORDER BY dp_id DESC";

                    $tot_total_duepayment=0;
                   $query=mysqli_query($con,$sql);

                 while ($row=mysqli_fetch_array($query)) {

                      $tot_total_duepayment=$tot_total_duepayment+$row['p_amount'];


                      ?>

                      <tr>
                        <td><?php echo $row['pt_id_fk']; ?></td>    
                       <td><?php echo $row['p_amount']; ?></td>
                        <td><?php echo $row['datep']; ?></td>
                      
                                            
                        </tr>

                        <?php
                     }

                      ?> 

                      <tr>
                   <td colspan="2" class="bg-primary text-white">TOTAL duepayment</td>
                   <td class="bg-dark text-white">Rs.<?php echo  $tot_total_duepayment ?></td>
                 </tr>  
                   
                  </tbody>

                </table>

                       
                </div>
         <hr><br>
              
                <div class="card" >
                  <div class="card-body" style="margin: 0;">
                              
                     <h4 class="card-title">New Admission payment Summary- Current Month </h4>
                       <table id="tblCustomers1" class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                   <thead>
                     <tr>
                     <th>Payment Type ID</th>
                     <th>paid amount</th>
                      <th>Pay Date</th> 
                     </tr>
                  </thead>
                  <tbody>
                    <?php

                           

                    include '../../connection.php';
                  
                  $sql="SELECT * FROM fee  where  MONTH(Py_Date) = MONTH(NOW())  ORDER BY Fee_ID DESC";


                    $tot_total_Admissiopayment=0;
                   $query=mysqli_query($con,$sql);

                 while ($row=mysqli_fetch_array($query)) {

                      $tot_total_Admissiopayment=$tot_total_Admissiopayment+$row['Py_advance'];

                      ?>

                      <tr>
                        <td><?php echo $row['Pay_Type']; ?></td>    
                       <td><?php echo $row['Py_advance']; ?></td>
                        <td><?php echo $row['Py_Date']; ?></td>
                      
                                            
                        </tr>

                        <?php
                      }
                    

                      ?> 
                       <tr>
                   <td colspan="2" class="bg-primary text-white">TOTAL Admission payment</td>
                   <td class="bg-dark text-white">Rs.<?php echo  $tot_total_Admissiopayment ?></td>
                 </tr>  
                   
                  </tbody>

                </table>
 
                 
                </div>
          </div>
           <div class="card" >
                  <div class="card-body" style="margin: 0;">
                              
                     <h4 class="card-title">Cafetaria Income Summary -Current Month </h4>
                  
                <table id="tblCustomers2" class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                   <thead>
                     <tr>
                      <th>Amount</th>
                      <th>Pay Date</th> 
                     </tr>
                  </thead>
                  <tbody>
                    <?php

                                   

                    include '../../connection.php';

                   $sql="SELECT * FROM cafetariaincome where MONTH(cafidate) = MONTH(NOW()) ORDER BY CafeIncome_ID DESC";

                    $tot_total_CafetariaIncome =0;
                   $query=mysqli_query($con,$sql);

                 while ($row=mysqli_fetch_array($query)) {

                      $tot_total_CafetariaIncome=$tot_total_CafetariaIncome+$row['Amount'];


                      ?>

                      <tr>
                        <td><?php echo $row['Amount']; ?></td>    
                        <td><?php echo $row['cafidate']; ?></td>
                      
                                            
                        </tr>

                        <?php
                      
                    }

                      ?> 
                      <tr>
                   <td colspan="2" class="bg-primary text-white">TOTAL CafetariaIncome </td>
                   <td class="bg-dark text-white">Rs.<?php echo  $tot_total_CafetariaIncome ?></td>
                 </tr>  
                  <?php 
 $income= $tot_total_duepayment+$tot_total_Admissiopayment+ $tot_total_CafetariaIncome; 
               

                  ?>

                  <tr>
                   <td colspan="2" class="bg-primary text-white">TOTAL income </td>
                   <td class="bg-dark text-white">Rs.<?php echo  $income ?></td>
                 </tr> 
 
                  </tbody>

                </table>
                    
                </div>
          </div>
        </div>

   

          <hr style="border:none;"><hr><hr>
              <h3>Expenses -Current Month</h3>
                <div class="card" >
                  <div class="card-body" style="margin: 0;">
                              
                     <h4 class="card-title">Institute Expenses - Current Month  </h4>
                    <table id="tblCustomers3" class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                   <thead>
                     <tr>
                      <th>paid amount</th>
                      <th>Pay Date</th> 
                     </tr>
                  </thead>
                  <tbody>
                    <?php

                                  

                    include '../../connection.php';
                  
                  $sql="SELECT * FROM institude_expenses  where MONTH(exedate) = MONTH(NOW()) ORDER BY IE_id DESC";


                    $tot_total_InstituteExpenses =0;
                   $query=mysqli_query($con,$sql);

                 while ($row=mysqli_fetch_array($query)) {

                      $tot_total_InstituteExpenses=$tot_total_InstituteExpenses+$row['Expance_Amount'];


                      ?>

                      <tr>
                        <td><?php echo $row['Expance_Amount']; ?></td>
                        <td><?php echo $row['exedate']; ?></td>
                      
                                            
                        </tr>

                        <?php
                    
                    }

                      ?> 
                    <tr>
                   <td colspan="2" class="bg-primary text-white">TOTAL Institute Expenses </td>
                   <td class="bg-dark text-white">Rs.<?php echo  $tot_total_InstituteExpenses ?></td>
                 </tr>  

                  </tbody>

                </table>

                    
                </div>
         <hr><br>
              
                <div class="card" >
                  <div class="card-body" style="margin: 0;">
                              
                     <h4 class="card-title">Cafetaria Expenses - Current Month  </h4>
                   <table id="tblCustomers4" class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                   <thead>
                     <tr>
                      <th>Amount</th>
                      <th>Pay Date</th> 
                     </tr>
                  </thead>
                  <tbody>
                    <?php

                                    

                    include '../../connection.php';

                   $sql="SELECT * FROM cafetaria_expenses where MONTH(edate) = MONTH(NOW()) ORDER BY CE_id DESC";

                    $tot_total_CafetariaExpenses=0;
                   $query=mysqli_query($con,$sql);

                 while ($row=mysqli_fetch_array($query)) {

                      $tot_total_CafetariaExpenses=$tot_total_CafetariaExpenses+$row['Expance_Amount'];


                      ?>

                      <tr>
                        <td><?php echo $row['Expance_Amount']; ?></td>    
                        <td><?php echo $row['edate']; ?></td>
                      
                                            
                        </tr>

                        <?php
                      
                    }

                      ?> 

                       <tr>
                   <td class="bg-primary text-white">TOTAL Cafetaria Expenses </td>
                   <td class="bg-dark text-white">Rs.<?php echo  $tot_total_CafetariaExpenses ?></td>
                 </tr>  
                   
                  </tbody>

                </table>

                       
                </div>
          </div>
            <hr><br>
              
                <div class="card" >
                  <div class="card-body" style="margin: 0;">
                              
                     <h4 class="card-title">employees salary  - Current Month  </h4>
                   <table id="tblCustomers5" class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                   <thead>
                     <tr>
                      <th>Amount</th>
                      <th>Pay Date</th> 
                     </tr>
                  </thead>
                  <tbody>
                    <?php

                                    

                    include '../../connection.php';

                   $sql="SELECT * FROM salary where MONTH(Sal_date) = MONTH(NOW()) ORDER BY sal_id DESC";

                    $tot_total_salary=0;
                   $query=mysqli_query($con,$sql);

                 while ($row=mysqli_fetch_array($query)) {

                      $tot_total_salExpenses=$tot_total_salary+$row['Amount'];


                      ?>

                      <tr>
                        <td><?php echo $row['Amount']; ?></td>    
                        <td><?php echo $row['Sal_date']; ?></td>
                      
                                            
                        </tr>

                        <?php
                      
                    }

                      ?> 

                       <tr>
                   <td class="bg-primary text-white">TOTAL salary of employees </td>
                   <td class="bg-dark text-white"><?php echo  $tot_total_salExpenses ?></td>
                 </tr>  


               <?php $instituteexpenseithcafe= $tot_total_CafetariaExpenses+$tot_total_InstituteExpenses+$tot_total_salExpenses ;?>

                <tr>
                   <td class="bg-primary text-white">TOTAL expenses </td>
                   <td class="bg-dark text-white">Rs. <?php echo  $instituteexpenseithcafe ?></td>
                 </tr>


                 <tr>
                   <td class="bg-primary text-white">TOTAL profit  </td>

  <?php $profit= $income-$instituteexpenseithcafe; ?>
                    
                   <td class="bg-dark text-white">Rs. <?php echo  $profit ?></td>
                 </tr>


                  </tbody>

                </table>

                       
                </div>
          </div>
                       
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          
          <!-- partial -->
        </div>

           <br><br>
        
        <a id="downloadLink" onclick="exportF(this)" class="btn btn-success"><i class="far fa-file-excel"></i></a>

         
    <!-- <button> <a id="downloadLink" onclick="exportF(this)">Export to excel</a></button> -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>


     
     
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          
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
function exportF(elem) {
  var table = document.getElementById("tblCustomers");
  var html = table.outerHTML;
  var url = 'data:application/vnd.ms-excel,' + escape(html); // Set your html table into url 
  elem.setAttribute("href", url);
  elem.setAttribute("download", "export.xls"); // Choose the file name 
  return false;
}
</script>
 <script type="text/javascript">
function exportF(elem1) {
  var table = document.getElementById("tblCustomers1");
  var html = table.outerHTML;
  var url = 'data:application/vnd.ms-excel,' + escape(html); // Set your html table into url 
  elem1.setAttribute("href", url);
  elem1.setAttribute("download", "export.xls"); // Choose the file name
  return false;
}
</script>
 <script type="text/javascript">
function exportF(elem1) {
  var table = document.getElementById("tblCustomers2");
  var html = table.outerHTML;
  var url = 'data:application/vnd.ms-excel,' + escape(html); // Set your html table into url 
  elem1.setAttribute("href", url);
  elem1.setAttribute("download", "export.xls"); // Choose the file name
  return false;
}
</script>
 <script type="text/javascript">
function exportF(elem1) {
  var table = document.getElementById("tblCustomers3");
  var html = table.outerHTML;
  var url = 'data:application/vnd.ms-excel,' + escape(html); // Set your html table into url 
  elem1.setAttribute("href", url);
  elem1.setAttribute("download", "export.xls"); // Choose the file name
  return false;
}
</script>
 <script type="text/javascript">
function exportF(elem1) {
  var table = document.getElementById("tblCustomers4");
  var html = table.outerHTML;
  var url = 'data:application/vnd.ms-excel,' + escape(html); // Set your html table into url 
  elem1.setAttribute("href", url);
  elem1.setAttribute("download", "export.xls"); // Choose the file name
  return false;
}
</script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Core plugin JavaScript-->
<script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="../../js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="../../vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="../../js/demo/chart-area-demo.js"></script>
<script src="../../js/demo/chart-pie-demo.js"></script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"> </script>


        </body>

        </html>
