<?php
    ob_start();
    session_start();
    include "inc/dbconfig.php";
    include "inc/functions.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Blank Page | Bootstrap Based Admin Template - Material Design</title>
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
                    <h2>BLANK PAGE</h2>
                </div>
            </div>
        </section>

        <?php include "inc/bottom.php"; ?>
    </body>

</html>
<?php ob_end_flush(); ?>