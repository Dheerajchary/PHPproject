<?php
// Include config file
session_start();
$connection=mysqli_connect("localhost:3308","root","","transport"); 

// Define variables and initialize with empty values
$stop_name = $first_bus = $second_bus = $third_bus= "";
$stop_name_err = $first_bus_err = $second_bus_err = $third_bus_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate stop_name
    $input_stop_name = trim($_POST["stop_name"]);
    if(empty($input_stop_name)){
        $stop_name_err = "Please enter a vehicle registration number.";
    } else{
        $stop_name = $input_stop_name;
    }
    /////////////////////
    $input_second_bus = trim($_POST["second_bus"]);
    if(empty($input_second_bus)){
        $second_bus_err = "Please enter a driver join date.";
    } else{
        $second_bus = $input_second_bus;
    }
    //////////////////////
    $input_first_bus = trim($_POST["first_bus"]);
    if(empty($input_first_bus)){
        $first_bus_err = "Please enter a driver name.";
    } else{
        $first_bus = $input_first_bus;
    }
    //////////////////////
    $input_third_bus = trim($_POST["third_bus"]);
    if(empty($input_third_bus)){
        $third_bus_err = "Please enter a driver third_bus no.";
    } else{
        $third_bus = $input_third_bus;
    }
    


    // Check input errors before inserting in database
    if(empty($stop_name_err) && empty($first_bus_err) && empty($second_bus_err) && empty($third_bus_err) ){
        // Prepare an update statement
        $sql = "UPDATE schedule SET stop_name=?, first_bus=?, second_bus=?, third_bus=? WHERE schedule_id=?";
        
        if($stmt = mysqli_prepare($connection, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssi", $param_stop_name, $param_first_bus, $param_second_bus, $param_third_bus,$param_id);
            
            // Set parameters
            $param_stop_name = $stop_name;
            $param_first_bus = $first_bus;
            $param_second_bus = $second_bus;
            $param_third_bus = $third_bus;
            
            $param_id = trim($_POST["schedule_id"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
                header("location: admin_cards.php");
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
    if(isset($_GET["schedule_id"]) && !empty(trim($_GET["schedule_id"]))){
        // Get URL parameter
        $id =  trim($_GET["schedule_id"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM schedule WHERE schedule_id = ?";
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
                    $stop_name = $row["stop_name"];
                    $first_bus = $row["first_bus"];
                    $second_bus = $row["second_bus"];
                    $third_bus = $row["third_bus"];
                    
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
    <title>Update Schedule</title>
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
        body{background-color:#B9B4C7;}
    </style>
</head>
<?php include('navbar_admin.php')?>
<section class="py-3 py-md-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
        <div class="card border border-light-subtle rounded-3 shadow-sm">
          <div class="card-body p-3 p-md-4 p-xl-5">
            <h2 class="fs-6 fw-normal text-center text-secondary mb-4">Enter Schedule Details</h2>
            <form action="#" method="POST">
              <div class="row gy-2 overflow-hidden">
                <div class="col-12">
                  <div class="form-floating mb-3">
                    <div class="col-12">
                  <div class="form-floating mb-3">
                            <label>Stop Name</label>
                            <input type="text" name="stop_name" class="form-control" value="<?php echo $stop_name; ?>" pattern="[a-zA-Z0-9_]+" required>
                        </div></div>
                        <div class="col-12">
                  <div class="form-floating mb-3">
                            <label>First Bus</label>
                            <input type="time" name="first_bus" class="form-control" value="<?php echo trim($first_bus); ?>"required>
                        </div></div>
                        <div class="col-12">
                  <div class="form-floating mb-3">
                            <label>Second Bus</label>
                            <input type="time" name="second_bus" class="form-control" value="<?php echo trim($second_bus); ?>" required>
                        </div></div>

                        <div class="col-12">
                  <div class="form-floating mb-3">
                            <label>Third bus</label>
                            <input type="time" name="third_bus" class="form-control" value="<?php echo trim($third_bus); ?>"required>
                        </div></div>
                        <div class="col-12">
                  <div class="d-grid my-3">
                        <input type="hidden" name="schedule_id" value="<?php echo $_GET['schedule_id']; ?>"/>
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