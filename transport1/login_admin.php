<?php 
    session_start();
    $connection=mysqli_connect("localhost:3308","root","","transport"); 
    
    $msg="";
    if(isset($_POST['submit'])){
        $username=mysqli_real_escape_string($connection,strtolower($_POST['username']));
        
        $password=mysqli_real_escape_string($connection,$_POST['password']); 
        
        $login_query="SELECT * FROM `admin` WHERE username='$username' and password='$password'";
        
        $login_res=mysqli_query($connection,$login_query);
        if(mysqli_num_rows($login_res)>0){ 
            $_SESSION['username']=$username;
            header('Location:admin.php');
        } 
        else{
          echo "<script>alert('Incorrect Credentials!');</script>";

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

    <style>body{
  background-color:#7F9F80;
}</style>
</head>
  <?php include 'navbar.php'; ?>
  <section class="py-3 py-md-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
        <div class="card border border-light-subtle rounded-3 shadow-sm">
          <div class="card-body p-3 p-md-4 p-xl-5">
            <h2 class="fs-6 fw-normal text-center text-secondary mb-4">Enter Admin Credentials</h2>
            <form action="#" method="post">
              <div class="row gy-2 overflow-hidden">
                <div class="col-12">
                  <div class="form-floating mb-3"><br>
                  <input id="username" type="text" class="form-control" name="username" placeholder="Username">
                </div>
                </div>
                
                <div class="col-12">
                  <div class="form-floating mb-3">
                  <input id="password" type="password" class="form-control" name="password" placeholder="Password">
                </div>
                </div>
                
                <div class="col-12">
                  <div class="d-grid my-3">
                  <button type="submit" name="submit" class="btn btn-success">Log in</button>
                  <a href="login.php" class="btn btn-secondary ml-2">Cancel</a>
                  </div>
                
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</html>
    
   
    
</body>
</html>