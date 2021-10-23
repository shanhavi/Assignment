
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
                <div class="card">         
                 <div class="card-body" >
                              
                     <h4 class="card-title">cafetaria Income of institute </h4>
                     <br>
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
              <br>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                   <thead>
                     <tr>
                      <th>Amount</th>
                      <th>Pay Date</th> 
                     </tr>
                  </thead>
                  <tbody>
                    <?php

                    if (isset($_POST['submitnew'])) 
                    {
                     $income=$_POST['incomedate'];
                      $enddat=$_POST['enddate'];
                   

                    include '../connection.php';

                   $sql="SELECT * FROM cafetariaincome where cafidate BETWEEN '$income' AND  '$enddat' ORDER BY CafeIncome_ID DESC";

                   $tot_total_cafetariaincome=0;
                 $query=mysqli_query($con,$sql);

                 while ($row=mysqli_fetch_array($query)) {

                      $tot_total_cafetariaincome=$tot_total_cafetariaincome+$row['Amount'];

                      ?>

                      <tr>
                        <td><?php echo $row['Amount']; ?></td>    
                        <td><?php echo $row['cafidate']; ?></td>
                      
                                            
                        </tr>

                        <?php
                      }
                    }

                      ?> 

                       <tr>
                   <td class="bg-primary text-white">TOTAL INCOME</td>
                   <td class="bg-dark text-white"><?php echo  $tot_total_cafetariaincome ?></td>
                 </tr>   

                   
                  </tbody>

                </table>
                 <br>  <br> 

                 <a id="downloadLink1" onclick="exportF1(this)" class="btn btn-success"><i class="far fa-file-excel"></i></a>

                 <!-- <button> <a id="downloadLink1" onclick="exportF1(this)">Export to excel</a></button>              -->
      </div></div>

             

      <br>   


      <div class="card">         
                 <div class="card-body" >
                   <h4 class="card-title">Expenses of Cafetaria</h4>
                   <br>

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
                
                       <label >Choose Date</label> <input type="date" name="enddate">
                        <label >Choose end Date</label> <input type="date" name="ente">
                     <input  type="submit" name="submit" class="btn btn-secondary"  value="search"  >
                    </form> -->
                    <br>
                   <table class="table table-bordered" id="dataTablenew" width="100%" cellspacing="0">
                   <thead>
                     <tr class="noExl">
                      <th>Amount</th>
                      <th>Date</th>
                     </tr>
                  </thead>
                  <tbody>
                    <?php

                    if (isset($_POST['submit'])) 
                    {
                   
                     $expensedate=$_POST['enddate'];
                      $enddate=$_POST['ente'];
                    
                    include '../connection.php';

                    $sql="SELECT * FROM cafetaria_expenses where edate BETWEEN '$expensedate'AND '$enddate'  ORDER BY CE_id DESC";

                   $tot_total_cafetaria_expenses=0;
                 $query=mysqli_query($con,$sql);

                 while ($row=mysqli_fetch_array($query)) {

                      $tot_total_cafetaria_expenses=$tot_total_cafetaria_expenses+$row['Expance_Amount'];
                      ?>

                      <tr>
                         <td><?php echo $row['Expance_Amount']; ?></td>
                          <td><?php echo $row['edate']; ?></td>
                        
                                            
                        </tr>

                        <?php
                      }
                    }

                      ?> 

                       <tr>
                   <td  class="bg-primary text-white">TOTAL EXPENSES</td>
                   <td class="bg-dark text-white"><?php echo  $tot_total_cafetaria_expenses ?></td>
                 </tr>   

                   
                  </tbody>

                </table>

                <br><br>

                 <a id="downloadLink2" onclick="exportF2(this)" class="btn btn-success"><i class="far fa-file-excel"></i></a>
                
                <!-- <button> <a id="downloadLink2" onclick="exportF2(this)">Export to excel</a></button> -->
                             
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
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="src/jquery.table2excel.js"></script>

<script type="text/javascript">
function exportF1(elem) {
  var table = document.getElementById("dataTable");
  var html = table.outerHTML;
  var url = 'data:application/vnd.ms-excel,' + escape(html); // Set your html table into url 
  elem.setAttribute("href", url);
  elem.setAttribute("download", "export.xls"); // Choose the file name
  return false;
}
</script>
<script type="text/javascript">
function exportF2(elem) {
  var table = document.getElementById("dataTablenew");
  var html = table.outerHTML;
  var url = 'data:application/vnd.ms-excel,' + escape(html); // Set your html table into url 
  elem.setAttribute("href", url);
  elem.setAttribute("download", "export.xls"); // Choose the file name
  return false;
}
</script>


        </body>

        </html>
