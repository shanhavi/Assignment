 
 <?php
                         
 if (isset($_GET['submitnew'])) 
  {
 $sdate=$_GET['startdate'];
 $cid=$_GET['CourseID'];
 
   include '../../connection.php';
 $sql15=" SELECT *  FROM studentattendance  WHERE At_Date='$sdate' and C_ID_fk='$cid'  ORDER BY At_id DESC";
$resultt = mysqli_query($con,$sql15);
$count = mysqli_num_rows($resultt);
}
?>


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


<script type="text/javascript">
window.onload = function () {

var chart = new CanvasJS.Chart("chartexpense", {
  theme: "light1", // "light2", "dark1", "dark2"
  animationEnabled: false, // change to true    
  title:{
    text: " Date Wise analysis"
  },
  data: [
  {
    // Change type to "bar", "area", "spline", "pie",etc.
    type: "column",
    dataPoints: 
    [ 
     { y:<?php echo $count;?>, label: "data"},
            
     ]
  }
  ]
});
chart.render();

}
</script>


   <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
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
                 
            <div class="card">
              <div class="card-body">
                <strong>Daily Analysis</strong>
                
          
            <br><br>

                <form method="GET">
                  <div class="row">

                    <div class="col-6">
                      <div class="form-group">
                      
                        <div class="form-group col-md-6">
                          <label for="inputEmail4"> Choose start Date</label>
                          <input type="date" class="form-control" name="startdate">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputPassword4">Choose course </label>
                          
                           <select
                                type="text" 
                                name="CourseID" 
                                class="form-control"
                                required="" 
                                >
                                 <?php
                                  include "../../connection.php";

                                  $query="SELECT * from course";
                                  $result=mysqli_query($con,$query);
                                  while ($row=mysqli_fetch_array($result)) {
                                    ?>
                                    <option value= <?php echo $row ["C_ID"]; ?> ><?php echo $row ["C_Name"];  ?></option>
                                    <?php 
                                   } 


                                   ?>
                                </select>
                        </div>
                          <input type="submit" name="submitnew" value="search" class="btn btn-danger mb-2"> 
                  
                      
                      </div>
                    </div>
                     </div>

                  </div>
                </form>

               <div id="chartexpense" ></div>
        </div>
            </div>


 

         
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
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
   




    <!-- End custom js for this page -->
  </body>
</html>
