<?php 
    session_start();
    $connection= mysqli_connect('localhost:3308','root','','transport');

    $select_query="SELECT * FROM `route`";
    $result= mysqli_query($connection,$select_query);
    ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Routes</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" >

</head>
</head> 
<style>
    form{
        text-align:center;
        margin-bottom:20px;
    }
    html{
        font-size:15px;
    }
    body{
        background-color:#F7EEDD;
    }
</style>
<body>
<?php include('navbar.php')?>
<section class="py-3 py-md-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
        <div class="card border border-light-subtle rounded-3 shadow-sm">
          <div class="card-body p-3 p-md-4 p-xl-5">
            <h2 class="fs-6 fw-normal text-center text-secondary mb-4">Schedules</h2>
            <form action="schedule.php" method="POST">
              <div class="row gy-2 overflow-hidden">
                <div class="col-12">
                  <div class="form-floating mb-3">
    <label>Select the preferred route : </label>
    <select name="route_id">
    <?php
    while($row = mysqli_fetch_array($result)) 
    {
        echo"<option value=".$row['route_id'].">".$row['from']."---".$row['to']."</option>";
    }?>
    </select><br><br>
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

