<?php if(!isset($_SESSION)) 
    {   
        
        session_start(); 
    } ?>
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
     #myTable td,th{
        text-align: center;
        vertical-align: middle;
    }
    </style>
</head>
<body>
<body>

    <?php include 'navbar.php'; ?>
    <div class="container">
    <div class="col-md-12">
    <table id="myTable" class="table table-bordered table-striped table-hover table-condensed mt-4" > 
<?php

    
    if(isset($_SESSION['username']))
    {
    $username= $_SESSION['username'];
    $connection= mysqli_connect('localhost:3308','root','','transport');
    $insert_query = "SELECT * FROM booking WHERE username='$username' AND book_date >= CURDATE() and `status`=1";
    $res= mysqli_query($connection,$insert_query);
    
    if($res){
?>
        <div class="container mt-5">        
        <div class="col-md-12">
        <h3 class="text-center"> Dear Customer your Confirmed Journey Details Given below</h3>

        <table id="myTable" class="table table-bordered table-striped table-hover table-condensed mt-4"> 
        <thead>
               <tr>
                   <th>Travel Date</th>
                   <th>Pick Up</th>
                   <th>Destination</th>
                   <th>Mobile no</th>
               </tr>  
           </thead>

           <tbody>
           <?php

while($row=mysqli_fetch_assoc($res)) {                
?>
<tr>
   <td><?php echo $row['book_date']; ?></td>
   <td><?php echo $row['pickup_point']; ?></td>
   <td><?php echo $row['destination']; ?></td>
   <td><?php echo $row['mobile']; ?></td>
</tr>                 
<?php } ?>
       </table>
       
<?php
    } else {
        die('unsuccessful' .mysqli_error($connection));
    }
}?>
</html>
