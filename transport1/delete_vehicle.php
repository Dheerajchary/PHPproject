<?php 
if(!isset($_SESSION)) 
{   
    session_start(); 
} 
        $veh_id = $_GET['veh_id'];

        $connection= mysqli_connect('localhost:3308','root','','transport');
        $query = "DELETE FROM `vehicle` WHERE `veh_id` = '$veh_id'";

        if (mysqli_query($connection, $query)) {
            echo "alert('Vehicle Deleted Successfully')"; 
            header("Location: vehiclecrud.php");
        } else {
            echo "Error deleting booking: " . mysqli_error($connection);
        }
    
?>
