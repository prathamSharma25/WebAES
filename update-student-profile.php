<?php
    include('student-session.php');

    $faculty_ID = $login_id;
    $email = $_REQUEST['email'];
    $mobile = $_REQUEST['mobile'];

    $sql1 = "UPDATE students SET email='$email', mobile='$mobile' WHERE student_ID='$login_id'";
    $result1 = mysqli_query($db, $sql1);
    
    echo '<script>alert("Your profile has been updated.")</script>';
    header("location: student-home.php");
?>