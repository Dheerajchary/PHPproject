<?php
    session_start();
    $connection= mysqli_connect('localhost:3308','root','','transport');

    $select_query="SELECT * FROM `route`";
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


<style>body{background-color:#B5C0D0;}

</style>
<?php include('navbar_admin.php')?>

    <h1 class="mt-5 text-center">Manage Schedules</h1><br><br>

    <div class="row d-flex justify-content-center ">
    <?php
    while($row = mysqli_fetch_array($result)) 
    {
        echo"
        <div class='card m-4' style='width: 18rem;'>
        <div class='card-body'>
            <h5 class='card-title'></h5>
            <p class='card-text'>". $row['route_name']."</p>
            <p class='card-text'>Start Point : ". $row['from']."</p>
            <p class='card-text'>End Point : " .$row['to']."</p>
            <a href='schedulecrud.php?route_id=".$row['route_id']."' class='btn btn-primary'>Open Schedule</a>        
        </div>
        </div>";
    }?>
    </div>
</body>
</html>
