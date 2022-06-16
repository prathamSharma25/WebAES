<?php
    include('faculty-session.php');

    $faculty_ID = $login_id;
    $email = $_REQUEST['email'];
    $mobile = $_REQUEST['mobile'];

    $sql1 = "UPDATE faculty SET email='$email', mobile='$mobile' WHERE faculty_ID='$login_id'";
    $result1 = mysqli_query($db, $sql1);
    
    echo '<script>alert("Your profile has been updated.")</script>';
    header("location: faculty-home.php");
?>