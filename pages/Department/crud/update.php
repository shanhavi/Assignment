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
    $dtype=$_POST['dtype'];
    $Employeefk=$_POST['Employeefk'];
   
    include '../../../connection.php';

    $sql="UPDATE deparrtment SET Dep_name='$dtype', emp_id_fk='$Employeefk' WHERE Dep_id= '$id'";

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
              window.location.replace("../createDepartment.php");
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

