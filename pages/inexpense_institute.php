
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

     
                  <h5>Income And Expenses Summary</h5>
                        Choose date range <input type="date" name="sdate"> to <input type="date" name="edate">
                        <input type="submit" name="submit">
                         <div id="chartContainer"></div>
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
     <script type="text/javascript" src="js/jquery.min.js"></script>
     <script type="text/javascript" src="js/Chart.min.js"></script>



     <?php

     if (isset($_POST['submit'])) 
     {

       $expensedate=$_POST['sdate'];
       $enddate=$_POST['edate'];

       include '../connection.php';

       $sql="SELECT * FROM cafetaria_expenses where edate BETWEEN '$expensedate'AND '$enddate'  ORDER BY CE_id DESC";

       $tot_total_cafetaria_expenses=0;
       $query=mysqli_query($con,$sql);

       while ($row=mysqli_fetch_array($query)) {

        $tot_total_cafetaria_expenses=$tot_total_cafetaria_expenses+$row['Expance_Amount'];
        ?>


        <?php

        if (isset($_POST['submit'])) 
        {

         $expensedate=$_POST['sdate'];
         $enddate=$_POST['edate'];

         include '../connection.php';

         $sql2="SELECT * FROM cafetariaincome where cafidate BETWEEN '$expensedate'AND '$enddate'  ORDER BY CafeIncome_ID DESC";

         $tot_total_cafetaria=0;
         $query2=mysqli_query($con,$sql2);

         while ($row2=mysqli_fetch_array($query2)) {

          $tot_total_cafetaria_income=$tot_total_cafetaria+$row2['Amount'];
          ?>

          <?php

          if (isset($_POST['submit'])) 
          {

           $expensedate=$_POST['sdate'];
           $enddate=$_POST['edate'];

           include '../connection.php';

           $sql3="SELECT * FROM duepayment where datep BETWEEN '$expensedate'AND '$enddate'  ORDER BY dp_id DESC";

           $tot_total_cafe=0;
           $query3=mysqli_query($con,$sql3);

           while ($row3=mysqli_fetch_array($query3)) {

            $tot_total_in_income=$tot_total_cafe+$row3['p_amount'];
            ?>
            <?php

            if (isset($_POST['submit'])) 
            {

             $expensedate=$_POST['sdate'];
             $enddate=$_POST['edate'];

             include '../connection.php';

             $sql4="SELECT * FROM fee where Py_Date BETWEEN '$expensedate'AND '$enddate'  ORDER BY Fee_ID DESC";

             $tot_total_expenses=0;
             $query4=mysqli_query($con,$sql4);

             while ($row4=mysqli_fetch_array($query4)) {

              $tot_total_in_pay=$tot_total_expenses+$row['Py_advance'];
              ?>


            <?php

            if (isset($_POST['submit'])) 
            {

             $expensedate=$_POST['sdate'];
             $enddate=$_POST['edate'];

             include '../connection.php';

             $sql5="SELECT * FROM institude_expenses where exedate BETWEEN '$expensedate'AND '$enddate'  ORDER BY IE_id DESC";

             $tot_expenses=0;
             $query4=mysqli_query($con,$sql5);

             while ($row5=mysqli_fetch_array($query5)) {

              $tot_total_in_expenses=$tot_expenses+$row5['exedate'];
              ?>

              <!-- End custom js for this page -->
    <script>
                window.onload = function () {

                  var chart = new CanvasJS.Chart("chartContainer", {
  theme: "light1", // "light2", "dark1", "dark2"
  animationEnabled: false, // change to true    
  title:{
    text: "income-expense-summary-chart"
  },
  data: [
  {
    // Change type to "bar", "area", "spline", "pie",etc.
    type: "area",
    dataPoints: 
    [    
    {label: "cafe-expense" ,y:<?php echo  $tot_total_cafetaria_expenses; ?> },
    {label: "cafe-income" ,y:<?php echo  $tot_total_cafetaria_income; ?> },
    {label: "inst-expense" ,y:<?php echo $tot_total_in_expenses; ?> },
    {label: "inst-duepayment-income" ,y:<?php echo $tot_total_in_income; ?> },
    {label: "inst-payment-income" ,y:<?php echo  $tot_total_in_pay; ?> },



    ]
  }
  ]
});
                  chart.render();

                }
              </script>


            </div>


            
          </body>
          </html>