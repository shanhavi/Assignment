
       <?php

       if (isset($_POST['submit'])) 
       {

         $expensedate1=$_POST['sdate'];
         $enddate1=$_POST['edate'];

         include '../../connection.php';

         $sql="SELECT * FROM cafetaria_expenses where edate BETWEEN '$expensedate1'AND '$enddate1'  ORDER BY CE_id DESC";

         $tot_cex=0;
         $query=mysqli_query($con,$sql);

         while ($row=mysqli_fetch_array($query)) {

          $tot_total_cex=$tot_cex+$row['Expance_Amount'];
        }
      }
          ?>


          <?php

          if (isset($_POST['submit'])) 
          {

           $expensedate2=$_POST['sdatei'];
           $enddate2=$_POST['edatei'];

           include '../../connection.php';

           $sql2="SELECT * FROM cafetariaincome where cafidate BETWEEN '$expensedate2'AND '$enddate2'  ORDER BY CafeIncome_ID DESC";

           $tot_total_cafetaria=0;
           $query2=mysqli_query($con,$sql2);

           while ($row2=mysqli_fetch_array($query2)) {

            $tot_total_cafetaria_income=$tot_total_cafetaria+$row2['Amount'];
          }
        }
            ?>

            <?php

            if (isset($_POST['submit'])) 
            {

             $expensedate3=$_POST['sdatedpay'];
             $enddate3=$_POST['edatedpay'];

             include '../../connection.php';

             $sql3="SELECT * FROM duepayment where datep BETWEEN '$expensedate3'AND '$enddate3'  ORDER BY dp_id DESC";

             $tot_total_cafe=0;
             $query3=mysqli_query($con,$sql3);

             while ($row3=mysqli_fetch_array($query3)) {

              $tot_total_in_income=$tot_total_cafe+$row3['p_amount'];
            }
          }
              ?>
              <?php

              if (isset($_POST['submit'])) 
              {

               $expensedate4=$_POST['sdatepay'];
               $enddate4=$_POST['edatepay'];

               include '../../connection.php';

               $sql4="SELECT * FROM fee where Py_Date BETWEEN '$expensedate4'AND '$enddate4'  ORDER BY Fee_ID DESC";

               $tot_total_expenses=0;
               $query4=mysqli_query($con,$sql4);

               while ($row4=mysqli_fetch_array($query4)) {

                $tot_total_in_pay=$tot_total_expenses+$row4['Py_advance'];
              }
            }
                ?>


              <?php

              if (isset($_POST['submit'])) 
              {

               $expensedate5=$_POST['sdateie'];
               $enddate5=$_POST['edateie'];

               include '../../connection.php';

               $sql5="SELECT * FROM institude_expenses where exedate BETWEEN '$expensedate5'AND '$enddate5'  ORDER BY IE_id DESC";

               $tot_expenses=0;
               $query5=mysqli_query($con,$sql5);

               while ($row5=mysqli_fetch_array($query5)) {

                $tot_total_in_expenses=$tot_expenses+$row5['Expance_Amount'];
              }
            }
                ?>


                <!-- End custom js for this page -->
      <script type="text/javascript">
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
  theme: "light1", // "light2", "dark1", "dark2"
  animationEnabled: false, // change to true    
  title:{
    text: "summary Chart"
  },
  data: [
  {
    type: "column",
      dataPoints: 
      [    
      {label: "cafe-expense" ,y:<?php echo  $tot_total_cex; ?> },
      {label: "cafe-income"  ,y:<?php echo  $tot_total_cafetaria_income; ?> },
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
                     <strong>Income And Expenses Summary</strong>
                     <br><br>
                      <form method="POST" action="">
                    
                       <div class="form-row">
                         <div class="form-group col-md-6">
                           <label for="inputEmail4"> Cafe expenses date range</label>
                           <input type="date" class="form-control" name="sdate">
                         </div>
                         <div class="form-group col-md-6">
                           <label for="inputPassword4">To</label>
                           <input type="date" class="form-control" name="edate">
                         </div>

                         <div class="form-group col-md-6">
                           <label for="inputEmail4"> Cafe income date range</label>
                           <input type="date" class="form-control" name="sdatei">
                         </div>

                         <div class="form-group col-md-6">
                           <label for="inputPassword4">To</label>
                           <input type="date" class="form-control" name="edatei">
                         </div>

                         <div class="form-group col-md-6">
                           <label for="inputEmail4"> institute expenses date range</label>
                           <input type="date" class="form-control" name="sdateie">
                         </div>

                         <div class="form-group col-md-6">
                           <label for="inputPassword4">To</label>
                           <input type="date" class="form-control" name="edateie">
                         </div>

                         <div class="form-group col-md-6">
                           <label for="inputEmail4">insti payment date range</label>
                           <input type="date" class="form-control" name="sdatepay">
                         </div>

                         <div class="form-group col-md-6">
                           <label for="inputPassword4">To</label>
                           <input type="date" class="form-control" name="edatepay">
                         </div>

                         <div class="form-group col-md-6">
                           <label for="inputEmail4">institute duepayment date range</label>
                           <input type="date" class="form-control" name="sdatedpay">
                         </div>

                         <div class="form-group col-md-6">
                           <label for="inputPassword4">To</label>
                           <input type="date" class="form-control" name="edatedpay">
                         </div>
                       </div>
                                            
                       <input type="submit" name="submit" value="search" class="btn btn-primary mb-2"> 
                        </form>
                     </div>
                   </div>


                    <!-- <form method="POST">
                   cafe expenses date range <input type="date" name="sdate"> to <input type="date" name="edate"><br>
                   cafe income date range <input type="date" name="sdatei"> to <input type="date" name="edatei"><br>
                   institute expenses date range <input type="date" name="sdateie"> to <input type="date" name="edateie"><br>
                   insti payment date range <input type="date" name="sdatepay"> to <input type="date" name="edatepay"><br>
                   institute duepayment date range <input type="date" name="sdatedpay"> to <input type="date" name="edatedpay"><br>
                    <input type="submit" name="submit" class="btn-primary">
                    </form> -->
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
       <?php include '../../layout/script.php' ?>
       <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
       <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
       <script type="text/javascript" src="js/jquery.min.js"></script>
       <script type="text/javascript" src="js/Chart.min.js"></script>




              </div>


              
            </body>
            </html>