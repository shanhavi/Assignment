 <?php

 $year=date("Y");
                       
 include '../connection.php';

 $sql1="SELECT * FROM cafetariaincome where cafidate between '".$year."-01-01' and '".$year."-01-31' ORDER BY CafeIncome_ID DESC";

$tot_Jan =0;
$query1=mysqli_query($con,$sql1);
while ($row1=mysqli_fetch_array($query1)) {
$tot_totaljan=$tot_Jan+$row1['Amount'];
}
?>
<!--------february 2020--->
 <?php
                         
 include '../connection.php';

 

 $sql34="SELECT * FROM cafetariaincome where cafidate between '2020-02-01' and '2020-02-29' ORDER BY CafeIncome_ID DESC";

$tot_feb =0;
$query34=mysqli_query($con,$sql34);
while ($row34=mysqli_fetch_array($query34)) {
$tot_totalfeb=$tot_feb+$row34['Amount'];
}
?>
<!--------march 2020--->
 <?php
                         
 include '../connection.php';

 $sql4="SELECT * FROM cafetariaincome where cafidate between '2020-03-01' and '2020-03-31' ORDER BY CafeIncome_ID DESC";

$tot_march =0;
$query4=mysqli_query($con,$sql4);
while ($row4=mysqli_fetch_array($query4)) {
$tot_totalmarch=$tot_march+$row4['Amount'];
}
?>
<!--------april 2020--->
 <?php
                         
 include '../connection.php';

 $sql5="SELECT * FROM cafetariaincome where cafidate between '2020-04-01' and '2020-04-30' ORDER BY CafeIncome_ID DESC";

$tot_april =0;
$query5=mysqli_query($con,$sql5);
while ($row5=mysqli_fetch_array($query5)) {
$tot_totalapril=$tot_april+$row5['Amount'];
}
?>
<!--------may 2020--->
 <?php
                         
 include '../connection.php';

 $sql6="SELECT * FROM cafetariaincome where cafidate between '2020-05-01' and '2020-05-31' ORDER BY CafeIncome_ID DESC";

$tot_may =0;
$query6=mysqli_query($con,$sql6);
while ($row6=mysqli_fetch_array($query6)) {
$tot_totalmay=$tot_may+$row6['Amount'];
}
?>
<!--------june 2020--->
 <?php
                         
 include '../connection.php';

 $sql7="SELECT * FROM cafetariaincome where cafidate between '2020-06-01' and '2020-06-30' ORDER BY CafeIncome_ID DESC";

$tot_june =0;
$query7=mysqli_query($con,$sql7);
while ($row7=mysqli_fetch_array($query7)) {
$tot_totaljune=$tot_june+$row7['Amount'];
}
?>
<!--------july 2020--->
 <?php
                         
 include '../connection.php';

 $sql8="SELECT * FROM cafetariaincome where cafidate between '2020-07-01' and '2020-07-31' ORDER BY CafeIncome_ID DESC";

$tot_july =0;
$query8=mysqli_query($con,$sql8);
while ($row8=mysqli_fetch_array($query8)) {
$tot_totaljuly=$tot_july+$row8['Amount'];
}
?>
<!--------august 2020--->
 <?php
                         
 include '../connection.php';

 $sql9="SELECT * FROM cafetariaincome where cafidate between '2020-08-01' and '2020-08-31' ORDER BY CafeIncome_ID DESC";

$tot_aug =0;
$query9=mysqli_query($con,$sql9);
while ($row9=mysqli_fetch_array($query9)) {
$tot_totalaug=$tot_aug+$row9['Amount'];
}
?>
<!--------september 2020--->
 <?php
                         
 include '../connection.php';

 $sql10="SELECT * FROM cafetariaincome where cafidate between '2020-09-01' and '2020-09-30' ORDER BY CafeIncome_ID DESC";

$tot_sep =0;
$query10=mysqli_query($con,$sql10);
while ($row10=mysqli_fetch_array($query10)) {
$tot_totalsep=$tot_sep+$row10['Amount'];
}
?>
<!--------octomer 2020--->
 <?php
                         
 include '../connection.php';

 $sql11="SELECT * FROM cafetariaincome where cafidate between '2020-10-01' and '2020-10-31' ORDER BY CafeIncome_ID DESC";

$tot_oct =0;
$query11=mysqli_query($con,$sql11);
while ($row11=mysqli_fetch_array($query11)) {
$tot_totaloct=$tot_oct+$row11['Amount'];
}
?>
<!--------november 2020--->
 <?php
                         
 include '../connection.php';

 $sql12="SELECT * FROM cafetariaincome where cafidate between '2020-11-01' and '2020-11-30' ORDER BY CafeIncome_ID DESC";

$tot_nov =0;
$query12=mysqli_query($con,$sql12);
while ($row12=mysqli_fetch_array($query12)) {
$tot_totalnov=$tot_nov+$row12['Amount'];
}
?>
<!--------december 2020--->
 <?php
                         
 include '../connection.php';

 $sql13="SELECT * FROM cafetariaincome where cafidate between '2020-12-01' and '2020-12-31' ORDER BY CafeIncome_ID DESC";

$tot_dec =0;
$query13=mysqli_query($con,$sql13);
while ($row13=mysqli_fetch_array($query13)) {
$tot_totaldec=$tot_dec+$row13['Amount'];
}
?>

<!-------/////////////////////////////////////////////////////////////-January 2021--->
 <?php
                         
 include '../connection.php';

 $sql14="SELECT * FROM cafetariaincome where cafidate between '2021-01-01' and '2021-01-31' ORDER BY CafeIncome_ID DESC";

$tot_Jan21 =0;
$query14=mysqli_query($con,$sql14);
while ($row14=mysqli_fetch_array($query14)) {
$tot_totaljan21=$tot_Jan21+$row14['Amount'];
}
?>
<!--------february 2021--->
 <?php
                         
 include '../connection.php';

 $sql15="SELECT * FROM cafetariaincome where cafidate between '2021-02-01' and '2021-02-28' ORDER BY CafeIncome_ID DESC";

$tot_feb21 =0;
$query15=mysqli_query($con,$sql15);
while ($row15=mysqli_fetch_array($query15)) {
$tot_totalfeb21=$tot_feb21+$row15['Amount'];
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
{y:<?php echo $tot_totaljan; ?>,label: "January" },
{ y:<?php echo $tot_totalfeb;?>,label: "feb" },
{ y:<?php echo $tot_totalmarch;?>,label: "march" },
{ y:<?php echo $tot_totalapril;?>,label: "april"},
{y:<?php echo $tot_totalmay;?>,label: "may"  },
{ y:<?php echo $tot_totaljune;?> ,label: "june"},
{y:<?php echo $tot_totaljuly;?>,label: "july" },
{ y:<?php echo $tot_totalaug;?>,label: "aug"},
{y:<?php echo $tot_totalsep;?>,label: "sep" },
{y:<?php echo $tot_totaloct ;?>, label: "oct"},
{y:<?php echo $tot_totalnov;?>,label: "nov"},
{y:<?php echo $tot_totaldec;?> ,label: "dec"},
{ y:<?php echo $tot_totaljan21;?> ,label: "Jan21"},
{ y:<?php echo $tot_totalfeb21;?>, label: "feb21"},



  
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
