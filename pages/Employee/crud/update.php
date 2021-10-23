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
  $name=$_POST['name'];
  $eaddress=$_POST['eaddress'];
  $nic=$_POST['nic'];
  $dob=$_POST['dob'];
  $email=$_POST['email'];
  $username=$_POST['username'];
  $pass=$_POST['pass'];
  $adate=$_POST['adate'];
  $gender=$_POST['gender'];
  $employeeID=$_POST['employeeID'];
  $status=$_POST['status'];

   
    include '../../../connection.php';

    $sql="UPDATE employee SET Emp_name='$name',emp_Add='$eaddress',nic='$nic',DoB='$dob',E_Email='$email',username='$username',password='$pass',postingdate='$adate',gender='$gender',Emp_type='$employeeID',Status='$status' WHERE Emp_id='$id'";

   

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
              window.location.replace("../createEmployee.php");
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

