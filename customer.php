<?php
ob_start();
session_start();
include "inc/dbconfig.php";
include "inc/functions.php";
?>
<!DOCTYPE html>
<html>

<head>
    <title>Welcome to ERP system</title>

    <?php include "inc/head.php"; ?>
    <link href="plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

</head>

<body class="theme-red">
    <?php include "inc/navbar.php"; ?>
    <section>
        <?php include "inc/sidebar.php"; ?>
    </section>

    <section class="content">
        <?php
        if (isset($_GET['success'])) {
        ?>
        <div class="alert alert-success" role="alert">
            The Student Added Successfully!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">×</span></button>
        </div>
        <?php
        }
        if (isset($_GET['fail'])) {
        ?>
        <div class="alert alert-warning" role="alert">
            Sorry, The Student NOT Added!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">×</span></button>
        </div>
        <?php
        }
        ?>
        <?php
        if (isset($_GET['success1'])) {
        ?>
        <div class="alert alert-success" role="alert">
            The Customer updated Successfully!!!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">×</span></button>
        </div>
        <?php
        }
        if (isset($_GET['fail1'])) {
        ?>
        <div class="alert alert-warning" role="alert">
            Sorry, The Customer NOT updated!!!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">×</span></button>
        </div>
        <?php
        }
        ?>

        <div class="container-fluid">
            <?php
                if(isset($_GET['create'])){
                    ?>
            <div class="block-header">
                <!-- Input Group -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>
                                    Customer Register
                                </h2>
                                <a href="customer.php"> <button type="button" name="view" class="btn btn-success"
                                        style="float: right;" value="SUBMIT">Manage Student</button></a><br>

                            </div>
                            <?php
                            if (isset($_GET['edit']) && $_GET['edit'] != "") {
                                $customer_id = $_GET['edit'];
                                $sqlget = "SELECT * FROM customer WHERE id='$customer_id'";
                                $exeget = mysqli_query($con, $sqlget);
                                $rowget = mysqli_fetch_array($exeget);
                            }
                            ?>
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="body">
                                    <!-- <h2 class="card-inside-title">With Icon</h2> -->
                                    <div class="row clearfix">
                                        <div class="col-md-6">
                                            <select name="title" class="form-control " required>
                                                <option value="Mr"
                                                    <?php if (isset($_GET['edit']) && $rowget['title'] == 'Mr') {echo 'selected';} ?>>
                                                    Mr</option>
                                                <option value="Mrs"
                                                    <?php if (isset($_GET['edit']) && $rowget['title'] == 'Mrs') {echo 'selected';} ?>>
                                                    Mrs</option>
                                                <option value="Miss"
                                                    <?php if (isset($_GET['edit']) && $rowget['title'] == 'Miss') {echo 'selected';} ?>>
                                                    Miss</option>
                                                <option value="Dr"
                                                    <?php if (isset($_GET['edit']) && $rowget['title'] == 'Dr') {echo 'selected';} ?>>
                                                    Dr</option>

                                            </select>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <div class="form-line">
                                                        <input type="text" name="fname" class="form-control date"
                                                            placeholder="First Name" required
                                                            value="<?php if (isset($_GET['edit']) && $_GET['edit'] != "") {echo $rowget['first_name'];}  ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <div class="form-line">
                                                    <input type="text" name="lname" class="form-control date"
                                                        placeholder="Last Name" required
                                                        value="<?php if (isset($_GET['edit']) && $_GET['edit'] != "") {echo $rowget['last_name'];}  ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <div class="form-line">
                                                    <input type="text" name="phone" class="form-control date"
                                                        placeholder="Contact Number" required
                                                        value="<?php if (isset($_GET['edit']) && $_GET['edit'] != "") {echo $rowget['contact_no'];}  ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-md-12">
                                            <select name="district" class="form-control " required>
                                                <option>Select District</option>
                                                <?php
                                                $query1 = "SELECT * FROM district WHERE active='yes'";
                                                $result1 = mysqli_query($con, $query1);
                                                while ($row1 = mysqli_fetch_array($result1)) {
                                                ?>
                                                <option value=<?php echo $row1["id"] ?> <?php if (isset($_GET['edit']) && $_GET['edit'] != "" 
                                                    && $rowget['id'] ==$row1['id']) { echo "selected";}  ?>>
                                                    <?php echo $row1["district"] ?>
                                                </option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <?php
                                    if (isset($_GET['edit'])) {
                                    ?>
                                    <input type="submit" name="update" value="UPDATE" class="btn btn-success">

                                    <?php
                                    } else {
                                    ?>
                                    <input type="submit" name="btninsert" class="btn btn-primary" value="SUBMIT">
                                    <?php
                                    }
                                    ?>

                                </div>
                        </div>
                        </form>
                        <?php
                        /*Add Category1*/
                        if (isset($_POST['btninsert'])) {
                            $title = mysqli_real_escape_string($con, $_POST['title']);
                            $fname = mysqli_real_escape_string($con, $_POST['fname']);
                            $lname = mysqli_real_escape_string($con, $_POST['lname']);
                            $phone = mysqli_real_escape_string($con, $_POST['phone']);
                            $district = mysqli_real_escape_string($con, $_POST['district']);
                            $active = '1';
                             $sqlinsert = "INSERT INTO customer (title,first_name, last_name, contact_no, district, active) VALUES ('$title','$fname','$lname','$phone','$district','$active')";
                            $exeinsert = mysqli_query($con, $sqlinsert);
                            if ($exeinsert) {
                                $exe = mysqli_query($con, $sql);
                                header("Location: customer.php?success");
                            } else {
                                header("Location: customer.php?fail");
                            }
                        }
                         /*Update Category1*/
                        if(isset($_POST['update'])){
                            $id=$_GET['edit'];
                            $title = mysqli_real_escape_string($con, $_POST['title']);
                            $fname = mysqli_real_escape_string($con, $_POST['fname']);
                            $lname = mysqli_real_escape_string($con, $_POST['lname']);
                            $phone = mysqli_real_escape_string($con, $_POST['phone']);
                            $district = mysqli_real_escape_string($con, $_POST['district']);
                            $active = '1';
                           echo $sqlupdate="UPDATE customer SET title='$title',first_name='$fname',last_name='$lname',contact_no='$phone',district='$district',active='$active'WHERE id='$id'";
                            $exeupdate=mysqli_query($con, $sqlupdate);
                            if($exeupdate){
                                header("Location: customer.php?edit=$id&success1");
                            }else{
                               header("Location: customer.php?edit=$id&fail1");
                            }
                        }
                         ?>
                    </div>
                    <!-- #END# Input Group -->
                </div>
            </div>
            <?php
                }else{
                    ?>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <a href="customer.php?create"> <button type="button" name="view" style="float: right;"
                                    class="btn btn-info" value="SUBMIT">Create Customer</button></a><br>
                            <?php
                            if (isset($_GET['success3'])) {
                            ?>
                            <div class="alert alert-success" role="alert">
                                The Customer Deleted Successfully!!!
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                        aria-hidden="true">×</span></button>
                            </div>
                            <?php
                            }
                            if (isset($_GET['fail3'])) {
                            ?>
                            <div class="alert alert-warning" role="alert">
                                Sorry, The Customer NOT Deleted!!!
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                        aria-hidden="true">×</span></button>
                            </div>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Full Name</th>
                                            <th>Phone</th>
                                            <th>District</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sqlselect = "SELECT id, title, concat(first_name,' ',last_name) as name,contact_no,district From customer WHERE active='1' ORDER BY  id  DESC";
                                        $queryselect = mysqli_query($con, $sqlselect);
                                        while ($rowselect = mysqli_fetch_array($queryselect)) {
                                        ?>
                                        <tr>
                                            <td><?php echo $rowselect['title']; ?></td>
                                            <td><?php echo $rowselect['name']; ?></td>
                                            <td><?php echo $rowselect['contact_no']; ?></td>
                                            <td><?php echo $rowselect['district']; ?></td>
                                            <td>
                                                <a href="?id=<?php echo $rowselect['id']; ?>" class="btn btn-danger"><i
                                                        class="fas fa-trash-alt"></i></a>
                                                <a href="customer.php?create&edit=<?php echo $rowselect['id']; ?>"
                                                    class="btn btn-success"><i class="fas fa-edit"></i></i></a>
                                            </td>
                                        </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                <?php
                                if (isset($_GET['id'])) {
                                    $id = $_GET['id'];
                                    $sql2 = "UPDATE customer SET active = '0' WHERE id=' $id'";
                                    $exe = mysqli_query($con, $sql2);
                                    if ($exe) {
                                        header("Location:customer?success3");
                                    } else {
                                        header("Location:customer?fail3");
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                }
                ?>
    </section>
    <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

    <!-- Jquery DataTable Plugin Js -->
    <script src="plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>
    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/tables/jquery-datatable.js"></script>

</body>

</html>
<?php ob_end_flush(); ?>