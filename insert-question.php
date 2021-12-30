<?php
    include('faculty-session.php');

    $prompt =  $_REQUEST['prompt'];
    $expected_answer = $_REQUEST['exp_ans'];
    $sql = "INSERT INTO questions (prompt, expected_answer) VALUES ('$prompt', '$expected_answer')";
    if(mysqli_query($db, $sql)){
        echo '<script>alert("New question added successfully.")</script>';
        header("location: questions.php");
    }
?>