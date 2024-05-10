<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
   

    $connection= mysqli_connect('localhost:3308','root','','transport');
    $msg= "" ;     


    if(isset($_POST['submit'])){
        $veh_reg_no=$_POST['veh_reg_no'];
        $driver_name=$_POST['driver_name'];
        $driver_joindate=$_POST['driver_joindate'];
        $mobile=$_POST['mobile'];
        $age=$_POST['age'];
        $licensce_no=$_POST['licensce_no'];
 
        $res=false;
        $insert_query="INSERT INTO `vehicle`(`veh_id`, `veh_reg_no`, `driver_name`, `driver_joindate`, `mobile`, `age`, `licensce_no`) 
        VALUES ('','$veh_reg_no','$driver_name','$driver_joindate','$mobile','$age','$licensce_no')";
        
        $res= mysqli_query($connection,$insert_query);
            
        if($res==true){
            $msg= "<script language='javascript'>
            alert('Success! New Driver Added');
          </script>";
        }
        else{
            die('unsuccessful' .mysqli_error($connection));
        }
        
        
    }  
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>New Driver</title> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" >

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- Include the jQuery UI library for the date picker -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    

    <style>
        body{background-color:#FFDBAA;}

    </style>
</head>
<body>  
 <?php include 'navbar_admin.php'; ?>
 <br>
  
  
 <section class="py-3 py-md-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
        <div class="card border border-light-subtle rounded-3 shadow-sm">
          <div class="card-body p-3 p-md-4 p-xl-5">
            <h2 class="fs-6 fw-normal text-center text-secondary mb-4">Enter Vehicle Details</h2>
            <form action="#" method="POST">
              <div class="row gy-2 overflow-hidden">
                <div class="col-12">
                  <div class="form-floating mb-3">
                    <span class="input-group-addon"><b> Vehicle Registration no</b></span>
                    <input id="veh_reg_no" type="text" class="form-control" name="veh_reg_no" pattern="[0-9]+" required>
                </div>
    </div>

    <div class="col-12">
                  <div class="form-floating mb-3">
                    <span class="input-group-addon"><b>Driver Name</b></span>
                    <input id="driver_name" type="text" class="form-control" name="driver_name" pattern="[A-Za-z_]+" required>
                </div></div>
                
                <div class="col-12">
                  <div class="form-floating mb-3">
                    <span class="input-group-addon"><b>Driver Joining Date</b></span>
                    <input id="driver_joindate" type="text" class="form-control" name="driver_joindate" required readonly style="background-color:white;">
                </div>
                </div>

                <script>
                      $("#driver_joindate").datepicker({
                          dateFormat: 'yy-mm-dd',
                          onSelect: function(dateText, inst) {
                              $(inst).val(dateText); // Write the value in the input
                          }

                      });
                      // Code below to avoid the classic date-picker
                      $("#driver_joindate").on('click', function() {
                          return false;
                      });
                      </script>


                <div class="col-12">
                  <div class="form-floating mb-3">
                    <span class="input-group-addon"><b>Mobile</b></span>
                    <input id="mobile" type="tel" class="form-control" name="mobile" pattern="^[6-9]{1}[0-9]{9}$" required>
                </div>
                </div>

                <div class="col-12">
                  <div class="form-floating mb-3">
                    <span class="input-group-addon"><b>Age</b></span>
                    <input id="age" type="text" class="form-control" name="age" pattern="[0-9]+" required>
                </div>
                </div>
                
                
                <div class="col-12">
                  <div class="form-floating mb-3">
                    <span class="input-group-addon"><b>License No</b></span>
                    <input id="licensce_no" type="text" class="form-control" name="licensce_no" pattern="[0-9]+" required>
                </div>
                </div>                
                 
                <div class="col-12">
                  <div class="d-grid my-3">
                    <input type="submit" name="submit" class="btn btn-success">
                    <a href="admin.php" class="btn btn-secondary ml-2">Cancel</a>

                </div>
                </form>
                </div>
            </div>        
        </div>
    </div>
    <br><br>
</body>
</html>
