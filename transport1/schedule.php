<?php
  session_start();
  $connection= mysqli_connect('localhost:3308','root','','transport');
  if(isset($_GET['route_id'])){
  $route_id=$_GET['route_id'];}
  else{
    $route_id=$_POST['route_id'];
  }
  $select_query="SELECT * FROM `schedule` WHERE `route_id` = $route_id ORDER BY `first_bus` ";
  $result= mysqli_query($connection,$select_query);
    
?>

<!DOCTYPE html>   
<html lang="en">   
<head>   
<meta charset="utf-8">   
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" >

    <style>
    #myTable td,th{
        text-align: center;
        vertical-align: middle;
    }
    </style>
  </head>
<?php include 'navbar.php';?>  
<h3 class="mt-5 text-center">Bus Schedule</h3><br><br>
<div class="container">
<div class="col-md-12">

<table id="myTable" class="table table-bordered table-striped table-hover table-condensed" >  
<thead>  
          <tr>  
            <th>STOP NAME</th>  
            <th>FIRST</th>  
            <th>SECOND</th>  
            <th>THIRD</th>  
          </tr>  
        </thead>  
       <tbody>  
        <?php
       while($row = mysqli_fetch_array($result)) 
       {
        echo '<tr>';
        echo '<td>' . $row['stop_name'] . '</td>';
        echo '<td>' . $row['first_bus'] . '</td>';
        echo '<td>' . $row['second_bus'] . '</td>';
        echo '<td>' . $row['third_bus'] . '</td>';
        echo '</tr>';
    }?>
          
        </tbody>  

</table>
	  </div>
      <div class="container mb-5">
        <div class="text-center">
            <?php if(isset($_SESSION['username'])==true) { 
              ?>
            <a class="btn btn-success text-centre" style="text-align: center" href="booking.php">Book a Vehicle</a>
            
            <?php } else{  ?>
            <a class="btn btn-success text-centre" style="text-align: center" href="login.php">Login To Book A Vehicle</a> 
            <?php } ?>
            </div>
            </div>

</body>  

</html>