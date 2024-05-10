<?php
// Include config file
session_start();
$connection=mysqli_connect("localhost:3308","root","","transport"); 

// Define variables and initialize with empty values
$veh_reg_no = $driver_name = $driver_joindate = $mobile = $age = $licensce_no = "";
$veh_reg_no_err = $driver_name_err = $driver_joindate_err = $mobile_err = $age_err = $licensce_no_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate veh_reg_no
    $input_veh_reg_no = trim($_POST["veh_reg_no"]);
    if(empty($input_veh_reg_no)){
        $veh_reg_no_err = "Please enter a vehicle registration number.";
    } else{
        $veh_reg_no = $input_veh_reg_no;
    }
    /////////////////////
    $input_driver_joindate = trim($_POST["driver_joindate"]);
    if(empty($input_driver_joindate)){
        $driver_joindate_err = "Please enter a driver join date.";
    } else{
        $driver_joindate = $input_driver_joindate;
    }
    //////////////////////
    $input_driver_name = trim($_POST["driver_name"]);
    if(empty($input_driver_name)){
        $driver_name_err = "Please enter a driver name.";
    } else{
        $driver_name = $input_driver_name;
    }
    //////////////////////
    $input_mobile = trim($_POST["mobile"]);
    if(empty($input_mobile)){
        $mobile_err = "Please enter a driver mobile no.";
    } else{
        $mobile = $input_mobile;
    }
    //////////////////////
    $input_age= trim($_POST["age"]);
    if(empty($input_age)){
        $age_err = "Please enter a driver age.";
    } else{
        $age = $input_age;
    }
    //////////////////////
    $input_licensce_no= trim($_POST["licensce_no"]);
    if(empty($input_licensce_no)){
        $licensce_no_err = "Please enter a driver licensce no.";
    } else{
        $licensce_no = $input_licensce_no;
    }


    // Check input errors before inserting in database
    if(empty($veh_reg_no_err) && empty($driver_name_err) && empty($driver_joindate_err) && empty($mobile_err) && empty($age_err) && empty($licensce_no_err)){
        // Prepare an update statement
        $sql = "UPDATE vehicle SET veh_reg_no=?, driver_name=?, driver_joindate=?, mobile=?, age=?, licensce_no=? WHERE veh_id=?";
        
        if($stmt = mysqli_prepare($connection, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssssi", $param_veh_reg_no, $param_driver_name, $param_driver_joindate, $param_mobile, $param_age, $param_licensce_no, $param_id);
            
            // Set parameters
            $param_veh_reg_no = $veh_reg_no;
            $param_driver_name = $driver_name;
            $param_driver_joindate = $driver_joindate;
            $param_mobile = $mobile;
            $param_age = $age;
            $param_licensce_no = $licensce_no;
            $param_id = trim($_POST["veh_id"]);
            
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
    if(isset($_GET["veh_id"]) && !empty(trim($_GET["veh_id"]))){
        // Get URL parameter
        $id =  trim($_GET["veh_id"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM vehicle WHERE veh_id = ?";
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
                    $veh_reg_no = $row["veh_reg_no"];
                    $driver_name = $row["driver_name"];
                    $driver_joindate = $row["driver_joindate"];
                    $mobile = $row["mobile"];
                    $age = $row["age"];
                    $licensce_no = $row["licensce_no"];
                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    echo "<script>alert('Sorry! Your request is invalid');</script>";
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
    <title>Update Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" >
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- Include the jQuery UI library for the date picker -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    
    
    
    <style>
    .wrapper{
            width: 600px;
            margin: 0 auto;
        }
        #driver_joindate{
            background-color:white;
        }
        body{
            background-color:#DBAFA0;
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
            <h2 class="fs-6 fw-normal text-center text-secondary mb-4">Enter Vehicle Details</h2>
            <form action="#" method="POST">
              <div class="row gy-2 overflow-hidden">
                <div class="col-12">
                  <div class="form-floating mb-3">
                    <div class="col-12">
                  <div class="form-floating mb-3">
                            <label>Vehicle Registration Number</label>
                            <input type="text" name="veh_reg_no" class="form-control" value="<?php echo $veh_reg_no; ?>" required>
                        </div></div>
                        <div class="col-12">
                  <div class="form-floating mb-3">
                                                <label>Driver Name</label>
                            <input type="text" name="driver_name" class="form-control" value="<?php echo $driver_name; ?> "required>
                        </div></div>
                        <div class="col-12">
                  <div class="form-floating mb-3">
                            <label>Driver Join Date</label>
                            <input type="text" name="driver_joindate" id="driver_joindate" class="form-control" value="<?php echo trim($driver_joindate); ?>" readonly required>
                        </div></div>

                        <script>
                      $("#driver_joindate").datepicker({
                          dateFormat: 'yy-mm-dd',
                          onSelect: function(dateText, inst) {
                              $(inst).val(dateText); // Write the value in the input
                          }

                      });
                      // Code below to avoid the classic date-picker
                      $("#driver_joindate").on('click', function() {
                          return false;
                      });
                      </script>


                        <div class="col-12">
                  <div class="form-floating mb-3">
                            <label>Mobile</label>
                            <input type="text" name="mobile" class="form-control" value="<?php echo $mobile; ?> "required>
                        </div></div>
                        <div class="col-12">
                  <div class="form-floating mb-3">
                            <label>Age</label>
                            <input type="text" name="age" class="form-control" value="<?php echo $age; ?> "required>
                        </div></div>
                        <div class="col-12">
                  <div class="form-floating mb-3">
                            <label>License Number</label>
                            <input type="text" name="licensce_no" class="form-control" value="<?php echo $licensce_no; ?> "required>
                        </div></div>
                        <input type="hidden" name="veh_id" value="<?php echo $_GET['veh_id']; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="admin.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
    <br><br>
</body>
</html>