<?php
// Include config file
session_start();
$connection=mysqli_connect("localhost:3308","root","","transport"); 

// Define variables and initialize with empty values
$name = $book_date = $pickup_point  =$destination=$mobile=$email= "";
$name_err = $book_date_err = $pickup_point_err  =$destination_err=$mobile_err=$email_err="";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $name_err = "Please enter a vehicle registration number.";
    } else{
        $name = $input_name;
    }
    /////////////////////
    $input_pickup_point = trim($_POST["pickup_point"]);
    if(empty($input_pickup_point)){
        $pickup_point_err = "Please enter a driver join date.";
    } else{
        $pickup_point = $input_pickup_point;
    }
    //////////////////////
    $input_book_date = trim($_POST["book_date"]);
    if(empty($input_book_date)){
        $book_date_err = "Please enter a  name.";
    } else{
        $book_date = $input_book_date;
    }

        //////////////////////
        $input_destination = trim($_POST["destination"]);
        if(empty($input_destination)){
            $destination_err = "Please enter a  destination .";
        } else{
            $destination = $input_destination;
        }
                //////////////////////
                $input_mobile = trim($_POST["mobile"]);
                if(empty($input_mobile)){
                    $mobile_err = "Please enter mobile no.";
                } else{
                    $mobile = $input_mobile;
                }
                    //////////////////////
                    $input_email = trim($_POST["email"]);
                    if(empty($input_email)){
                        $email_err = "Please enter email.";
                    } else{
                        $email = $input_email;
                    }


    // Check input errors before inserting in database
    if(empty($name_err) && empty($book_date_err) && empty($pickup_point_err)  && empty($destination_err) && empty($mobile_err) && empty($email_err) ){
        // Prepare an update statement
        $sql = "UPDATE booking SET name=?, book_date=?, pickup_point=?,destination=?,mobile=?,email=? WHERE booking_id=?";
        
        if($stmt = mysqli_prepare($connection, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssssi", $param_name, $param_book_date, $param_pickup_point, $param_destination,$param_mobile,$param_email,$param_id);
            
            // Set parameters
            $param_name = $name;
            $param_book_date = $book_date;
            $param_pickup_point = $pickup_point;
            $param_destination = $destination;
            $param_mobile = $mobile;
            $param_email = $email;
            $param_id = trim($_POST["booking_id"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
                header("location: home.php");
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
    if(isset($_GET["booking_id"]) && !empty(trim($_GET["booking_id"]))){
        // Get URL parameter
        $id =  trim($_GET["booking_id"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM booking WHERE booking_id = ?";
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
                    $name = $row["name"];
                    $book_date = $row["book_date"];
                    $pickup_point = $row["pickup_point"];
                    $destination = $row["destination"];
                    $mobile = $row["mobile"];
                    $email = $row["email"];

                    
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
        body{background-color:#96C291;}
    </style>
</head>
<?php include('navbar.php')?>
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
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $name; ?>" pattern="[A-Za-z0-9_]+" required>
                        </div></div>
                        <div class="col-12">
                  <div class="form-floating mb-3">
                            <label>Date</label>
                            <input type="text" name="book_date" id="book_date" class="form-control" value="<?php echo $book_date; ?>" required>
                        </div></div> 
                        
                        <script>
                      $("#book_date").datepicker({
                          dateFormat: 'yy-mm-dd',
                          onSelect: function(dateText, inst) {
                              $(inst).val(dateText); // Write the value in the input
                          },minDate:0

                      });
                      // Code below to avoid the classic date-picker
                      $("#book_date").on('click', function() {
                          return false;
                      });
                      </script>




                        <div class="col-12">
                  <div class="form-floating mb-3">
                            <label>Pickup Point</label>
                            <input type="text" name="pickup_point" class="form-control" value="<?php echo $pickup_point; ?>" pattern="[A-Za-z0-9_]+" required>
                        </div></div>                        


                  
                        
                        <div class="col-12">
                  <div class="form-floating mb-3">
                            <label>Destination</label>
                            <input type="text" name="destination" class="form-control" value="<?php echo $destination; ?>" pattern="[A-Za-z0-9_]+" required>
                        </div></div>                        
                        <div class="col-12">
                  <div class="form-floating mb-3">
                            <label>Mobile No</label>
                            <input type="tel" name="mobile" class="form-control" value="<?php echo $mobile; ?>" pattern="^[6-9]{1}[0-9]{9}$" required>
                        </div></div>
                        <div class="col-12">
                  <div class="form-floating mb-3">
                            <label>Email Id</label>
                            <input type="email" name="email" class="form-control" value="<?php echo $email; ?>" pattern="[a-z0-9]+@[a-z]+\.[a-z]{3,}$" required>
                        </div></div>
                        <div class="col-12">
                  <div class="d-grid my-3">
                        <input type="hidden" name="booking_id" value="<?php echo $_GET['booking_id']; ?>"/>
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