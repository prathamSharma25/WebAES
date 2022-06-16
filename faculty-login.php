<?php
    include("config.php");
    session_start();

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $myusername = mysqli_real_escape_string($db,$_POST['uname']);
        $mypassword = mysqli_real_escape_string($db,$_POST['pwd']); 
    
        $sql = "SELECT faculty_ID FROM faculty WHERE faculty_ID = '$myusername' and password = '$mypassword'";
        $result = mysqli_query($db, $sql);

        if(mysqli_num_rows($result)!=0) {
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $active = $row['active'];
        
            $count = mysqli_num_rows($result);
            
            if($count == 1) {
                $_SESSION['login_user'] = $myusername;
                header("location: faculty-home.php");
            }
            else {
                echo '<script>alert("Your Username or Password is invalid")</script>';
            }
        }
        else {
            echo '<script>alert("Your Username or Password is invalid")</script>';
        }
    }
?>

<html>
    <head>
    <title>WebAES for Faculties</title>
    <meta charset='UTF-8'>
    <link rel='stylesheet' type='text/css' href='style.css'>
    <link href='https://fonts.googleapis.com/css?family=Open Sans' rel='stylesheet'>
    </head>
    <body>
        <header class='header'>
            <h2>WebAES - Faculty Login</h2>
        </header>
        <div class='main-content'>
            <div class='login-form'>
                <h4>Faculty Login</h4>
                <hr>
                <form action='' method='POST'>
                    <input type='text' placeholder='Username' name='uname' autocomplete='off' required>
                    <br>
                    <input type='password' placeholder='Password' name='pwd' autocomplete='off' required>
                    <p class='align-center'><button type='submit'>Login</button></p>
                </form>
            </div>
        </div>
    </body>
</html>