<?php ob_start(); ?>
<?php
session_start();
include "inc/dbconfig.php";
if(!isset($_SESSION['userSession'])){
  header("Location: login.php");
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Welcome To | ERP System</title>

    <?php include "inc/head.php"; ?>
</head>

<body class="theme-red">
    <?php include "inc/navbar.php"; ?>
    <section>
        <?php include "inc/sidebar.php"; ?>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
            </div>

            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">playlist_add_check</i>
                        </div>
                        <div class="content">
                            <div class="text">Totel Customer</div>
                            <?php 
                                $query = "SELECT  id FROM customer where active='1' ORDER BY id"; 
                                    $result = mysqli_query($con, $query); 
                                        $row = mysqli_num_rows($result); 
                                     ?>
                            <div class="number count-to" data-from="0" data-to="<?php echo $row; ?>" data-speed="15"
                                data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">help</i>
                        </div>
                        <div class="content">
                            <div class="text">Totel Item</div>
                            <?php 
                                $query = "SELECT  item_id FROM item where active='1' ORDER BY item_id"; 
                                    $result = mysqli_query($con, $query); 
                                        $row = mysqli_num_rows($result); 
                                     ?>
                            <div class="number count-to" data-from="0" data-to="<?php echo $row; ?>" data-speed="1000"
                                data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Widgets -->
        </div>
        </div>
    </section>

    <?php include "inc/bottom.php"; ?>
</body>

</html>
<?php ob_end_flush(); ?>