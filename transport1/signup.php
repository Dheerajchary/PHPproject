<?php
    $connection=mysqli_connect("localhost:3308","root","","transport");

    session_start();
    $msg="";
    
    if(isset($_POST['submit'])){
        $firstname= mysqli_real_escape_string($connection,strtolower($_POST['firstname']));
        $lastname= mysqli_real_escape_string($connection,strtolower($_POST['lastname']));
        $email= mysqli_real_escape_string($connection,strtolower($_POST['email']));
        $mobile= mysqli_real_escape_string($connection,strtolower($_POST['mobile'])); 
        $username= mysqli_real_escape_string($connection,strtolower($_POST['username']));
        $password= mysqli_real_escape_string($connection,strtolower($_POST['password'])); 
        
        
        $signup_query= "INSERT INTO `user`(`user_id`, `first_name`, `last_name`, `email`, `username`, `password`,`mobile`) VALUES ('','$firstname','$lastname','$email','$username','$password','$mobile')"; 
        
        $check_query= "SELECT * FROM `user` WHERE username='$username' or email='$email'";
        
        $check_res=mysqli_query($connection,$check_query);
        
        if(mysqli_num_rows($check_res)>0){
            echo "<script>alert('Username or Email already Exists!')</script>";
            
        }
        
        else{
            $signup_res= mysqli_query($connection,$signup_query); 
            echo "<script>alert('Success! Your Account added.')</script>";

            
        }
        
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <style>body{
  background-color:#7F9F80;
}</style>
</head>
<body>
<?php include 'navbar.php';
echo $msg;?>  

<section class="py-3 py-md-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
        <div class="card border border-light-subtle rounded-3 shadow-sm">
          <div class="card-body p-3 p-md-4 p-xl-5">
            <h2 class="fs-6 fw-normal text-center text-secondary mb-4">Enter your details</h2>
            <form action="#" method="POST">
              <div class="row gy-2 overflow-hidden">
                <div class="col-12">
                  <div class="form-floating mb-3">
                    <br>

              <label for="firstname" class="form-label">First Name</label>
              <input id="firstname" type="text" class="form-control" name="firstname" pattern="[A-Za-z]+" required>
              </div></div>
              <div class="col-12">
                  <div class="form-floating mb-3">
                  <label for="lastname" class="form-label">Last Name</label>
                  <input id="lastname" type="text" class="form-control" name="lastname" pattern="[A-Za-z]+" required>
                </div>
                </div>

                <div class="col-12">
                  <div class="form-floating mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input id="email" type="email" class="form-control" name="email" pattern="[a-z0-9]+@[a-z]+\.[a-z]{3,}$" required>
                </div>
                </div>

                <div class="col-12">
                  <div class="form-floating mb-3">
                  <label for="mobile" class="form-label">Mobile</label>
                  <input id="mobile" type="tel" class="form-control" name="mobile" pattern="^[6-9]{1}[0-9]{9}$" required>
                </div>
                </div>

                <div class="col-12">
                  <div class="form-floating mb-3">
                  <label for="username" class="form-label">User Name</label>
                  <input id="username" type="text" class="form-control" name="username" pattern="[A-Za-z0-9_]+" required>
                </div>
                </div>

                <div class="col-12">
                  <div class="form-floating mb-3">
                  <label for="password" class="form-label">Password</label>
                  <input id="password" type="password" class="form-control" name="password" pattern="[A-Za-z0-9]+" required>
                </div>
                </div> 
                
                <div class="col-12">
                  <div class="d-grid my-3">
                  <button type="submit" name="submit" class="btn btn-primary">Sign up</button>

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
