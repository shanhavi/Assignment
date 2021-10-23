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
  $sname=$_POST['sname'];
  $sadd=$_POST['sadd'];
  $snic=$_POST['snic'];
  $sdob=$_POST['sdob'];
  $snum=$_POST['snum'];
  $semail=$_POST['semail'];
  $suname=$_POST['suname'];
  $sststus=$_POST['sststus'];

  

  include '../../../connection.php';

  $sql="UPDATE student SET Stu_name='$sname',S_Add ='$sadd', nic='$snic',DoB='$sdob',St_number='$snum',S_Email='$semail',username='$suname', Status ='$sststus' WHERE Stu_id ='$id'";

  $query=mysqli_query($con,$sql);

  if ($query) {
    ?>
    
    <script>
      $.alert({
        title: 'Alert!',
        content: 'update successfully!!!!',
        type:'green',
      });

       function pageRedirect() {
            window.location.replace("../create_student.php");
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

