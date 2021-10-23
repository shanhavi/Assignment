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
  $add=$_POST['add'];
  $adt=$_POST['adt'];
  $BatchID=$_POST['BatchID'];
  $SemeID=$_POST['SemeID'];
  $ModuleID=$_POST['ModuleID'];
  $ard=$_POST['ard'];
  $status=$_POST['status'];
   
    include '../../../connection.php';

    $sql="UPDATE assignment  SET assignment_deadline_date='$add',assignment_deadline_TIME='$adt',Batch_id='$BatchID',Semi_id_fk='$SemeID',mod_id_fk='$ModuleID',Ass_Res_Date='$ard',status='$status' WHERE A_ID='$id'";

 

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
              window.location.replace("../createAssignment.php");
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

