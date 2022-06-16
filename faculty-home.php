<?php
    include('faculty-session.php');
?>

<html>
    <head>
        <title>Home - WebAES for Faculties</title>
        <meta charset='UTF-8'>
        <link rel='stylesheet' type='text/css' href='style.css'>
        <link href='https://fonts.googleapis.com/css?family=Open Sans' rel='stylesheet'>
    </head>
    <body>
        <header class='header'>
            <h2><a class='header-link' href='faculty-home.php'>WebAES - Faculty Home</a></h2>
        </header>
        <div class='welcome'>
            <h4 class='align-right'>Welcome, <?php echo $login_session; ?> &emsp; <a href='logout.php'>Log Out</a></h4>
        </div>
        <div class='main-content'>
            <div class='row'>
                <div class='three-column'>
                    <div class='card'>
                        <h4>Questions</h4>
                        <hr>
                        <p>Create and manage questions for tests.</p>
                        <hr>
                        <p class='align-right'><a href='questions.php'>Questions</a></p>
                    </div>
                </div>
                <div class='three-column'>
                    <div class='card'>
                        <h4>Tests</h4>
                        <hr>
                        <p>Create and manage tests for your class.</p>
                        <hr>
                        <p class='align-right'><a href='tests.php'>Tests</a></p>
                    </div>
                </div>
                <div class='three-column'>
                    <div class='card'>
                        <h4>Student Results</h4>
                        <hr>
                        <p>View results for students.</p>
                        <hr>
                        <p class='align-right'><a href='faculty-results-view.php'>Student Results</a></p>
                    </div>
                </div>
                <div class='three-column'>
                    <div class='card'>
                        <h4>Profile</h4>
                        <hr>
                        <p>Manage your profile.</p>
                        <hr>
                        <p class='align-right'><a href='faculty-profile.php'>Profile</a></p>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>