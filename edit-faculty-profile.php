<?php
   include('faculty-session.php');
?>

<html>
    <head>
        <title>Faculty Profile - WebAES for Faculties</title>
        <meta charset='UTF-8'>
        <link rel='stylesheet' type='text/css' href='style.css'>
        <link href='https://fonts.googleapis.com/css?family=Open Sans' rel='stylesheet'>
    </head>
    <body>
        <header class='header'>
            <h2><a class='header-link' href='faculty-home.php'>WebAES for Faculties</a></h2>
        </header>
        <div class='welcome'>
            <h4 class='align-right'>Welcome, <?php echo $login_session; ?> &emsp; <a href='logout.php'>Log Out</a> &emsp; <a href='faculty-home.php'>Home</a></h4>
        </div>
        <div class='main-content'>
            <div class='edit-profile-form'>
                <h2 class="align-center">Edit Your Profile</h2><br>
                <hr>
                <form action='update-faculty-profile.php' method='POST'>
                    <label for='email'><b>Email ID:</b></label>
                    <input type='email' name='email' autocomplete='off' required>
                    <br>
                    <label for='mobile'><b>Mobile:</b></label>
                    <input type='tel' name='mobile' autocomplete='off' required>
                    <br>
                    <p class='align-center'><input style='width: 20%;' type='submit' name='submit', value='Edit Profile'></p>
                </form>
            </div>
        </div>
    </body>
</html>