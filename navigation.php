<?php

if(session_status() === PHP_SESSION_NONE) session_start();

//need to handle for admin **not yet

if(isset($_SESSION['logged_in']) == TRUE && isset($_SESSION['user_id'])) { ?>
    <!-- Logged in navbar html for user goes here -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <a class="navbar-brand" href="index.php"><img class="logo" src="images/um-logo.png" width="120"
                        alt="logo"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                    aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" style="justify-content: flex-end;" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-item nav-link normal-link" href="index.php#about-us">About Us</a>
                        <a class="nav-item nav-link normal-link" href="events.php">Events</a>
                        <a class="nav-item nav-link normal-link" href="jobs.php">Jobs</a>
                        <a class="nav-item nav-link normal-link" href="alumni.php">Alumni</a>
                        <a class="nav-item nav-link normal-link" href="#footer">Contact Us</a>

                        <div id="control" class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="profile-picture" src="./images/avatar-2.png" alt="profile picture">
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="profile.php">Your profile</a>
                                <a class="dropdown-item" href="edit_profile.php">Edit profile</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="add_jobs.php">Your Jobs Ads</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php">Log out</a>
                            </div>
                        </div>

                        <a id="control-lg" class="nav-item nav-link normal-link" href="profile.php">Your profile</a>
                        <a id="control-lg" class="nav-item nav-link normal-link" href="edit_profile.php">Edit profile</a>
                        <a id="control-lg" class="nav-item nav-link normal-link" href="add_jobs.php">Your Job Ads</a>
                        <a id="control-lg" class="nav-item nav-link normal-link" href="logout.php">Log out</a>

                    </div>

                </div>
            </div>
        </nav>
    </header>

<?php
} elseif(isset($_SESSION['logged_in']) == TRUE && isset($_SESSION['admin_id'])) { ?>  
    <!-- Logged in navbar html for admin goes here -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <a class="navbar-brand" href="index.php"><img class="logo" src="images/um-logo.png" width="120"
                        alt="logo"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                    aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" style="justify-content: flex-end;" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-item nav-link normal-link" href="index.php#about-us">About Us</a>
                        <a class="nav-item nav-link normal-link" href="events.php">Events</a>
                        <a class="nav-item nav-link normal-link" href="jobs.php">Jobs</a>
                        <a class="nav-item nav-link normal-link" href="alumni.php">Alumni</a>
                        <a class="nav-item nav-link normal-link" href="#footer">Contact Us</a>
                        <a class="nav-item nav-link register-btn" href="logout.php">Log out</a>
                    </div>

                </div>
            </div>
        </nav>
    </header>

<?php 
} else { ?>
    <!-- Not logged in navbar html goes here -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <a class="navbar-brand" href="index.php"><img class="logo" src="images/um-logo.png" width="120" alt="logo"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" style="justify-content: flex-end;" id="navbarNavAltMarkup">
                <div class="navbar-nav">

                    <a class="nav-item nav-link normal-link" href="index.php#about-us">About Us</a>
                    <a class="nav-item nav-link normal-link" href="events.php">Events</a>
                    <a class="nav-item nav-link normal-link" href="jobs.php">Jobs</a>
                    <a class="nav-item nav-link normal-link" href="alumni.php">Alumni</a>
                    <a class="nav-item nav-link normal-link" href="#footer">Contact Us</a>
                    <a class="nav-item nav-link normal-link" href="signin.php">Sign In</a>
                    <a class="nav-item nav-link register-btn" href="signup.php">Sign Up</a>

                    
                </div>
    
                </div>
            </div>
        </nav>
    </header>
<?php
}

?>