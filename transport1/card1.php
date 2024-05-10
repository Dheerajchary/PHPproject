<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    $connection= mysqli_connect('localhost:3308','root','','transport');

    if(isset($_SESSION['username'])){
        $username= $_SESSION['username'];
    
        $query= "SELECT COUNT(veh_id) AS count FROM `vehicle`";
        $result= mysqli_query($connection,$query);
    
        if($row = mysqli_fetch_assoc($result)) {
            $count = $row['count'];
            echo  $count;
        }
    } else {
        header('Location: login.php');
        exit();
    }
?>
