

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
          <!-- Content Header (Page header) -->
          
          <!-- /.content-header -->
          <div class="row">
            <div class="col-12">

             <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">View Payout</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table id="tblCustomers" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                          <th>Pay Total</th>
                           <th>Course ID</th>
                          <th>Advance Payment</th>
                          <th>Balance Payment</th>
                          <th>Payment Date</th>
                           <th>Payment Type</th>
                           <th>Student ID</th>
                           <th>Action</th>
                          
                        </tr>
                        </thead>
                        <tbody>
                           <?php

                             include '../../connection.php';

                             $sql="SELECT * FROM fee f INNER JOIN paymenttype pt on f.Pay_Type=pt.Pay_type_id INNER JOIN student s ON f.Stu_ID_fk=s.Stu_id INNER JOIN course c ON f.course_id_fk=c.C_ID  ORDER BY Fee_ID DESC";


                             $query=mysqli_query($con,$sql);

                             while ($row=mysqli_fetch_array($query)) {
                                 
                               ?>

                                 <tr>

                                   <td><?php echo $row['Py_total']; ?></td>
                                   <td><?php echo $row['C_Name']; ?></td>
                                   <td>

                                    <?php echo $row['Py_advance']; ?>
                                      
                                    </td>
                                   <td><?php echo $row['balancepay']; ?></td>
                                   <td><?php echo $row['Py_Date']; ?></td>

                                   <td><?php echo $row['Pay_type']; ?></td>
                                   <td><?php echo $row['Stu_name']; ?></td>
                                                                  
                                    <td>
                                        
                                           
                                           <a href="print.php?id=<?php echo $row['Fee_ID']; ?>" class="btn btn-default">   <i class="fas fa-eye"></i> </a>
                                      </td>
                                     
                                


                                 </tr>

                                  <?php
                             }



                         ?>   
                          
                          
                        
                        </tbody>
                      
                      </table>
                      <br>

                         <br><br>
                      
                      <a id="downloadLink" onclick="exportF(this)" class="btn btn-success"><i class="far fa-file-excel"></i></a>


                  <!--  <button> <a id="downloadLink" onclick="exportF(this)">Export to excel</a></button> -->
                      <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>


                    </div>
                    <!-- /.card-body -->
                  </div>
            <!-- left column -->
                
                </div>
        </div>
          <!-- /.content -->
       
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
<!-- End custom js for this page -->
</body>
</html>
<!-- insert code -->
