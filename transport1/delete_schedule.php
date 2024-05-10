<?php 
if(!isset($_SESSION)) 
{   
    session_start(); 
} 
        $schedule_id= $_GET['schedule_id'];

        $connection= mysqli_connect('localhost:3308','root','','transport');
        $query = "DELETE FROM `schedule` WHERE `schedule_id` = '$schedule_id'";

        if (mysqli_query($connection, $query)) {
            echo "<script>alert('Schedule Deleted Successfully'); 
            window.location.href='admin_cards.php';</script>";        
        } else {
            echo "Error deleting Schedule: " . mysqli_error($connection);
        }
    
?>
