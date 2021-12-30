<?php
   include('student-session.php');
?>

<html>
    <head>
        <title>Home - WebAES for Students</title>
        <meta charset='UTF-8'>
        <link rel='stylesheet' type='text/css' href='css\style.css'>
        <link href='https://fonts.googleapis.com/css?family=Open Sans' rel='stylesheet'>
    </head>
    <body>
        <header class='header'>
            <h2><a class='header-link' href='student-home.php'>WebAES - Student Home</a></h2>
        </header>
        <div class='welcome'>
            <h4 class='align-right'>Welcome, <?php echo $login_session; ?> &emsp; <a href='logout.php'>Log Out</a></h4>
        </div>
        <div class='main-content'>
            <div class='row'>
                <div class='three-column'>
                    <div class='card'>
                        <h4>Available Tests</h4>
                        <hr>
                        <p>View and attempt available tests.</p>
                        <hr>
                        <p class='align-right'><a href='available-tests.php'>Tests</a></p>
                    </div>
                </div>
                <div class='three-column'>
                    <div class='card'>
                        <h4>View Results</h4>
                        <hr>
                        <p>View results for completed tests.</p>
                        <hr>
                        <p class='align-right'><a href='results.php'>Results</a></p>
                    </div>
                </div>
                <div class='three-column'>
                    <div class='card'>
                        <h4>Profile</h4>
                        <hr>
                        <p>Manage your profile.</p>
                        <hr>
                        <p class='align-right'><a href='student-profile.php'>Profile</a></p>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>