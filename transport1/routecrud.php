<?php 
    if(!isset($_SESSION)) 
    {   
        
        session_start(); 
    } 
    
    //$username= $_GET['username'];   
    $connection= mysqli_connect('localhost:3308','root','','transport');
    $query= "SELECT  * FROM route";

    $result= mysqli_query($connection,$query);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Routes</title>
    
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
    <?php include 'navbar_admin.php'; ?>
    <form action="newroute.php" method="POST">
    <div class="d-flex justify-content-end">
    <input type="submit" class="btn btn-success" value="Add new Route" style="margin-top: 10px; margin-right: 10px;">
    </div>

    </form>
    <div class="container">
                <h1 class="text-center">Existing Routes</h1><br>
    
        
        
        <div class="col-md-12">
        <table id="myTable" class="table table-bordered table-striped table-hover table-condensed" >  
                <thead>
                    <tr>
                        <th>Route name</th>
                        <th>PickUp Point </th>
                        <th>Drop Point</th>
                        <th>Action</th>

                    </tr>  
                </thead>

                <tbody>
                <?php
if($result){
    while($row=mysqli_fetch_assoc($result)) {                
?>
    <tr>
        <td><?php echo $row['route_name']; ?></td>
        <td><?php echo $row['from']; ?></td>
        <td><?php echo $row['to']; ?></td>

        <td>
        <a href="delete_route.php?route_id=<?php echo $row['route_id']; ?>" class="btn btn-danger">Delete</a>
        <a href="update_route.php?route_id=<?php echo $row['route_id']; ?>" class="btn btn-info">Update</a>

        </td>
    </tr>                 
<?php } }?>
            </table>
        </div>
    </div>
</body>
</html>