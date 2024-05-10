<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    $connection= mysqli_connect('localhost:3308','root','','transport');

    if(isset($_SESSION['username'])){
    $username= $_SESSION['username'];
    
    $query= "SELECT  `first_name`, `last_name`, `email` FROM `user` WHERE username='$username'";
    $result= mysqli_query($connection,$query);
    
    $row= mysqli_fetch_assoc($result);
    }
    else{
      header(location:'login.php');
      exit();
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Booking</title>
    
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

</head>
<style>
    .wrapper{
            width: 600px;
            margin: 0 auto;
        }
        body{background-color:#4CCD99;}
        #req_date {
            background-color: white;
           
        }
        
</style>

<body>
    <?php include 'navbar.php'; ?>
    <script>alert('Check Bus schedules Priorly!');</script>
    
    <section class="py-3 py-md-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
        <div class="card border border-light-subtle rounded-3 shadow-sm">
          <div class="card-body p-3 p-md-4 p-xl-5">
            <h2 class="fs-6 fw-normal text-center text-secondary mb-4">Enter Details</h2>
            <form action="bookingaction.php" method="post">
              <div class="row gy-2 overflow-hidden">
                <div class="col-12">
                  <div class="form-floating mb-3">
                      <span class="input-group-addon"><b>Name</b></span>
                      <input id="name" type="text" class="form-control" name="name" pattern="[A-Za-z0-9]+"  required>
                    </div></div>
                    
                    <div class="col-12">
                  <div class="form-floating mb-3">
                      <span class="input-group-addon"><b>Date of Requirement</b></span>
                      <input id="req_date" type="text" class="form-control" name="req_date" placeholder="" readonly required>
                    </div></div>

                    <script>
                      $("#req_date").datepicker({
                          dateFormat: 'yy-mm-dd',
                          onSelect: function(dateText, inst) {
                              $(inst).val(dateText); // Write the value in the input
                          },minDate:0

                      });

                      // Code below to avoid the classic date-picker
                      $("#req_date").on('click', function() {
                          return false;
                      });</script>
                    
                    <div class="col-12">
                  <div class="form-floating mb-3">
                      <span class="input-group-addon"><b>Pickup Point</b></span>
                      <input id="pickup" type="text" class="form-control" name="pickup" pattern="[A-Za-z_]+" required>
                    </div></div>
                    
                    
                    <div class="col-12">
                  <div class="form-floating mb-3">
                      <span class="input-group-addon"><b>Destination</b></span>
                      <input id="destination" type="text" class="form-control" name="destination" pattern="[A-Za-z_]+" required>
                    </div></div>
                    
                    <div class="col-12">
                  <div class="form-floating mb-3">
                      <span class="input-group-addon"><b>Email</b></span>
                      <input id="email" type="email" class="form-control" name="email" pattern="[a-z0-9]+@[a-z]+\.[a-z]{3,}$" required>
                    </div></div>
                    
                    <div class="col-12">
                  <div class="form-floating mb-3">
                      <span class="input-group-addon"><b>Mobile</b></span>
                      <input id="mobile" type="text" class="form-control" name="mobile" pattern="^[6-9]{1}[0-9]{9}$"  required>
                    </div></div>
                    
                    
                    <input type="hidden" name="username" value="<?php echo $username; ?>">
                    
                    <div class="col-12">
                  <div class="d-grid my-3">
                        <input type="submit" name="submit" class="btn btn-success">
                        <a href="home.php" class="btn btn-secondary ml-2">Cancel</a>        
                        </div>
                
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

</body>
</html>