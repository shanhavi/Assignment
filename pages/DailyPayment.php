
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include '../layout/head.php'  ?>
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
      <?php include '../layout/navbar.php'  ?>      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <?php include '../layout/sidebar.php' ; ?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            
            <div class="jumbotron">
           

                   <h3>Today Income </h3>
                <div class="card" >
                  <div class="card-body" style="margin: 0;">
                              
                     <h4 class="card-title">Daily Due payment Summary </h4>
                       <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
                   <thead>
                     <tr>
                     <th>Payment Type ID</th>
                     <th>paying amount</th>
                      <th>Pay Date</th> 
                     </tr>
                  </thead>
                  <tbody>
                    <?php

                   include '../connection.php';

                   $sql="SELECT * FROM duepayment where DATE(datep)=CURDATE() ORDER BY dp_id DESC";

                   $tot_pur_amount=0;
                 $query=mysqli_query($con,$sql);

                 while ($row=mysqli_fetch_array($query)) {

                      $tot_pur_amount= $tot_pur_amount + $row['p_amount'];

                 

                  

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
                   <td colspan="2" class="bg-primary text-white">TOTAL Daily Due payment </td>
                   <td  class="bg-dark text-white"><?php echo  $tot_pur_amount ?></td>
                 </tr>  
                   
                  </tbody>

                </table>
                   <br><br>
                
                <a id="downloadLink" onclick="exportF0(this)" class="btn btn-success"><i class="far fa-file-excel"></i></a>

                
                 <!-- <button> <a id="downloadLink" onclick="exportF0(this)">Export to excel</a></button> -->
                       
                </div>
         <hr><br>
              
                <div class="card" >
                  <div class="card-body" style="margin: 0;">
                              
                     <h4 class="card-title">Daily new Admission payment Summary </h4>
                       <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                   <thead>
                     <tr>
                     <th>Payment Type ID</th>
                     <th>paid amount</th>
                      <th>Pay Date</th> 
                     </tr>
                  </thead>
                  <tbody>
                    <?php

                           

                    include '../connection.php';
                  
                  $sql="SELECT * FROM fee  where  DATE(Py_Date)=CURDATE() ORDER BY Fee_ID DESC";
                  $tot_Admissionpayment_amount=0;
                 $query=mysqli_query($con,$sql);

                 while ($row=mysqli_fetch_array($query)) {

                      $tot_Admissionpayment_amount= $tot_Admissionpayment_amount + $row['Py_advance'];               
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
                   <td colspan="2" class="bg-primary text-white">TOTAL Daily new Admission payment </td>
                   <td class="bg-dark text-white"><?php echo  $tot_Admissionpayment_amount ?></td>
                 </tr>  
                   
                   
                  </tbody>

                </table>

                   <br><br>
                
                <a id="downloadLink" onclick="exportF1(this)" class="btn btn-success"><i class="far fa-file-excel"></i></a>


                    <!-- <button> <a id="downloadLink" onclick="exportF1(this)">Export to excel</a></button>       -->
                </div>
          </div>
           <div class="card" >
                  <div class="card-body" style="margin: 0;">
                              
                     <h4 class="card-title">Daily Cafetaria Income Summary </h4>
                  
                <table class="table table-bordered" id="dataTable3" width="100%" cellspacing="0">
                   <thead>
                     <tr>
                      <th>Amount</th>
                      <th>Pay Date</th> 
                     </tr>
                  </thead>
                  <tbody>
                    <?php

                                   

                    include '../connection.php';

                   $sql="SELECT * FROM cafetariaincome where Date(cafidate) =CURDATE() ORDER BY CafeIncome_ID DESC";

                    $tot_cafetariaincome_amount=0;
                 $query=mysqli_query($con,$sql);

                 while ($row=mysqli_fetch_array($query)) {

                      $tot_cafetariaincome_amount= $tot_cafetariaincome_amount + $row['Amount'];

                 

                 

                      ?>

                      <tr>
                        <td><?php echo $row['Amount']; ?></td>    
                        <td><?php echo $row['cafidate']; ?></td>
                      
                                            
                        </tr>

                        <?php
                      
                    }

                      ?> 

                      <tr>
                   <td class="bg-primary text-white">TOTAL cafetariaincome</td>
                   <td class="bg-dark text-white"><?php echo  $tot_cafetariaincome_amount ?></td>
                 </tr>  
                   
                  </tbody>

                </table>

                   <br><br>
                
                <a id="downloadLink" onclick="exportF2(this)" class="btn btn-success"><i class="far fa-file-excel"></i></a>

                       <!-- <button> <a id="downloadLink" onclick="exportF2(this)">Export to excel</a></button> -->
                </div>
          </div>
        </div>

          <hr style="border:none;"><hr><hr>
              <h3>Today Expenses </h3>
                <div class="card" >
                  <div class="card-body" style="margin: 0;">
                              
                     <h4 class="card-title">Institute Expenses </h4>
                    <table class="table table-bordered" id="dataTable4" width="100%" cellspacing="0">
                   <thead>
                     <tr>
                     <th>Payment Type ID</th>
                     <th>paid amount</th>
                      <th>Pay Date</th> 
                     </tr>
                  </thead>
                  <tbody>
                    <?php

                                  

                    include '../connection.php';
                  
                  $sql="SELECT * FROM fee  where Date(Py_Date)=CURDATE() ORDER BY Fee_ID DESC";
                  $tot_InstitutExpenses_amount=0;
                 $query=mysqli_query($con,$sql);

                 while ($row=mysqli_fetch_array($query)) {

                      $tot_InstitutExpenses_amount= $tot_InstitutExpenses_amount + $row['Py_advance'];

                 

                   
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
                   <td colspan="2" class="bg-primary text-white">TOTAL InstitutExpenses</td>
                   <td class="bg-dark text-white"><?php echo  $tot_InstitutExpenses_amount ?></td>
                 </tr>  
                   
                  </tbody>

                </table>

                   <br><br>
                
                <a id="downloadLink" onclick="exportF3(this)" class="btn btn-success"><i class="far fa-file-excel"></i></a>


                      <!-- <button> <a id="downloadLink" onclick="exportF3(this)">Export to excel</a></button>     -->
                </div>
         <hr><br>
              
                <div class="card" >
                  <div class="card-body" style="margin: 0;">
                              
                     <h4 class="card-title">Cafetaria Expenses </h4>
                   <table class="table table-bordered" id="dataTable5" width="100%" cellspacing="0">
                   <thead>
                     <tr>
                      <th>Amount</th>
                      <th>Pay Date</th> 
                     </tr>
                  </thead>
                  <tbody>
                    <?php

                                    

                    include '../connection.php';

                   $sql="SELECT * FROM cafetaria_expenses where Date(edate)=CURDATE() ORDER BY CE_id DESC";

                     $tot_CafetariaExpenses_amount=0;
                 $query=mysqli_query($con,$sql);

                 while ($row=mysqli_fetch_array($query)) {

                      $tot_CafetariaExpenses_amount= $tot_CafetariaExpenses_amount + $row['Expance_Amount'];

                 
                      ?>

                      <tr>
                        <td><?php echo $row['Expance_Amount']; ?></td>    
                        <td><?php echo $row['edate']; ?></td>
                      
                                            
                        </tr>

                        <?php
                      
                    }

                      ?> 
                        <tr>
                   <td class="bg-primary text-white">TOTAL CafetariaExpenses</td>
                   <td class="bg-dark text-white"><?php echo  $tot_CafetariaExpenses_amount ?></td>
                 </tr>  
                   
                  </tbody>

                </table>

                   <br><br>
                
                <a id="downloadLink" onclick="exportF4(this)" class="btn btn-success"><i class="far fa-file-excel"></i></a>

  <!--  <button> <a id="downloadLink" onclick="exportF4(this)">Export to excel</a></button> -->
                       
                </div>
          </div>

        <hr><br>
              
                <div class="card" >
                  <div class="card-body" style="margin: 0;">
                              
                     <h4 class="card-title">employees salary  - Current Month  </h4>
                   <table class="table table-bordered" id="dataTable6" width="100%" cellspacing="0">
                   <thead>
                     <tr>
                      <th>Amount</th>
                      <th>Pay Date</th> 
                     </tr>
                  </thead>
                  <tbody>
                    <?php

                                    

                    include '../connection.php';

                   $sql="SELECT * FROM salary where Date(Sal_date)=CURDATE() ORDER BY sal_id DESC";

                    $tot_total_salary=0;
                   $query=mysqli_query($con,$sql);

                 while ($row=mysqli_fetch_array($query)) {

                      $tot_total_salary=$tot_total_salary+$row['Amount'];


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
                   <td class="bg-dark text-white"><?php echo  $tot_total_salary ?></td>
                 </tr>  
                   
                  </tbody>

                </table>

                   <br><br>
                
                <a id="downloadLink" onclick="exportF5(this)" class="btn btn-success"><i class="far fa-file-excel"></i></a>

                   <!--  <button> <a id="downloadLink" onclick="exportF5(this)">Export to excel</a></button> -->
                       
                </div>
          </div>

          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          
          <!-- partial -->
        </div>
         

     
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
    <?php include '../layout/script.php' ?>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Core plugin JavaScript-->
<script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="../js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="../vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="../js/demo/chart-area-demo.js"></script>
<script src="../js/demo/chart-pie-demo.js"></script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"> </script>

<script type="text/javascript">
function exportF0(elem) {
  var table = document.getElementById("dataTable1");
  var html = table.outerHTML;
  var url = 'data:application/vnd.ms-excel,' + escape(html); // Set your html table into url 
  elem.setAttribute("href", url);
  elem.setAttribute("download", "export.xls"); // Choose the file name
  return false;
}
</script>

<script type="text/javascript">
function exportF1(elem) {
  var table = document.getElementById("dataTable2");
  var html = table.outerHTML;
  var url = 'data:application/vnd.ms-excel,' + escape(html); // Set your html table into url 
  elem.setAttribute("href", url);
  elem.setAttribute("download", "export.xls"); // Choose the file name
  return false;
}
</script>
<script type="text/javascript">
function exportF2(elem) {
  var table = document.getElementById("dataTable3");
  var html = table.outerHTML;
  var url = 'data:application/vnd.ms-excel,' + escape(html); // Set your html table into url 
  elem.setAttribute("href", url);
  elem.setAttribute("download", "export.xls"); // Choose the file name
  return false;
}
</script>
<script type="text/javascript">
function exportF3(elem) {
  var table = document.getElementById("dataTable4");
  var html = table.outerHTML;
  var url = 'data:application/vnd.ms-excel,' + escape(html); // Set your html table into url 
  elem.setAttribute("href", url);
  elem.setAttribute("download", "export.xls"); // Choose the file name
  return false;
}
</script>
<script type="text/javascript">
function exportF4(elem) {
  var table = document.getElementById("dataTable5");
  var html = table.outerHTML;
  var url = 'data:application/vnd.ms-excel,' + escape(html); // Set your html table into url 
  elem.setAttribute("href", url);
  elem.setAttribute("download", "export.xls"); // Choose the file name
  return false;
}
</script>
<script type="text/javascript">
function exportF5(elem) {
  var table = document.getElementById("dataTable6");
  var html = table.outerHTML;
  var url = 'data:application/vnd.ms-excel,' + escape(html); // Set your html table into url 
  elem.setAttribute("href", url);
  elem.setAttribute("download", "export.xls"); // Choose the file name
  return false;
}
</script>
        </body>

        </html>
