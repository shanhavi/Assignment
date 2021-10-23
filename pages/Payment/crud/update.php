<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include '../../../layout/head.php'  ?>
    
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
            <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        
        <!-- partial -->
       
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <?php include '../../../layout/script.php' ?>


    <!-- delete code -->
    <?php
    $id=$_POST['id'];
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
   
    include '../../../connection.php';

    $sql="UPDATE `fee` SET Py_total='$fees',course_id_fk='$coursee',Py_advance='$advancefees',balancepay='$sbalance',Py_Date='$pdate',Pay_Type='$PaymentTypeID',Stu_ID_fk='$StudentID',B_id_fk= '$batch' WHERE Fee_ID='$id' ";



    $query=mysqli_query($con,$sql);
    
    if ($query) {
      ?>

        <script>
        $.alert({
          title: 'Alert!',
          content: 'Update successfully!!!!',
          type:'green',
        });

         function pageRedirect() {
              window.location.replace("../createPayment.php");
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

    ?>
<!-- end delete -->
    <!-- End custom js for this page -->
  </body>
</html>

