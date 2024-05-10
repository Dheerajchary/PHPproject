<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
   

    $connection= mysqli_connect('localhost:3308','root','','transport');
    $msg= "" ;     


    if(isset($_POST['submit'])){
        $route_name=$_POST['route_name'];
        $from=$_POST['from'];
        $to=$_POST['to'];
 
        $res=false;
        $insert_query="INSERT INTO `route`(`route_id`, `route_name`, `from`, `to`) 
        VALUES ('','$route_name','$from','$to')";
        
        $res= mysqli_query($connection,$insert_query);
            
        if($res==true){
            $msg= "<script language='javascript'>
            alert('Success! New Route Added');
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" >



    
    <style>
    .wrapper{
            width: 600px;
            margin: 0 auto;
        }
        body{background-color:skyblue;}
</style>

</head>
<body>  
 <?php include 'navbar_admin.php'; ?>
 <br> 
 

<!-- Registration 13 - Bootstrap Brain Component -->
<section class="py-3 py-md-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
        <div class="card border border-light-subtle rounded-3 shadow-sm">
          <div class="card-body p-3 p-md-4 p-xl-5">
            <h2 class="fs-6 fw-normal text-center text-secondary mb-4">Enter Route Details</h2>
            <form action="#" method="post">
              <div class="row gy-2 overflow-hidden">
                <div class="col-12">
                  <div class="form-floating mb-3">
                  <label for="route_name" class="form-label">Route Name</label>
                  <input id="route_name" type="text" class="form-control" name="route_name" pattern="[a-zA-Z0-9_]+" required>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-floating mb-3">
                  <label for="from" class="form-label">Starting point</label>
                  <input id="from" type="text" class="form-control" name="from" pattern="[a-zA-Z0-9_]+" required>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-floating mb-3">
                  <label for="to" class="form-label">Drop Point</label>
                  <input id="to" type="text" class="form-control" name="to" pattern="[a-zA-Z0-9_]+" required>
                  </div>
                </div>

                <div class="col-12">
                  <div class="d-grid my-3">
                  <input type="submit" name="submit" class="btn btn-success">
                  <a href="admin.php" class="btn btn-secondary ml-2">Cancel</a>                     </div>
                </div>
                
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>