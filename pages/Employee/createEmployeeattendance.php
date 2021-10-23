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
               <span class="word">Employee Creations</span>
             
             </h4>
          
           </div> 
            <!-- Quick Action Toolbar Starts-->
            <div class="card">
              <div class="card-body">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
               +Add
             </button>

              <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
               <div class="modal-dialog">
                 <div class="modal-content">
                   <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel">Employee attendance</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                     </button>
                   </div>
                   <div class="modal-body">

                    <form method="POST">
                      <div class="form-row">
                       
                        <div class="form-row" id="hour">
                        <div class="form-group col-md-6">
                          <label >Actual_start_time</label>
                         <input type="time" class="form-control" id="actualstarttime"  name="actualstarttime" >
                        </div>
                        <div class="form-group col-md-6">
                          <label >Actual_end_time</label>
                           <input type="time" class="form-control" id="actualendtime" name="actualendtime">
                        </div>

                        <div class="form-group col-md-6">
                          <label >Actual_wrking_hurs</label>
                         <input type="text" class="form-control" id="aworkinghours" name="aworkinghours"  readonly > 
                        </div>

                        <span id="result" class="alert alert-danger" style="background-color: transparent;border: none;"></span>
                      </div>
                       <div class="form-row" id="hours">
                        <div class="form-group col-md-6">
                          <label >Start_time</label>
                           <input type="time" class="form-control" id="starttime" name="starttime" >
</div>
                        <div class="form-group col-md-6">
                          <label >End_time</label>
                          <input type="time" class="form-control" id="endtime" name="endtime" >

                        </div>
                         <div class="form-group col-md-6">
                          <label>woring hours</label>
                          <input type="text" class="form-control" id="workinghours" name="workinghours" readonly > 
                        </div>
                        <span id="result" class="alert alert-danger" style="background-color: transparent;border: none;"></span>
</div>

                        <div class="form-group col-md-6">
                          <label >At_Date</label>
                          <input 
                            type="Date"
                            name="at_Date" 
                            class="form-control" 
                            id="inputPassword4" 
                            placeholder="at_Date"
                            >
                        </div>
                        
                        <div class="form-group col-md-6">
                           <label for="inputState">Employee name</label>
                           <select
                             type="text" 
                             name="role_id_fk" 
                             class="form-control"
                             required="" 
                             >
                         
                           <?php
                           include "../../connection.php";
                           $query ="SELECT * FROM employee";
                           $result = mysqli_query($con,$query);

                           while ($row = mysqli_fetch_array($result))
                           {
                             ?>
                             <option value=<?php echo $row["Emp_id"]?>> <?php echo $row["Emp_name"]?></option>
                             <?php
                           }
                           ?>
                             </select>
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
            <!-- Quick Action Toolbar Ends-->
                <div class="card shadow mb-4">
                 <div class="card-header py-3">
                   <h6 class="m-0 font-weight-bold text-primary">View Employee Attandance</h6>
                 </div>
                 <div class="card-body">
                   <div class="table-responsive">
                     <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                         <th>woring hours</th>
                         <th>Actual_start_time</th>
                         <th>Actual_end_time</th>
                         <th>Actual_wrking_hours</th>
                         <th>Start_time</th>
                         <th>end_time</th>
                          <th>At_Date</th>
                         <th>Employee name</th>
                          <th>Action</th>
                       </tr>
                     </thead>
                     <tbody>
                       <?php

                       include '../../connection.php';

                       $sql="SELECT * FROM attendance ORDER BY Att_ID DESC";

                       $query=mysqli_query($con,$sql);

                       while ($row=mysqli_fetch_array($query)) {

                         ?>

                         <tr>
                           <td><?php echo $row['woring_hours']; ?></td>
                           <td><?php echo $row['actual_start_time']; ?></td>
                           <td><?php echo $row['actual_end_time']; ?></td>
                           <td><?php echo $row['actual_wrking_hurs']; ?></td>
                            <td><?php echo $row['start_time']; ?></td>
                             <td><?php echo $row['end_time']; ?></td>
                              <td><?php echo $row['at_Date']; ?></td>
                               <td><?php echo $row['role_id_fk']; ?></td>

                         
                           <td>

                             <a href="crud/delete.php?id=<?php echo $row['Att_ID']; ?>"class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                             <a href="view-single.php?id=<?php echo $row['Att_ID']; ?>" class="btn btn-primary"><i class="fa fa-eye"></i></a>

                             <a href="edit.php?id=<?php echo $row['Att_ID']; ?>" class="btn btn-success" ><i class="fas fa-edit"></i></i></a>

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
<script src="../../js/differenceHours.js"></script>

          <script>
            $('#hours input').on('keyup change',function () {
              differenceHours.diff_hours('starttime', 'endtime', 'result')
              // alert($(result).text())
              $("#workinghours").val($(result).text());

               });
          </script>
           <script>
            $('#hour input').on('keyup change',function () {
              differenceHours.diff_hours('actualstarttime', 'actualendtime', 'result')
              // alert($(result).text())
              $("#aworkinghours").val($(result).text());
              
            });
          </script>
          <script>
function filter(){
    inp = $('#inputdata').val()
    // This should ignore first row with th inside
    $("tr:not(:has(>th))").each(function() {
        if (~$(this).text().toLowerCase().indexOf(inp.toLowerCase() ) ) {
            // Show the row (in case it was previously hidden)
            $(this).show();
        } else {
            $(this).hide();
        }
    });
}
</script>
  </body>
</html>

<?php 
if (isset($_POST['submit'])) {
  $woring_hours=$_POST['workinghours'];
  $actual_start_time=$_POST['actualstarttime'];
  $actual_end_time=$_POST['actualendtime'];
   $actual_wrking_hurs=$_POST['aworkinghours'];
   $start_time=$_POST['starttime'];
  $end_time=$_POST['endtime'];
  $at_Date=$_POST['at_Date'];
  $role_id_fk=$_POST['role_id_fk'];
   
  
 

  include '../../connection.php';

  $sql="INSERT INTO attendance (woring_hours,actual_start_time,actual_end_time, actual_wrking_hurs, start_time, end_time, at_Date, role_id_fk) VALUES ('$woring_hours','$actual_start_time','$actual_end_time','$actual_wrking_hurs','$start_time','$end_time','$at_Date','$role_id_fk')";


  $query= mysqli_query($con,$sql);

  if ($query) {
    ?>

    <script>
      $.alert({
        title: 'Alert!',
        content: 'attendance Create successfully!!!!',
        type:'green',
      });
      function pageRedirect() {
        window.location.replace("createEmployeeattendance.php");
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

<script type="text/javascript">
  var DifferenceHours = function(options){

      /*
       * Variables
       * in the class
       */
      const vars = {
          first_hour_split: null,
          second_hour_split: null,
          $el: null
      };

      /*
       * Can access this.method
       * inside other methods using
       * _this.method()
       */
      let _this = this;

      /*
       * Constructor
       */
      this.construct = function (options) {
          $.extend(vars , options);
      };

      /*
       * PUBLIC
       */

      this.diff_hours = function (time1, time2, result) {
          vars.first_hour_split = $('#' + time1).val().split(':');
          vars.second_hour_split = $('#' + time2).val().split(':');
          vars.$el = $('#' + result);

          let hours;
          let minute;

          if (parseInt(vars.first_hour_split[0]) < parseInt(vars.second_hour_split[0]) && parseInt(vars.first_hour_split[1]) < parseInt(vars.second_hour_split[1])) {

              //As for the addition, the subtraction is carried out separately, column by column.
              hours = parseInt(vars.second_hour_split[0]) - parseInt(vars.first_hour_split[0]);
              minute = parseInt(vars.second_hour_split[1]) - parseInt(vars.first_hour_split[1]);

              let _hours = '';
              let _minute = '';

              if (hours < 10) {
                  _hours ='0' + hours;
              } else {
                  _hours = hours;
              }

              if (minute < 10) {
                  _minute = '0' + minute;
              } else {
                  _minute = minute;
              }

              vars.$el.text(_hours + 'h' + _minute + 'm')

          }else if (parseInt(vars.second_hour_split[0]) > parseInt(vars.first_hour_split[0])) {
              if (parseInt(vars.second_hour_split[1]) < parseInt(vars.first_hour_split[1])) {

                  // As before we subtract column by column ... and we realize that it's impossible because our minute in second hour is greater than our minute in first hour
                  // We will transform 1 hour in 60 minutes
                  let _hours = parseInt(vars.second_hour_split[0]) - 1;
                  let _minute = parseInt(vars.second_hour_split[1]) + 60;
                  let final_hours = '';
                  let final_min = '';

                  hours = _hours - parseInt(vars.first_hour_split[0]);
                  minute = _minute - parseInt(vars.first_hour_split[1]);

                  if (hours < 10) {
                      final_hours = '0' + hours;
                  } else {
                      final_hours = hours;
                  }

                  if (minute < 10) {
                      final_min = '0' + minute;
                  } else {
                      final_min = minute;
                  }

                  vars.$el.text(final_hours + 'H' + final_min)
              }

              if (parseInt(vars.second_hour_split[1]) === parseInt(vars.first_hour_split[1])) {
                  hours = parseInt(vars.second_hour_split[0]) - parseInt(vars.first_hour_split[0]);
                  let final_hours = '';

                  if (hours < 10) {
                      final_hours = '0' + hours;
                  } else {
                      final_hours = hours;
                  }

                  vars.$el.text(final_hours + 'H' + '00')
              }

          }else if (parseInt(vars.first_hour_split[0]) > parseInt(vars.second_hour_split[0])) {
              let first_hour_only_hour = parseInt(vars.first_hour_split[0]);
              let second_hour_only_hour = parseInt(vars.second_hour_split[0]);

              let first_hour_only_min = parseInt(vars.first_hour_split[1]);
              let second_hour_only_min = parseInt(vars.second_hour_split[1]);

              let tmp_hour = 24 - first_hour_only_hour;
              let tmp_ttl_hour = tmp_hour + second_hour_only_hour;

              let tmp_ttl_min = first_hour_only_min + second_hour_only_min;
              let tmp_new_hour = 0;
              let tmp_new_min_mod = 0;

              let _hours = '';
              let _min = '';

              if (tmp_ttl_min > 59) {
                  tmp_new_hour = parseInt(tmp_ttl_min/60);
                  tmp_new_min_mod = tmp_ttl_min%60;

                  tmp_ttl_hour += tmp_new_hour;
              } else {
                  tmp_new_min_mod = tmp_ttl_min
              }

              if (tmp_ttl_hour < 10) {
                  _hours = '0' + tmp_ttl_hour;
              } else {
                  _hours = tmp_ttl_hour
              }

              if (tmp_new_min_mod < 10) {
                  _min = '0' + tmp_new_min_mod
              } else {
                  _min = tmp_new_min_mod
              }

              vars.$el.text(_hours + 'H' + _min)
          } else if (parseInt(vars.first_hour_split[0]) === parseInt(vars.second_hour_split[0])) {
              hours = '00';
              let minute = 0;
              if (parseInt(vars.first_hour_split[1]) < parseInt(vars.second_hour_split[1])) {
                  minute = parseInt(vars.second_hour_split[1]) - parseInt(vars.first_hour_split[1]);
              }

              if (minute < 10) {
                  vars.$el.text(hours + 'H0' + minute)
              } else  {
                  vars.$el.text(hours + 'H' + minute)
              }
          }else if (parseInt(vars.first_hour_split[0]) === 0 && parseInt(vars.first_hour_split[1]) === 0) {
              hours = parseInt(vars.second_hour_split[0]);
              minute = parseInt(vars.second_hour_split[1]);

              if (hours === 0) {
                  vars.$el.text('00H' + minute)
              }else if (minute === 0){
                  if (hours < 10) {
                      vars.$el.text('0' + hours + 'H00');
                  }else {
                      vars.$el.text(hours + 'H00');
                  }
              }else {
                  vars.$el.text(hours + 'H' + minute)
              }
          }
      };

      /* END PUBLIC FUNCTION */

      this.construct(options);
  };


  const differenceHours = new DifferenceHours();

</script>
