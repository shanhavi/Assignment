 
 <?php
                         
 include '../connection.php';

 if ($_GET['year']) {
   $year=$_GET['year'];
 }
 else{
  $year=date('Y');
 }

 $sql15=" 
 SELECT DATE_FORMAT(`cafidate`, '%Y') as 'year',
 DATE_FORMAT(`cafidate`, '%m') as 'month',
 SUM(`Amount`) as 'total'
 FROM cafetariaincome
 WHERE DATE_FORMAT(`cafidate`, '%Y')='$year'
 GROUP BY DATE_FORMAT(`cafidate`, '%Y%m')
 ";

$query15=mysqli_query($con,$sql15);
while ($row15=mysqli_fetch_array($query15)) {

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

var chart = new CanvasJS.Chart("chartincome", {
  theme: "light1", // "light2", "dark1", "dark2"
  animationEnabled: false, // change to true    
  title:{
    text: "Income Chart"
  },
  data: [
  {
    // Change type to "bar", "area", "spline", "pie",etc.
    type: "spline",
    dataPoints: 
    [ 
      <?php

        $query15=mysqli_query($con,$sql15);
        while ($row15=mysqli_fetch_array($query15)) {
            ?>
              { y:<?php echo $row15['total'];?>, label: "<?php echo $row15['month'] ?>"},
            <?php
        }

      ?>





  
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
      <?php include '../layout/navbar.php'  ?>      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <?php include '../layout/sidebar.php' ; ?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
                 
            
            <div class="jumbotron">
            <div class="row w-100">
                    <div class="col-md-3">
                        <div class="card border-info mx-sm-1 p-3">
                            <div class="card border-info shadow text-info p-3 my-card" ></div>
                            <div class="text-info text-center mt-3"><h4>Total Month Income</h4></div>
                          <?php
                         

                     include '../connection.php';

                     $sql="SELECT * FROM cafetariaincome where MONTH(cafidate) = MONTH(NOW()) ORDER BY CafeIncome_ID DESC";

                     $tot_total_CafetariaIncome =0;
                     $query=mysqli_query($con,$sql);

                      while ($row=mysqli_fetch_array($query)) {

                      $tot_total_CafetariaIncome=$tot_total_CafetariaIncome+$row['Amount'];
                       }

                      ?>

                            <div class="text-info text-center mt-2"><h1>Rs.<?php echo $tot_total_CafetariaIncome; ?></h1></div>
                           
                          </div>
                
                    </div>
                       <div class="col-md-3">
                        <div class="card border-success mx-sm-1 p-3">
                            <div class="card border-success shadow text-success p-3 my-card"></div>
                            <div class="text-info text-center mt-3"><h4>Total Month expenses</h4></div>
                            <?php
                         

                     include '../connection.php';

                      
                   $sql="SELECT * FROM cafetaria_expenses where MONTH(edate) = MONTH(NOW()) ORDER BY CE_id DESC";

                     $tot_total_cafetaria_expenses=0;
                     $query=mysqli_query($con,$sql);

                      while ($row=mysqli_fetch_array($query)) {

                      $tot_total_cafetaria_expenses=$tot_total_cafetaria_expenses+$row['Expance_Amount']; }

                      ?>

                            <div class="text-info text-center mt-2"><h1>Rs.<?php echo $tot_total_cafetaria_expenses; ?></h1></div>
                    </div>
                  </div>

                 
            </div>
            <br>

                <form method="GET">
                  <div class="row">

                    <div class="col-6">
                      <div class="form-group">
                        <select class="form-control" name="year" >
                          <option class="2020">2020</option>
                          <option class="2021">2021</option>
                        </select>
                      </div>
                    </div>

                    <div class="col-6">
                      <input type="submit" name="send" value="filter" class="btn btn-primary">
                    </div>

                  </div>
                </form>

               <div id="chartincome" ></div>
        


 

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
    <?php include '../layout/script.php' ?>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   




    <!-- End custom js for this page -->
  </body>
</html>
