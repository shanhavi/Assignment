<?php
ob_start();
session_start();
include "inc/dbconfig.php";
include "inc/functions.php";
?>
<!DOCTYPE html>
<html>

<head>
    <title>Welcome To | ERP System</title>

    <?php include "inc/head.php"; ?>
    <!-- JQuery DataTable Css -->
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
        <div class="alert bg-green">
            Completed User Registration successfully!!!
        </div>
        <?php
        }
        if (isset($_GET['fail'])) {
        ?>
        <div class="alert bg-green">
            Something Went Wrong Try Again!!!
        </div>
        <?php
        }
        ?>

        <?php
        if (isset($_GET['success1'])) {
        ?>
        <div class="alert alert-success" role="alert">
            The Users updated Successfully!!!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">×</span></button>
        </div>
        <?php
        }
        if (isset($_GET['fail1'])) {
        ?>
        <div class="alert alert-warning" role="alert">
            Sorry, The Users NOT updated!!!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">×</span></button>
        </div>
        <?php
        }
        ?>
        <div class="container-fluid">
            <?php
                if(isset($_GET['view'])){
                    ?>
            <div class="block-header">
                <!-- Input Group -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>
                                    User Register
                                </h2>
                                <a href="useraccount.php"> <button type="button" name="view" class="btn btn-success"
                                        style="float: right;" value="SUBMIT">Manage Users</button></a><br>
                                <!-- <ul class="header-dropdown m-r--5">
                                    <li class="dropdown">
                                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                            <i class="material-icons">more_vert</i>
                                        </a>
                                        <ul class="dropdown-menu pull-right">
                                            <li><a href="javascript:void(0);">Action</a></li>
                                            <li><a href="javascript:void(0);">Another action</a></li>
                                            <li><a href="javascript:void(0);">Something else here</a></li>
                                        </ul>
                                    </li>
                                </ul> -->
                            </div>
                            <?php
                            if (isset($_GET['edit']) && $_GET['edit'] != "") {
                                $users_id = $_GET['edit'];
                                $sqlget = "SELECT * FROM users WHERE users_id='$users_id'";
                                $exeget = mysqli_query($con, $sqlget);
                                $rowget = mysqli_fetch_array($exeget);
                            }
                            ?>
                            <form action="" method="POST">
                                <div class="body">
                                    <!-- <h2 class="card-inside-title">With Icon</h2> -->
                                    <div class="row clearfix">
                                        <div class="col-md-12">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">person</i>
                                                </span>
                                                <div class="form-line">
                                                    <input type="text" name="fullname" class="form-control date"
                                                        placeholder="FullName" required
                                                        value="<?php if (isset($_GET['edit']) && $_GET['edit'] != "") {echo $rowget['fullname'];  }  ?>">
                                                </div>
                                            </div>
                                        </div>
                                    <div class="row clearfix">
                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">date_range</i>
                                                </span>
                                                <div class="form-line">
                                                    <label for="">Date of Birth</label>
                                                    <input type="date" name="dob" class="form-control date"
                                                        value="2021-10-12" placeholder="Date OF Birth" required
                                                        value="<?php if (isset($_GET['edit']) && $_GET['edit'] != "") {echo date('Y-m-d', strtotime($rowget['dob']));}  ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">verified_user</i>
                                                </span>
                                                <div class="form-line">
                                                    <input type="text" name="nic" class="form-control date"
                                                        placeholder="NIC" required
                                                        value="<?php if (isset($_GET['edit']) && $_GET['edit'] != "") {echo $rowget['nic'];}  ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">credit_card</i>
                                                </span>
                                                <div class="form-line">
                                                    <input type="text" name="address" class="form-control date"
                                                        placeholder="Address" required
                                                        value="<?php if (isset($_GET['edit']) && $_GET['edit'] != "") {echo $rowget['address']; }  ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-md-6">
                                                <input type="radio" name="gender" value="1"
                                                    <?php if (isset($_GET['edit']) && $rowget['gender'] == '1') {echo 'checked';} ?>
                                                    id="male" class="with-gap">
                                                <label for="male">Male</label>
                                                <input type="radio" name="gender" value="0"
                                                    <?php if (isset($_GET['edit']) && $rowget['gender'] == '0') {echo 'checked';} ?>
                                                    id="female" class="with-gap">
                                                <label for="female" class="m-l-20">Female</label>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- </div>
                                    <div class="row clearfix">
                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">person</i>
                                                </span>
                                                <div class="form-line">
                                                    <input type="file" name="userimg" class="form-control date" placeholder="Image">
                                                </div>
                                            </div>
                                        </div> -->
                                    <div class="row clearfix">
                                        <div class="col-md-6">
                                            <select name="usertype" class="form-control show-tick"
                                                data-live-search="true" required
                                                value="<?php if (isset($_GET['edit']) && $_GET['edit'] != "") {echo $rowget['usertype'];}  ?>">
                                                <option>Select UserType</option>
                                                <option value="Admin"
                                                    <?php if (isset($_GET['edit']) && $rowget['usertype'] == 'Admin') {echo 'selected';} ?>>
                                                    Admin</option>
                                                <option value="BranchHead"
                                                    <?php if (isset($_GET['edit']) && $rowget['usertype'] == 'BranchHead') {echo 'selected';} ?>>
                                                    Branch Head</option>
                                                <option value="Instructor"
                                                    <?php if (isset($_GET['edit']) && $rowget['usertype'] == 'Instructor') {echo 'selected';} ?>>
                                                    Instructor</option>
                                                <option value="Manager"
                                                    <?php if (isset($_GET['edit']) && $rowget['usertype'] == 'Manager') {echo 'selected';} ?>>
                                                    Manager</option>
                                                <option value="Student"
                                                    <?php if (isset($_GET['edit']) && $rowget['usertype'] == 'Student') {echo 'selected';} ?>>
                                                    Student</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">update</i>
                                                </span>
                                                <div class="form-line">
                                                    <label for="">Join Date </label>
                                                    <input type="date" name="joindate" class="form-control date"
                                                        value="2021-10-12" required placeholder="Join Date"
                                                        value="<?php if (isset($_GET['edit']) && $_GET['edit'] != "") { echo $rowget['joindate'];}  ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">person</i>
                                                </span>
                                                <div class="form-line">
                                                    <input type="text" name="username" class="form-control date"
                                                        placeholder="Username" required
                                                        value="<?php if (isset($_GET['edit']) && $_GET['edit'] != "") {echo $rowget['username'];}  ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">phone</i>
                                                </span>
                                                <div class="form-line">
                                                    <input type="text" name="phone" class="form-control date"
                                                        placeholder="Phone" required
                                                        value="<?php if (isset($_GET['edit']) && $_GET['edit'] != "") {echo $rowget['phone'];}  ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row clearfix">
                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">email</i>
                                                </span>
                                                <div class="form-line">
                                                    <input type="email" name="email" class="form-control date"
                                                        placeholder="Email" required
                                                        value="<?php if (isset($_GET['edit']) && $_GET['edit'] != "") {echo $rowget['email'];}  ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">lock </i>
                                                </span>
                                                <div class="form-line">
                                                    <input type="password" name="password" required
                                                        class="form-control date "
                                                        placeholder="<?php if (isset($_GET['edit'])) {echo 'Type if you want to change';} else {echo 'Password';} ?>"
                                                        <?php if (!isset($_GET['edit'])) {echo 'required'; } ?>>
                                                    <?php if (isset($_GET['edit'])) {
                                                    ?>
                                                    <input type="hidden" name="passwordold"
                                                        value="<?php echo $rowget['password']; ?>">
                                                    <?php
                                                    } ?>
                                                </div>
                                            </div>
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
                        if (isset($_POST['btninsert'])) {
                            $fullname = mysqli_real_escape_string($con, $_POST['fullname']);
                            $dob = mysqli_real_escape_string($con, $_POST['dob']);
                            $nic = mysqli_real_escape_string($con, $_POST['nic']);
                            $address = mysqli_real_escape_string($con, $_POST['address']);
                            $gender = mysqli_real_escape_string($con, $_POST['gender']);
                            $usertype = mysqli_real_escape_string($con, $_POST['usertype']);
                            $joindate = mysqli_real_escape_string($con, $_POST['joindate']);
                            $username = mysqli_real_escape_string($con, $_POST['username']);
                            $phone = mysqli_real_escape_string($con, $_POST['phone']);
                            $email = mysqli_real_escape_string($con, $_POST['email']);
                            $code = time();
                            $password = md5(mysqli_real_escape_string($con, $_POST['password']) . "Shangavi");
                            $tocken = md5($email . $code);
                            // $userimg = $code . 'userimg.' . "jpg";
                            //move_uploaded_file($_FILES["userimg"]["tmp_name"], "user/$userimg");
                            $active = '1';

                            $sql = "INSERT INTO users(fullname,dob, nic, address, gender, userimg, usertype, joindate, username, phone, email, password, tocken, code, active) 
                                       VALUES ('$fullname','$dob','$nic','$address','$gender','','$usertype','$joindate','$username','$phone','$email','$password','$tocken', '$code', '$active')";
                            $exe = mysqli_query($con, $sql);
                            if ($exe) {
                                header("Location: useraccount.php?success");
                            } else {
                                header("Location: useraccount.php?fail");
                            }
                        }
                        if (isset($_POST['update'])) {
                            $users_id = $_GET['edit'];
                            $fullname = mysqli_real_escape_string($con, $_POST['fullname']);
                            $dob = mysqli_real_escape_string($con, $_POST['dob']);
                            $nic = mysqli_real_escape_string($con, $_POST['nic']);
                            $address = mysqli_real_escape_string($con, $_POST['address']);
                            $gender = mysqli_real_escape_string($con, $_POST['gender']);
                            $usertype = mysqli_real_escape_string($con, $_POST['usertype']);
                            $joindate = mysqli_real_escape_string($con, $_POST['joindate']);
                            $username = mysqli_real_escape_string($con, $_POST['username']);
                            $phone = mysqli_real_escape_string($con, $_POST['phone']);
                            $email = mysqli_real_escape_string($con, $_POST['email']);
                            $code = time();
                            if ($_POST['password'] != "") {
                                $password = md5(mysqli_real_escape_string($con, $_POST['password']) . "Shangavi");
                            } else {
                                $password = md5(mysqli_real_escape_string($con, $_POST['passwordold']) . "Shangavi");
                            }
                            $tocken = md5($email . $code);
                            $active = '1';
                            $sqlupdate = "UPDATE users SET fullname='$fullname',dob='$dob',nic='$nic',address='$address',gender='$gender',userimg='',usertype='$usertype',joindate='$joindate',username='$username',phone='$phone',email='$email',
                            password='$password',tocken='$tocken',code='$code',active='$active' WHERE users_id='$users_id'";
                            $exeupdate = mysqli_query($con, $sqlupdate);
                            if ($exeupdate) {
                                header("Location: useraccount.php?edit=$user_id&success1");
                            } else {
                                header("Location: useraccount.php?fail1");
                            }
                        }

                        //$code=time();
                        // done

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
                            <a href="useraccount.php?view"> <button type="button" name="view" class="btn btn-info"
                                    style="float: right;" value="SUBMIT">Create Users</button></a><br>
                            <!-- <h2>
                                USER DETAILS
                            </h2><br> -->
                            <?php
                            if (isset($_GET['success3'])) {
                            ?>
                            <div class="alert alert-success" role="alert">
                                The Users Deleted Successfully!!!
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                        aria-hidden="true">×</span></button>
                            </div>
                            <?php
                            }
                            if (isset($_GET['fail3'])) {
                            ?>
                            <div class="alert alert-warning" role="alert">
                                Sorry, The Users NOT Deleted!!!
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
                                            <th>Full Name</th>
                                            <th>User Type</th>
                                            <th>Join Date</th>
                                            <th>Phone</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql1 = "SELECT * from users WHERE active='1' ORDER BY  users_id  DESC";
                                        $query1 = mysqli_query($con, $sql1);
                                        while ($row1 = mysqli_fetch_array($query1)) {
                                        ?>
                                        <tr>
                                            <td><?php echo $row1['fullname']; ?></td>
                                            <td><?php echo $row1['usertype']; ?></td>
                                            <td><?php echo $row1['joindate']; ?></td>
                                            <td><?php echo $row1['phone']; ?></td>
                                            <td>
                                                <a href="?id=<?php echo $row1['users_id']; ?>" class="btn btn-danger"><i
                                                        class="fas fa-trash-alt"></i></a>
                                                <a href="useraccount.php?view&edit=<?php echo $row1['users_id']; ?>"
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
                                    $sql2 = "UPDATE USERS SET active = '0' WHERE users_id=' $id'";
                                    $exe = mysqli_query($con, $sql2);
                                    if ($exe) {
                                        header("Location:useraccount.php?success3");
                                    } else {
                                        header("Location:useraccount.php?fail3");
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


        </div>
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