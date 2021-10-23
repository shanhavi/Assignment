
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
            
            <div class="jumbotron">
              <div class="card">
                <div class="card-body">
                  <strong>Email To Lecturer</strong>
                  <br><br>
                  <div class="form-group">
                    <input id="email" type="email" class="form-control" placeholder="yourfreind@something.somthing"></input>
                  </div>
                  <div class="form-group">
                    <input id="subject" class="form-control"  placeholder="Subject"></input><br>
                  </div>
                     <div class="form-group">
                      <textarea id="message" class="form-control" placeholder="Message"></textarea><br>

                  </div>
                   
                  
                   <button id="send" onclick="send()"><img src=https://www.dropbox.com/s/chxcszvnrdjh1zm/send.png?dl=1 width=30px height=30px></img></button>

                  
                 

                
 
 
        </div>

          </div>
        </div>
         

     
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
  <script type="text/javascript" src="directtomx.js" ></script>
  <script language="javascript">
  function send() {
  setTimeout(function() {
    window.open("mailto:" + document.getElementById('email').value + "?subject=" + document.getElementById('subject').value + "&body=" + document.getElementById('message').value);
  }, 320);
}
</script>

        </body>

        </html>
