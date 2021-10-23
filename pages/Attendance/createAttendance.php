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
               <span class="word">Attendance Creations</span>
             
             </h4>
          
           </div> 
            <!-- Quick Action Toolbar Starts-->
            <div class="card">
              <div class="card-body">
              <form>
                <div class="form-row">
                
                
                  <div class="form-group col-md-6">
                    <label for="inputState">Role ID</label>
                    <select
                      type="text" 
                      name="StudentID" 
                      class="form-control"
                      required="" 
                      >
                    </select>
                  </div>

                  <div class="form-group col-md-6">
                    <label > Working Hours</label>
                    <input 
                      type="date" 
                      class="form-control" 
                      id="inputEmail4" 
                      placeholder="Date">
                  </div>
                  <div class="form-group col-md-6">
                    <label >Start Time</label>
                    <input 
                      type="date" 
                      class="form-control" 
                      id="inputEmail4" 
                      placeholder="Date">
                  </div>
                  <div class="form-group col-md-6">
                    <label >End Time</label>
                    <input 
                      type="date" 
                      class="form-control" 
                      id="inputEmail4" 
                      placeholder="Date">
                  </div>
                  <div class="form-group col-md-6">
                    <label >Actual Start Time</label>
                    <input 
                      type="date" 
                      class="form-control" 
                      id="inputEmail4" 
                      placeholder="Date">
                  </div>
                  <div class="form-group col-md-6">
                    <label >Actual End Time</label>
                    <input 
                      type="date" 
                      class="form-control" 
                      id="inputEmail4" 
                      placeholder="Date">
                  </div>
                  <div class="form-group col-md-6">
                    <label >Actual  Working Hours </label>
                    <input 
                      type="date" 
                      class="form-control" 
                      id="inputEmail4" 
                      placeholder="Date">
                  </div>

                  <div class="form-group col-md-6">
                    <label > Attendance Date</label>
                    <input 
                      type="date" 
                      class="form-control" 
                      id="inputEmail4" 
                      placeholder="Date">
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