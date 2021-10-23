<!DOCTYPE html>
<html lang="en">
<head>
  <?php include '../../layout/head.php'  ?>
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

         <div class="page-header">
          <h4 class="ml15"class="page-title">
           <span class="word">Students Creations</span>

         </h4>

       </div>
       <div class="card">
      <div class="card-body"> 
       <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        +Add New Student
      </button>
      <!-- Quick Action Toolbar Starts-->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add Student</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"></span>
              </button>
            </div>
            <div class="modal-body">

             <div class="card">
              <div class="card-body">
                <form method="POST">
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label>Student Name</label>
                      <input 
                      type="text"
                      name="sname" 
                      class="form-control" 
                      id="inputPassword4" 
                      placeholder="Name"
                      required="">
                    </div>
                    <div class="form-group col-md-6">
                      <label >Student Address</label>
                      <input 
                      type="text"
                      name="sadd" 
                      class="form-control" 
                      id="inputPassword4" 
                      placeholder="Address"
                      required="">
                    </div>
                    <div class="form-group col-md-6">
                      <label >Student NIC</label>
                      <input 
                      type="text"
                      name="snic" 
                      class="form-control" 
                      id="inputPassword4" 
                      placeholder="NIC"
                      maxlength="10"
                      required="">
                    </div>
                    <div class="form-group col-md-6">
                      <label >Student DOB</label>
                      <input 
                      type="date"
                      name="sdob" 
                      class="form-control" 
                      id="inputEmail4" 
                      placeholder="DOB"
                      required="">
                    </div>
                    <div class="form-group col-md-6">
                      <label >Student Number</label>
                      <input 
                      type="text"
                      name="snum" 
                      class="form-control" 
                      id="inputEmail4" 
                      placeholder="Number"
                      maxlength="10"
                      required="">
                    </div>
                    <div class="form-group col-md-6">
                      <label >Student Email</label>
                      <input 
                      type="email"
                      name="semail" 
                      class="form-control" 
                      id="inputEmail4" 
                      placeholder="Email"
                      required="">
                    </div>
                    <div class="form-group col-md-6">
                      <label >UserName</label>
                      <input 
                      type="text"
                      name="suname" 
                      class="form-control" 
                      id="inputEmail4" 
                      placeholder="UserName">
                    </div>
                    <div class="form-group col-md-6">
                      <label >Password</label>
                      <input 
                      type="password"
                      name="spass" 
                      class="form-control" 
                      id="inputPassword4" 
                      placeholder="Password"
                      required="">
                    </div>
                    <div class="form-group col-md-6">
                     <label for="inputState">Status</label>
                     <select 
                     id="inputState"
                     name="sststus" 
                     class="form-control"
                     required="">
                     <option selected>Choose...</option>
                     <option value="Active">Active</option>
                     <option value="Deactive">Deactive</option>
                   </select>
                 </div>
               </div>

               <input 
               type="submit" 
               name="submit"
               class="btn btn-outline-info btn-icon-text"
               value="SUBMIT" 
               >

             </form>

           </div>


             </div>

           </div>

         </div>
       </div>
     </div>
    </div>

</div>

   <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">View Student</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
           <thead>
             <tr>
              <th>Name</th>
              <th>Address</th>
              <th>NIC</th>
              <th>DOB</th>
              <th>Number</th>
              <th>Email</th>
              <th>UserName</th>
              <th>Status</th>
              <th>Action</th>
              </tr>
          </thead>
          <tbody>
            <?php

        include '../../connection.php';

        $sql="SELECT * FROM student ORDER BY Stu_id DESC";

        $query=mysqli_query($con,$sql);

        while ($row=mysqli_fetch_array($query)) {

          ?>

          <tr>
            <td><?php echo $row['Stu_name']; ?></td>
            <td><?php echo $row['S_Add']; ?></td>
            <td><?php echo $row['nic']; ?></td>
            <td><?php echo $row['DoB']; ?></td>
            <td><?php echo $row['St_number']; ?></td>
            <td><?php echo $row['S_Email']; ?></td>
            <td><?php echo $row['username']; ?></td>
            <td>
              <?php
              if ($row['Status']=="Active") {
                echo '<span class="badge badge-success">Active</span>';
              }
              else {
                echo '<span class="badge badge-danger">Deactive</span>';
              }
              ?>

            </td>
            <td>

              <a href="crud/delete.php?id=<?php echo $row['Stu_id']; ?>"class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
              <a href="view-single.php?id=<?php echo $row['Stu_id']; ?>" class="btn btn-primary"><i class="fa fa-eye"></i></a>

              <a href="edit.php?id=<?php echo $row['Stu_id']; ?>" class="btn btn-success" ><i class="fas fa-edit"></i></i></a>

            </tr>

            <?php
          }

          ?> 
        </td> 

          </tbody>

        </table>
      </div>
    </div>
  </div>
 <!-- Quick Action Toolbar Ends-->


</div>
<!-- content-wrapper ends -->
<!-- partial:partials/_footer.html -->
<?php include '../../layout/footer.php'  ?>
<!-- partial -->
</div>
<!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<?php include '../../layout/script.php' ?>
<!-- End custom js for this page -->
</body>
</html>

<!-- //get verible from using POST method -->
<?php 
if (isset($_POST['submit'])) {
  $sname=$_POST['sname'];
  $sadd=$_POST['sadd'];
  $snic=$_POST['snic'];
  $sdob=$_POST['sdob'];
  $snum=$_POST['snum'];
  $semail=$_POST['semail'];
  $suname=$_POST['suname'];
  $spass=$_POST['spass'];
  $sststus=$_POST['sststus'];

  include '../../connection.php';

  $sql="INSERT INTO student(Stu_name,S_Add,nic,DoB,St_number,S_Email,username,password,Status) VALUES ('$sname','$sadd','$snic','$sdob','$snum','$semail','$suname','$spass','$sststus')";

  $query=mysqli_query($con,$sql);

  if ($query) {
    ?>

    <script>
      $.alert({
        title: 'Alert!',
        content: 'Student Create successfully!!!!',
        type:'green',
      });
      function pageRedirect() {
        window.location.replace("create_student.php");
      }      
      setTimeout("pageRedirect()", 2000);
    </script>
    <?php
  }

  else{
    ?>
    <script>
      $.alert({
        title: 'Alert!',
        content: 'Oops... Sorry Something Went Wrong!',
        type: 'red',
      });

    </script>
    <?php
  }


}

?>