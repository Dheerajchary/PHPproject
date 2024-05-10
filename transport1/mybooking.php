<?php 
    if(!isset($_SESSION)) 
    {   
        
        session_start(); 
    } 
    
    $username= $_GET['username'];   
    $connection= mysqli_connect('localhost:3308','root','','transport');
    $query= "SELECT  * FROM `booking` WHERE username='$username'";

    $result= mysqli_query($connection,$query);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bookings</title>
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
    <h1 class="text-center mt-5">My Bookings</h1>
    <div class="col-md-12">
    <table id="myTable" class="table table-bordered table-striped table-hover table-condensed mt-4" > 
             <thead>
                    <tr>
                        <th>Travel Date</th>
                        <th>Pick Up</th>
                        <th>Destination</th>
                        <th>Mobile no</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>  
                </thead>

                <tbody>
                <?php
if($result){
    while($row=mysqli_fetch_assoc($result)) {                
?>
    <tr>
        <td><?php echo $row['book_date']; ?></td>
        <td><?php echo $row['pickup_point']; ?></td>
        <td><?php echo $row['destination']; ?></td>
        <td><?php echo $row['mobile']; ?></td>
        <td>
                <?php 
                if($row['status']==1){
                    echo "confirmed";          
                }
                else{
                    echo "Waiting for confirmation";                }
                ?>
            </td>
        <td>
            <a href="delete_booking.php?booking_id=<?php echo $row['booking_id']; ?>" class="btn btn-danger">Delete</a>
            <a href="update_booking.php?booking_id=<?php echo $row['booking_id']; ?>" class="btn btn-info">Edit</a>

        </td>
    </tr>                 
<?php } }?>
            </table>
        </div>
    </div>
</body>
</html>