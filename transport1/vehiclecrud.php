<?php 
    if(!isset($_SESSION)) 
    {   
        
        session_start(); 
    } 
    
    //$username= $_GET['username'];   
    $connection= mysqli_connect('localhost:3308','root','','transport');
    $query= "SELECT  * FROM vehicle";

    $result= mysqli_query($connection,$query);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bill</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" >

    <style>#myTable td,th{
        text-align: center;
        vertical-align: middle;
    }
    </style>
</head>
<body>

    <?php include 'navbar_admin.php'; ?>
    <form action="newvehicle.php" method="POST">
    <div class="d-flex justify-content-end">
    <input type="submit" class="btn btn-success" value="Add new vehicle" style="margin-top: 10px; margin-right: 10px;">
    </div>
    </form><br>
    
    <div class="container">
            <h1 class="text-center">Registered Vehicles</h1>
     <br>


        <div class="col-md-12">
        <table id="myTable" class="table table-bordered table-striped table-hover table-condensed" >  
                <thead>
                    <tr>
                        <th>Vehicle ID</th>
                        <th>Vehicle registration No</th>
                        <th>Driver name</th>
                        <th>Driver joindate</th>
                        <th>Mobile no</th>
                        <th>Age</th>
                        <th>License No</th>
                        <th>Action</th>

                    </tr>  
                </thead>

                <tbody>
                <?php
if($result){
    while($row=mysqli_fetch_assoc($result)) {                
?>
    <tr>
        <td><?php echo $row['veh_id']; ?></td>
        <td><?php echo $row['veh_reg_no']; ?></td>
        <td><?php echo $row['driver_name']; ?></td>
        <td><?php echo $row['driver_joindate']; ?></td>
        <td><?php echo $row['mobile']; ?></td>
        <td><?php echo $row['age']; ?></td>
        <td><?php echo $row['licensce_no']; ?></td>

        <td>
        <a href="delete_vehicle.php?veh_id=<?php echo $row['veh_id']; ?>" class="btn btn-danger">Delete</a>
        <a href="update_vehicle.php?veh_id=<?php echo $row['veh_id']; ?>" class="btn btn-info">Update</a>

        </td>
    </tr>                 
<?php } }?>
            </table>
        </div>
    </div>
</body>
</html>