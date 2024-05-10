<?php
// Include config file
session_start();
$connection=mysqli_connect("localhost:3308","root","","transport"); 

// Define variables and initialize with empty values
$route_name = $from = $to = "";
$route_name_err = $from_err = $to_err  = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate route_name
    $input_route_name = trim($_POST["route_name"]);
    if(empty($input_route_name)){
        $route_name_err = "Please enter a vehicle registration number.";
    } else{
        $route_name = $input_route_name;
    }
    /////////////////////
    $input_to = trim($_POST["to"]);
    if(empty($input_to)){
        $to_err = "Please enter a driver join date.";
    } else{
        $to = $input_to;
    }
    //////////////////////
    $input_from = trim($_POST["from"]);
    if(empty($input_from)){
        $from_err = "Please enter a driver name.";
    } else{
        $from = $input_from;
    }
   

    // Check input errors before inserting in database
    if(empty($route_name_err) && empty($from_err) && empty($to_err) ){
        // Prepare an update statement
        $sql = "UPDATE `route` SET route_name=?, `from`=?, `to`=? WHERE `route_id`=?";
        
        if($stmt = mysqli_prepare($connection, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssi", $param_route_name, $param_from, $param_to,  $param_id);
            
            // Set parameters
            $param_route_name = $route_name;
            $param_from = $from;
            $param_to = $to;
           
            $param_id = trim($_POST["route_id"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
                header("location: admin.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($connection);
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["route_id"]) && !empty(trim($_GET["route_id"]))){
        // Get URL parameter
        $id =  trim($_GET["route_id"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM `route` WHERE `route_id` = ?";
        if($stmt = mysqli_prepare($connection, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            // Set parameters
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
        
                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // Retrieve individual field value
                    $route_name = $row["route_name"];
                    $from = $row["from"];
                    $to = $row["to"];
                   
                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error.php");
                    exit();
                }
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
        
        // Close connection
        mysqli_close($connection);
    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Route</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" >
    <style>
    .wrapper{
            width: 600px;
            margin: 0 auto;
        }
        body{
            background-color:#76ABAE;
        }
    </style>
</head>
<?php include('navbar_admin.php')?>
<section class="py-3 py-md-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
        <div class="card border border-light-subtle rounded-3 shadow-sm">
          <div class="card-body p-3 p-md-4 p-xl-5">
            <h2 class="fs-6 fw-normal text-center text-secondary mb-4">Enter Route Details</h2>
            <form action="#" method="POST">
              <div class="row gy-2 overflow-hidden">
                <div class="col-12">
                  <div class="form-floating mb-3">
                            <label>Route Name</label>
                            <input type="text" name="route_name" class="form-control" value="<?php echo $route_name; ?>" pattern="[a-zA-Z0-9_]+" required>
                            </div>
                </div>                        <div class="col-12">
                  <div class="form-floating mb-3">
                                                <label>Starting Point</label>
                            <input type="text" name="from" class="form-control" value="<?php echo $from; ?> " pattern="[a-zA-Z0-9_]+" required>
                            </div>
                </div>
                        <div class="col-12">
                  <div class="form-floating mb-3">
                            <label>End Point</label>
                            <input type="text" name="to" class="form-control" value="<?php echo $to; ?>" pattern="[a-zA-Z0-9_]+" required>
                            </div>
                </div>

                        <div class="col-12">
                  <div class="d-grid my-3">
                        <input type="hidden" name="route_id" value="<?php echo $_GET['route_id']; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="admin.php" class="btn btn-secondary ml-2">Cancel</a>
                        </div>
                
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>