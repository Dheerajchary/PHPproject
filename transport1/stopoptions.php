<?php 
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    $connection= mysqli_connect('localhost:3308','root','','transport');

    $select_query="SELECT * FROM `route`";
    $result= mysqli_query($connection,$select_query);
    ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>vehicle management system</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>body{
    background-color:#D7E4C0;
}</style>
</head>

<?php include 'navbar.php'?> <br> 
<section class="py-3 py-md-5">
<div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
        <div class="card border border-light-subtle rounded-3 shadow-sm">
          <div class="card-body p-3 p-md-4 p-xl-5">
            <h2 class="fs-6 fw-normal text-center text-secondary mb-4">Select Route</h2>
            <form action="#" method="POST">
              <div class="row gy-2 overflow-hidden">
                <div class="col-12">
                  <div class="form-floating mb-3">
                  <label>Route Name :</label>
                    <select name="route_id">
                    <?php
                    while($row = mysqli_fetch_array($result)) 
                    {
                        echo"<option value=".$row['route_id'].">".$row['from']." to ".$row['to']."</option>";
                    }?>
                    </select>
                    </div>
                
              </div>
              <div class="col-12">
                  <div class="d-grid my-3">
                        <input type="submit" name="submit" class="btn btn-success">
                        <a href="home.php" class="btn btn-secondary ml-2">Cancel</a>        
                        </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

