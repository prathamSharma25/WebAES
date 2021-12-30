<?php
    include('faculty-session.php');

    $test_name =  $_REQUEST['test_name'];
    $question1_ID = $_REQUEST['question1'];
    $question2_ID = $_REQUEST['question2'];
    $question3_ID = $_REQUEST['question3'];

    $sql = "INSERT INTO tests (test_name, question1_ID, question2_ID, question3_ID) VALUES ('$test_name', '$question1_ID', '$question2_ID', '$question3_ID')";
    if(mysqli_query($db, $sql)){
        echo '<script>alert("New test created successfully.")</script>';
        header("location: tests.php");
    }
?>