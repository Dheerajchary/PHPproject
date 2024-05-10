<?php 
if(!isset($_SESSION)) 
{   
    session_start(); 
} 
        $booking_id = $_GET['booking_id'];

        $connection= mysqli_connect('localhost:3308','root','','transport');
        $query = "DELETE FROM `booking` WHERE `booking_id` = '$booking_id'";
        if($_SESSION['username']=="admin"){
            if (mysqli_query($connection, $query)) {
                header("Location: bookingcrud.php");
            } else {
                echo "Error deleting booking: " . mysqli_error($connection);
            }
        }
        else{
        if (mysqli_query($connection, $query)) {
            header("Location: mybooking.php?username=" . $_SESSION['username']);
        } else {
            echo "Error deleting booking: " . mysqli_error($connection);
        }
    }
?>
