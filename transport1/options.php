<?php 
   if(!isset($_SESSION)) 
   { 
       session_start(); 
   } 
    if(isset($_POST['route_id'])){
        $route_id = $_POST['route_id'];
        $connection = mysqli_connect('localhost:3308','root','','transport');
        $select_query = "SELECT * FROM `schedule` where `route_id`='$route_id'";
        $result = mysqli_query($connection,$select_query);
    } else {
        echo "route_id is not set";
    }
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
</head>
<div class="col-12">
                  <div class="form-floating mb-3">
                      <span class="input-group-addon"><b>Pickup Point</b></span>
                      
                    <select name="pickup">
                    <?php
                    while($row = mysqli_fetch_array($result)) 
                    {
                        echo"<option value=".$row['from'].">".$row['from']."</option>";
                    }?>
                    </select>
                    </div></div>
                
</html>                        
