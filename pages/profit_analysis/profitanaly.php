
 <!-- insti payment --> 
 <?php
                         
 include '../../connection.php';

 if ($_GET['year']) {
   $year=$_GET['year'];
 }
 else{
  $year=date('Y');
 }

 $sql6=" 
 SELECT DATE_FORMAT(`Py_Date`, '%Y') as 'year',
 DATE_FORMAT(`Py_Date`, '%m') as 'month',
 SUM(`Py_advance`) as 'total'
 FROM fee
 WHERE DATE_FORMAT(`Py_Date`, '%Y')='$year'
 GROUP BY DATE_FORMAT(`Py_Date`, '%Y%m')
 ";

$query6=mysqli_query($con,$sql6);
while ($row6=mysqli_fetch_array($query6)) {

}
?>

 <!-- insti due payment  --> 
 <?php
                         
 include '../../connection.php';

 if ($_GET['year']) {
   $year2=$_GET['year'];
 }
 else{
  $year2=date('Y');
 }

 $sql4=" 
 SELECT DATE_FORMAT(`datep`, '%Y') as 'year',
 DATE_FORMAT(`datep`, '%m') as 'month',
 SUM(`p_amount`) as 'total2'
 FROM duepayment
 WHERE DATE_FORMAT(`datep`, '%Y')='$year2'
 GROUP BY DATE_FORMAT(`datep`, '%Y%m')
 ";

$query4=mysqli_query($con,$sql4);
while ($row4=mysqli_fetch_array($query4)) {

}
?>

 <!-- insti  expense --> 
 <?php
                         
 include '../../connection.php';

 if ($_GET['year']) {
   $year3=$_GET['year'];
 }
 else{
  $year3=date('Y');
 }

 $sql3=" 
 SELECT DATE_FORMAT(`exedate`, '%Y') as 'year',
 DATE_FORMAT(`exedate`, '%m') as 'month',
 SUM(`Expance_Amount`) as 'total3'
 FROM institude_expenses
 WHERE DATE_FORMAT(`exedate`, '%Y')='$year3'
 GROUP BY DATE_FORMAT(`exedate`, '%Y%m')
 ";

$query3=mysqli_query($con,$sql3);
while ($row3=mysqli_fetch_array($query3)) {

}
?>

<?php
      //cafe expenses                    
 include '../../connection.php';

 if ($_GET['year']) {
   $year15=$_GET['year'];
 }
 else{
  $year15=date('Y');
 }

 $sql15=" 
 SELECT DATE_FORMAT(`edate`, '%Y') as 'year',
 DATE_FORMAT(`edate`, '%m') as 'month',
 SUM(`Expance_Amount`) as 'total15'
 FROM cafetaria_expenses
 WHERE DATE_FORMAT(`edate`, '%Y')='$year15'
 GROUP BY DATE_FORMAT(`edate`, '%Y%m')
 ";

$query15=mysqli_query($con,$sql15);
while ($row15=mysqli_fetch_array($query15)) {

}
?>


 <?php
      //cafe income                    
 include '../../connection.php';

 if ($_GET['year']) {
   $year8=$_GET['year'];
 }
 else{
  $year8=date('Y');
 }

 $sql8=" 
 SELECT DATE_FORMAT(`cafidate`, '%Y') as 'year',
 DATE_FORMAT(`cafidate`, '%m') as 'month',
 SUM(`Amount`) as 'total8'
 FROM cafetariaincome
 WHERE DATE_FORMAT(`cafidate`, '%Y')='$year8'
 GROUP BY DATE_FORMAT(`cafidate`, '%Y%m')
 ";

$query8=mysqli_query($con,$sql8);
while ($row8=mysqli_fetch_array($query8)) {

}
?>

 <?php
                         
 include '../../connection.php';

 if ($_GET['year']) {
   $year22=$_GET['year'];
 }
 else{
  $year22=date('Y');
 }

 $sql22=" 
 SELECT DATE_FORMAT(`Sal_date`, '%Y') as 'year',
 DATE_FORMAT(`Sal_date`, '%m') as 'month',
 SUM(`Amount`) as 'total22'
 FROM salary
 WHERE DATE_FORMAT(`Sal_date`, '%Y')='$year22'
 GROUP BY DATE_FORMAT(`Sal_date`, '%Y%m')
 ";

$query22=mysqli_query($con,$sql22);
while ($row22=mysqli_fetch_array($query22)) {

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
<script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
  theme:"light2",
  animationEnabled: true,
  title:{
    text: "Profit analysis graph "
  },
  axisY :{
    title: "Amount",
    suffix: "Rs"
  },
  toolTip: {
    shared: "true"
  },
  legend:{
    cursor:"pointer",
    itemclick : toggleDataSeries
  },
  data: [

  {
    type: "spline",
        visible: false,
    showInLegend: true,
    yValueFormatString: "##.Rs",
    name: "due payment",
    dataPoints: [
   <?php

        $query4=mysqli_query($con,$sql4);
        while ($row4=mysqli_fetch_array($query4)) {
            ?>
              { y:<?php echo $row4['total2'];?>, label: "<?php echo $row4['month'] ?>"},
            <?php
        }

      ?>

    ]
  },
  {
    type: "spline", 
    showInLegend: true,
    yValueFormatString: "##.Rs",
    name: "initial payment ",
    dataPoints: [
 <?php

        $query6=mysqli_query($con,$sql6);
        while ($row6=mysqli_fetch_array($query6)) {
            ?>
              { y:<?php echo $row6['total'];?>, label: "<?php echo $row6['month'] ?>"},
            <?php
        }

      ?>

    ]
  },
   {
    type: "spline", 
    showInLegend: true,
    yValueFormatString: "##.Rs",
    name: "cafetaria income ",
    dataPoints: [
 <?php

        $query8=mysqli_query($con,$sql8);
        while ($row8=mysqli_fetch_array($query8)) {
            ?>
              { y:<?php echo $row8['total8'];?>, label: "<?php echo $row8['month'] ?>"},
            <?php
        }

      ?>

    ]
  }, {
    type: "spline", 
    showInLegend: true,
    yValueFormatString: "##.Rs",
    name: "cafetaria expenses ",
    dataPoints: [
 <?php

        $query15=mysqli_query($con,$sql15);
        while ($row15=mysqli_fetch_array($query15)) {
            ?>
              { y:<?php echo $row15['total15'];?>, label: "<?php echo $row15['month'] ?>"},
            <?php
        }

      ?>

    ]
  },
  {
    type: "spline", 
    showInLegend: true,
    yValueFormatString: "##.Rs",
    name: "employee salary expenses ",
    dataPoints: [
 <?php

        $query22=mysqli_query($con,$sql22);
        while ($row22=mysqli_fetch_array($query22)) {
            ?>
              { y:<?php echo $row22['total22'];?>, label: "<?php echo $row22['month'] ?>"},
            <?php
        }

      ?>

    ]
  },

 
     {
    type: "spline", 
    showInLegend: true,
    yValueFormatString: "##.Rs",
    name: "institute expenses",
    dataPoints: [
      <?php

        $query3=mysqli_query($con,$sql3);
        while ($row3=mysqli_fetch_array($query3)) {
            ?>
              { y:<?php echo $row3['total3'];?>, label: "<?php echo $row3['month'] ?>"},
            <?php
        }

      ?>

    ]
  }]
});
chart.render();

function toggleDataSeries(e) {
  if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible ){
    e.dataSeries.visible = false;
  } else {
    e.dataSeries.visible = true;
  }
  chart.render();
}

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
                 
            
            <div class="jumbotron">
            <div class="row w-100">
                    <div class="col-md-3">
                        <div class="card border-info mx-sm-1 p-3">
                            <div class="card border-info shadow text-info p-3 my-card" ></div>
                            <div class="text-info text-center mt-3"><h4>Total Month Income</h4></div>
                          <?php
                         

                     include '../../connection.php';

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
                         

                     include '../../connection.php';

                      
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

               <div id="chartContainer" ></div>
        


 

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
