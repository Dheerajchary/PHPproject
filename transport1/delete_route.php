<?php 
if(!isset($_SESSION)) 
{   
    session_start(); 
} 
        $route_id = $_GET['route_id'];

        $connection= mysqli_connect('localhost:3308','root','','transport');
        $query = "DELETE FROM `route` WHERE `route_id` = '$route_id'";
            if (mysqli_query($connection, $query)) {
                header("Location: routecrud.php");
            } else {
                echo "Error deleting booking: " . mysqli_error($connection);
            }
        

?>
