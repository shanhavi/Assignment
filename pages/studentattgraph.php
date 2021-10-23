<?php 
//current day display 
// cuurent time display
if (isset($_POST['submit'])){
$coursename=$_POST['coursename'];

include "../connection.php";
$query="select * from studentattendance where C_ID_fk='$coursename' and DATE(At_Date)=CURDATE()";
$result = mysqli_query($con,$query);
$count3 = mysqli_num_rows($result);
}

?> 


<?php 
//current day display 
// cuurent time display
if (isset($_POST['submit'])){
$course=$_POST['coursenamenew'];

include "../connection.php";
$query2="select * from studentattendance where C_ID_fk='$course' and DATE(At_Date)=CURDATE()";
$resultt = mysqli_query($con,$query2);
$count = mysqli_num_rows($resultt);
}
?>

<?php 
//current day display 
// cuurent time display
if (isset($_POST['submit'])){
$coursee=$_POST['course'];

include "../connection.php";
$query3="select * from studentattendance where C_ID_fk='$coursee' and DATE(At_Date)=CURDATE()";
$resulttt = mysqli_query($con,$query3);
$countt = mysqli_num_rows($resulttt);
}
?>


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
    <script type="text/javascript">
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
  theme: "light1", // "light2", "dark1", "dark2"
  animationEnabled: false, // change to true    
  title:{
    text: "Attendance Chart"
  },
  data: [
  {
    // Change type to "bar", "area", "spline", "pie",etc.
    type: "column",
    dataPoints: [
      { label: <?php echo "$coursename" ?>,  y: <?php echo "$count3" ?>  },
       { label: <?php echo "$course" ?>,  y:  <?php echo "$count" ?> },
       { label:<?php echo "$coursee" ?>,  y:  <?php echo "$countt" ?>  }
     ]
  }
  ]
});
chart.render();

}
</script>

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
           
-
            <div class="row">
              
              
                <div class="card" >
                  <div class="card-body" >
                              
                     <h4 class="card-title">Course wise attendance</h4>
                     <form method="POST">
                   
                       <div class="form-group">
                         <label for="exampleInputEmail1">Course ID -1</label>
                         <select type="text" 
                         class="form-control" 
                         id="exampleInputEmail1" 
                         name="coursename"
                         required="" 
                         >
                           <?php
                           include "../connection.php";
                           $query ="SELECT * FROM course";
                           $result = mysqli_query($con,$query);

                           while ($row = mysqli_fetch_array($result))
                           {
                             ?>
                             <option value=<?php echo $row["C_ID"]?>> <?php echo $row["C_Name"]?></option>
                             <?php
                           }
                           ?>

                         </select> 
                         
                       </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Course ID -2</label>
                        <select type="text" 
                        class="form-control" 
                        id="exampleInputEmail1" 
                        name="coursenamenew"
                        required="" 
                        >
                          <?php
                          include "../connection.php";
                          $query ="SELECT * FROM course";
                          $result = mysqli_query($con,$query);

                          while ($row = mysqli_fetch_array($result))
                          {
                            ?>
                            <option value=<?php echo $row["C_ID"]?>> <?php echo $row["C_Name"]?></option>
                            <?php
                          }
                          ?>

                        </select> 
                        
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Course ID -3</label>
                        <select type="text" 
                        class="form-control" 
                        id="exampleInputEmail1" 
                        name="course"
                        required="" 
                        >
                         <?php
                         include "../connection.php";
                         $query ="SELECT * FROM course";
                         $result = mysqli_query($con,$query);

                         while ($row = mysqli_fetch_array($result))
                         {
                           ?>
                           <option value=<?php echo $row["C_ID"]?>> <?php echo $row["C_Name"]?></option>
                           <?php
                         }
                         ?>

                        </select> 
                        
                      </div>
                       
                       <input type="submit" name="submit" value="search" class="btn btn-danger mb-2"> 
                     
              </form>
           
                      
              
                   
                </div>
          </div>
  <div id="chartContainer" style="height: 370px; width: 100%;"></div>


    



         
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


        </body>

        </html>
