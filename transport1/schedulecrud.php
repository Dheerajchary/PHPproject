<?php 
    if(!isset($_SESSION)) 
    {   
        
        session_start(); 
    } 
    
    $route_id= $_GET['route_id']; 
    $connection= mysqli_connect('localhost:3308','root','','transport');
    $query= "SELECT  * FROM schedule where route_id='$route_id' order by first_bus asc";

    $result= mysqli_query($connection,$query);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Stops</title>
    
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

    <?php include 'navbar_admin.php'; ?><br>
    <form action="newschedule.php" method="POST">
    <div class="d-flex justify-content-end">
        <input type="hidden" name="route_id" value="<?php echo $route_id?>">
        <input type="submit" class="btn btn-success" value="Add new Stop" style="margin-top: 10px; margin-right: 10px;">
    </div>

    </form>
    <div class="container">
                <h1 class="text-center">Existing Stops</h1><br>

        
        
        <div class="col-md-12">
        <table id="myTable" class="table table-bordered table-striped table-hover table-condensed" >  
                <thead>
                    <tr>
                    <th>Stop Name</th>  
                    <th>First Bus</th>  
                    <th>Second Bus</th>  
                    <th>Third Bus</th>  
                    <th>Action</th>
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
        echo '<td>';
        echo "<a href='delete_schedule.php?schedule_id=".$row['schedule_id']."' class='btn btn-danger'>Delete</a>";
        echo " ";
        echo "<a href='update_schedule.php?schedule_id=".$row['schedule_id']."' class='btn btn-info'>Update</a>";
        echo "</td>";
        echo '</tr>';
        
?>
<?php } ?>
            </table>
        </div>
    </div>
</body>
</html>