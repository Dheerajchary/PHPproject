<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
   

    $connection= mysqli_connect('localhost:3308','root','','transport');
    $msg= "" ;     

    if(isset($_POST['submit'])){
        $route_id=$_POST['route_id'];
        $stop_name=$_POST['stop_name'];
        $first_bus=$_POST['first_bus'];
        $second_bus=$_POST['second_bus'];
        $third_bus=$_POST['third_bus'];
      
        $res=false;
        $insert_query="INSERT INTO `schedule`(`route_id`, `stop_name`, `first_bus`,`second_bus`, `third_bus`) 
        VALUES ('$route_id','$stop_name','$first_bus','$second_bus','$third_bus')";
        
        $res= mysqli_query($connection,$insert_query);
            
        if($res==true){
            $msg= "<script language='javascript'>
            alert('Success! New Stop Added');
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
    <title>New Stop</title> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" >

    <style>
        body{background-color:#AFC8AD;}

    </style>

</head>
<body>  
 <?php include 'navbar_admin.php'; ?>
 <br>
 
<div class="container"> 
<section class="py-3 py-md-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
        <div class="card border border-light-subtle rounded-3 shadow-sm">
          <div class="card-body p-3 p-md-4 p-xl-5">
            <h2 class="fs-6 fw-normal text-center text-secondary mb-4">Enter Stop Details</h2>
              <div class="row gy-2 overflow-hidden">
                <div class="col-12">
                  <div class="form-floating mb-3">
                    <form action="#" method="POST">  
                    <input type="hidden" name="route_id" value="<?php echo $_POST['route_id'];?>">

                    <div class="col-12">
                  <div class="form-floating mb-3">
                  <span class="input-group-addon"><b> Stop Name </b></span>
                  <input id="stop_name" type="text" class="form-control" name="stop_name" required>
                  </div>
                </div>

                <div class="col-12">
                  <div class="form-floating mb-3">
                  <span class="input-group-addon"><b>First Bus Time</b></span>
                  <input id="first_bus" type="time" class="form-control" name="first_bus" required>
                  </div>
                </div>
                
                <div class="col-12">
                  <div class="form-floating mb-3">
                  <span class="input-group-addon"><b>Second Bus Time</b></span>
                  <input id="second_bus" type="time" class="form-control" name="second_bus" required>
                  </div>
                </div>

                <div class="col-12">
                  <div class="form-floating mb-3">
                  <span class="input-group-addon"><b>Third Bus Time</b></span>
                  <input id="third_bus" type="time" class="form-control" name="third_bus" required>
                  </div>
                </div>

                <div class="col-12">
                  <div class="form-floating mb-3">
                  <input type="submit" name="submit" class="btn btn-success">
                  <a href="admin.php" class="btn btn-secondary ml-2">Cancel</a>

                  </div>
                
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>