<nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="pending.php"><img class="logo" src="images/um-logo.png" width="175"  alt="logo"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
      
        <div class="collapse navbar-collapse" style="justify-content: flex-end;" id="navbarNavAltMarkup">
            <ul class="navbar-nav">
                <li class="nav-item ">
                    <a class="nav-link other" href="pending.php">Account Control</a>
                </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle other" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Events
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="add_event.php">New Event</a>
                <a class="dropdown-item" href="edit_event.php">Edit Event</a>
            </li>
            <?php if(isset($_SESSION['logged_in'])) { ?>
            <li class="nav-item" id="control">
                <a class="nav-link logout-btn other" href="logout.php">Log Out</a>
            </li>
            
            <li class="nav-item" id="control-lg">
                <a class="nav-link other" href="logout.php">Log Out</a>
            </li>
            <?php } ?>
        </ul>
        </div>
    
    </nav>