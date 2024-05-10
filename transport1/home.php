<?php 
    $connection=mysqli_connect("localhost:3308","root","","transport");

    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Shuttle management system</title>    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" >

  <link rel="stylesheet" href="style.css">
  <style>
</style>
<?php include 'navbar.php'?>
    
  <div class="container mt-5">  
    <h1 class="text-center mt-5 mb-5" style="font-family:poppins;font-weight:bold;">Quick Shuttle Services</h1>
 

<div id="carouselExampleCaptions" class="carousel slide">
    <div class="carousel-inner">
      <div class="carousel-item active">
      <img src="img1.jpg" class="d-block w-100" alt="..." height="500">
        <div class="carousel-caption d-none d-md-block">
          <p class="h1" style="font-weight:bolder;color:white;backdrop-filter: blur(5px);width:fit-content;margin:auto;">Affordable</p>
          <p style="font-weight:bolder;color:white;backdrop-filter: blur(5px);width:fit-content;margin:auto;">Experience Uncompromised Quality at a Price That Doesn&apos;t Break the Bank</p>
 
        </div>
      </div>
      <div class="carousel-item">
      <img src="img2.jpg" class="d-block w-100" alt="..." height="500">
        <div class="carousel-caption d-none d-md-block">
          <p class="h1" style="font-weight:bolder;color:white;backdrop-filter: blur(5px);width:fit-content;margin:auto;">Safest</p>
          <p style="font-weight:bolder;color:white;backdrop-filter: blur(5px);width:fit-content;margin:auto;">We Prioritize Your Safety Above All Else</p>

 
        </div>
      </div>
      <div class="carousel-item">
      <img src="img3.jpg" class="d-block w-100" alt="..." height="500">
        <div class="carousel-caption d-none d-md-block">
        <p class="h1" style="font-weight:bolder;color:white;backdrop-filter: blur(5px);width:fit-content;margin:auto;">Timely</p>
          <p style="font-weight:bolder;color:white;backdrop-filter: blur(5px);width:fit-content;margin:auto;">We value Your Time as Much as You Do</p>

              
              
 
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden"></span>
    </button>
  </div><br><br>








    
</div>
    <div class="container" id="middle">
  <div class="row align-items-center justify-content-center" style="height: 80vh;">
    <div class="col-6 mx-auto" >
      <div class="text-center">
      <h3>Bored of your daily morning journeys ? </h3>
            <p>Your daily Commute made easy </p>
            
            <?php if(isset($_SESSION['username'])==true) { ?>
            <a class="btn btn-success btn-lg" style="text-align: center" href="cards.php">Book a shuttle</a>
            
            <?php } else{  ?>
            <a class="btn btn-success" style="text-align: center" href="login.php">Click here to book a shuttle</a> 
            <?php } ?>        </div>

    </div>
  </div>
</div>
</body>
<?php include 'footer.php';?>

</html>
