
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
                <div class="card">         
                 <div class="card-body" >
                              
                     <h4 class="card-title">Due Payments Income of institute </h4>

                     <form method="POST" action="">
                     
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="inputEmail4"> Choose start Date</label>
                          <input type="date" class="form-control" name="incomedate">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputPassword4">Choose end Date</label>
                          <input type="date" class="form-control" name="enddate">
                        </div>

                      </div>
                                           
                      <input type="submit" name="submitnew" value="search" class="btn btn-danger mb-2"> 
                       </form>
                    
<!-- 

                     <form method="POST" action="">
                     <label >Choose start Date</label> <input type="date" name="incomedate">
                      <label >Choose end Date</label> <input type="date" name="enddate">
                     
                     <input  type="submit" name="submitnew" class="btn btn-secondary"  value="search"  >
                    </form> -->

                <table class="table table-bordered" id="dataTabl1" width="100%" cellspacing="0">
                   <thead>
                     <tr>
                     <th>Payment Type ID</th>
                     <th>paying amount</th>
                      <th>Pay Date</th> 
                     </tr>
                  </thead>
                  <tbody>
                    <?php

                    if (isset($_POST['submitnew'])) 
                    {
                     $income=$_POST['incomedate'];
                      $enddat=$_POST['enddate'];
                   

                    include '../../connection.php';

                   $tot_total_DuePaymentIncome=0;
                  $sql="SELECT * FROM duepayment  where datep BETWEEN '$income' AND '$enddat' ORDER BY dp_id DESC";
                 $query=mysqli_query($con,$sql);

                 while ($row=mysqli_fetch_array($query)) {

                      $tot_total_DuePaymentIncome=$tot_total_DuePaymentIncome+$row['p_amount'];

                  

                      ?>

                      <tr>
                        <td><?php echo $row['pt_id_fk']; ?></td>    
                       <td><?php echo $row['p_amount']; ?></td>
                        <td><?php echo $row['datep']; ?></td>
                      
                                            
                        </tr>

                        <?php
                      }
                    }

                      ?> 

                       <tr>
                   <td colspan="2" class="bg-primary text-white">TOTAL Due Payments Income</td>
                   <td class="bg-dark text-white"><?php echo  $tot_total_DuePaymentIncome ?></td>
                 </tr>   

                   
                  </tbody>

                </table>

                <br><br>
             
             <a id="downloadLink" onclick="exportF1(this)" class="btn btn-success"><i class="far fa-file-excel"></i></a>

             <!-- <button> <a id="downloadLink" onclick="exportF1(this)">Export to excel</a></button> -->
                             
      </div></div>

              <div class="card">         
                 <div class="card-body" >
                              
                     <h4 class="card-title"> Payments Income of institute </h4>
                    <form method="POST" action="">
                    
                     <div class="form-row">
                       <div class="form-group col-md-6">
                         <label for="inputEmail4"> Choose start Date</label>
                         <input type="date" class="form-control" name="paydate">
                       </div>
                       <div class="form-group col-md-6">
                         <label for="inputPassword4">Choose end Date</label>
                         <input type="date" class="form-control" name="endda">
                       </div>

                     </div>
                                          
                     <input type="submit" name="submitn" value="search" class="btn btn-danger mb-2"> 
                      </form>

<!-- 
                     <form method="POST" action="">
                     <label >Choose Date</label> <input type="date" name="paydate">
                      <label >Choose end Date</label> <input type="date" name="endda">
                     
                     <input  type="submit" name="submitn" class="btn btn-secondary"  value="search"  >
                    </form>
 -->
                <table class="table table-bordered" id="dataTabl2" width="100%" cellspacing="0">
                   <thead>
                     <tr>
                     <th>Payment Type ID</th>
                     <th>paid amount</th>
                      <th>Pay Date</th> 
                     </tr>
                  </thead>
                  <tbody>
                    <?php

                    if (isset($_POST['submitn'])) 
                    {
                     $incom=$_POST['paydate'];
                      $enddate=$_POST['endda'];
                   

                    include '../../connection.php';
                  
                  $sql="SELECT * FROM fee  where Py_Date BETWEEN '$incom' AND '$enddate' ORDER BY Fee_ID DESC";


                    $tot_total_PaymentsIncome =0;
                 $query=mysqli_query($con,$sql);

                 while ($row=mysqli_fetch_array($query)) {

                      $tot_total_PaymentsIncome=$tot_total_PaymentsIncome+$row['Py_advance'];

                      ?>

                      <tr>
                        <td><?php echo $row['Pay_Type']; ?></td>    
                       <td><?php echo $row['Py_advance']; ?></td>
                        <td><?php echo $row['Py_Date']; ?></td>
                      
                                            
                        </tr>

                        <?php
                      }
                    }

                      ?> 

                    <tr>
                   <td colspan="2" class="bg-primary text-white">TOTAL Payments Income </td>
                   <td class="bg-dark text-white"><?php echo  $tot_total_PaymentsIncome ?></td>
                 </tr>   

                   
                  </tbody>

                </table>

                <br><br>
             
             <a id="downloadLink" onclick="exportF2(this)" class="btn btn-success"><i class="far fa-file-excel"></i></a>

            <!-- <button> <a id="downloadLink" onclick="exportF2(this)">Export to excel</a></button> -->
                             
      </div></div>

      <hr>   


      <div class="card">         
                 <div class="card-body" > 
                 <h4 class="card-title"> Expenses of Institute </h4>      
                 <form method="POST" action="">
                 
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="inputEmail4"> Choose start Date</label>
                      <input type="date" class="form-control" name="enddate">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="inputPassword4">Choose end Date</label>
                      <input type="date" class="form-control" name="ente">
                    </div>

                  </div>
                                       
                  <input type="submit" name="submit" value="search" class="btn btn-danger mb-2"> 
                   </form>

<!-- 
                  <form method="POST" action="">
                    <label for="inputState">Expenses of Institute</label>
                       <label >Choose Date</label> <input type="date" name="enddate">
                        <label >Choose end Date</label> <input type="date" name="ente">
                     <input  type="submit" name="submit" class="btn btn-secondary"  value="search"  >
                    </form> -->
                   <table class="table table-bordered" id="dataTabl3" width="100%" cellspacing="0">
                   <thead>
                     <tr class="noExl">
                      <th>Expance_way</th>
                     <th>Expance_Amount</th>
                      <th>Date</th>
                     </tr>
                  </thead>
                  <tbody>
                    <?php

                    if (isset($_POST['submit'])) 
                    {
                   
                     $expensedate=$_POST['enddate'];
                      $enddate=$_POST['ente'];
                    
                    include '../../connection.php';

                    $sql="SELECT * FROM institude_expenses where exedate BETWEEN '$expensedate'AND '$enddate'  ORDER BY IE_id DESC";

                   $tot_total_institude_expenses=0;
                 $query=mysqli_query($con,$sql);

                 while ($row=mysqli_fetch_array($query)) {

                      $tot_total_institude_expenses=$tot_total_institude_expenses+$row['Expance_Amount'];

                      ?>

                      <tr>
                         <td><?php echo $row['Expance_way']; ?></td>
                        <td><?php echo $row['Expance_Amount']; ?></td>
                         <td><?php echo $row['exedate']; ?></td>
                        
                                            
                        </tr>

                        <?php
                      }
                    }

                      ?> 

                       <tr>
                   <td colspan="2" class="bg-primary text-white">TOTAL institude_expenses</td>
                   <td class="bg-dark text-white"><?php echo  $tot_total_institude_expenses ?></td>
                 </tr>   

                   
                  </tbody>

                </table>


                   <br><br>
                
                <a id="downloadLink" onclick="exportF3(this)" class="btn btn-success"><i class="far fa-file-excel"></i></a>

          <!-- <button> <a id="downloadLink" onclick="exportF3(this)">Export to excel</a></button>   -->
                             
      </div>
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
    <?php include '../../layout/script.php' ?>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Core plugin JavaScript-->
<script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="../../js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="../../vendor/chart.js/Chart.min.js"></script>

<script type="text/javascript">
function exportF1(elem) {
  var table1 = document.getElementById("dataTable1");
  var html = table1.outerHTML;
  var url = 'data:application/vnd.ms-excel,' + escape(html); // Set your html table into url 
  elem.setAttribute("href", url);
  elem.setAttribute("download", "export.xls"); // Choose the file name
  return false;
}
</script>
<script type="text/javascript">
function exportF2(elem) {
  var table2 = document.getElementById("dataTable2");
  var html = table2.outerHTML;
  var url = 'data:application/vnd.ms-excel,' + escape(html); // Set your html table into url 
  elem.setAttribute("href", url);
  elem.setAttribute("download", "export.xls"); // Choose the file name
  return false;
}
</script>
<script type="text/javascript">
function exportF3(elem) {
  var table3 = document.getElementById("dataTable3");
  var html = table3.outerHTML;
  var url = 'data:application/vnd.ms-excel,' + escape(html); // Set your html table into url 
  elem.setAttribute("href", url);
  elem.setAttribute("download", "export.xls"); // Choose the file name
  return false;
}
</script>


<!-- Page level custom scripts -->
<script src="../../js/demo/chart-area-demo.js"></script>
<script src="../../js/demo/chart-pie-demo.js"></script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"> </script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="src/jquery.table2excel.js"></script>



        </body>

        </html>
