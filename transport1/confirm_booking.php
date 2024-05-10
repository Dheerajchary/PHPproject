<?php 
if(!isset($_SESSION)) 
{   
    session_start(); 
} 
        $booking_id = $_GET['booking_id'];

        $connection= mysqli_connect('localhost:3308','root','','transport');
        $query = "update `booking` set `status` = 1 where `booking_id`='$booking_id'";
        if($_SESSION['username']=="admin"){
            if (mysqli_query($connection, $query)) {
                header("Location: bookingcrud.php");
            } else {
                echo "Error confirm booking: " . mysqli_error($connection);
            }
        }
        else{
        if (mysqli_query($connection, $query)) {
            header("Location: mybooking.php?username=" . $_SESSION['username']);
        } else {
            echo "Error confirm booking: " . mysqli_error($connection);
        }
    }
?>
