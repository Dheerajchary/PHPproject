<?php  
    if(isset($_SESSION['username'])==false) {        
?>  
   <nav class="navbar navbar-expand-lg navbar-light" style="background-color:#5E1675;">
    <a class="navbar-brand" href="#" style="font-family:italic;color: white;font-size:1.5rem;">QSS</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li><a class="nav-link" href="home.php" style="color: white;"><i class="fas fa-home"></i> Home</a></li>
            <li><a class="nav-link" href="cards.php" style="color: white;"><i class="fas fa-road"></i> Routes</a></li>
        </ul>
        <ul class="nav navbar-nav ml-auto">
            <li><a class="nav-link" href="signup.php" style="color: white;"><i class="fas fa-user-plus"></i> Sign Up</a></li>
            <li><a class="nav-link" href="login.php" style="color: white;"><i class="fas fa-sign-in-alt"></i> Login</a></li>
        </ul>
    </div> 
</nav>

   
    <?php } else { ?> 

      <nav class="navbar navbar-expand-lg navbar-light" style="background-color:#5E1675;">
    <a class="navbar-brand" href="#" style="font-family:italic;color: white;font-size:1.5rem;">QSS</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">

                <li><a class="nav-link" href="home.php" style="color: white;"><i class="fas fa-home"></i> Home</a></li>
                <li><a class="nav-link" href="cards.php" style="color: white;"><i class="fas fa-list-alt"></i> Schedule</a></li>
                <li><a class="nav-link" href="mybooking.php?username=<?php echo $_SESSION['username']; ?>" style="color: white;font-size: 1rem;"><i class="fa-solid fa-list"></i> My Bookings</a></li>
                <li><a class="nav-link" href="booking.php" style="color: white;"><i class="fa-solid fa-user-plus"></i>New Booking</a></li>
                <li><a class="nav-link" href="booking_update.php" style="color: white;"><i class="fas fa-calendar-check"></i> Upcoming Journey</a></li>

              </ul>
              <ul class="nav navbar-nav ml-auto">
                <li><a class="nav-link" href="logout.php" style="color: white;"><i class="fas fa-sign-out-alt"></i> Log Out</a></li>
                <li><a class="nav-link" href="#" style="color: white;"><span class="glyphicon glyphicon-log-in"></span><i class="fa-solid fa-user"></i> Welcome <?php echo $_SESSION['username']; ?></a></li>
              </ul>
            </div>   
    </nav> 
    </div>  
    
    <?php } ?>   