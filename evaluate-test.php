<?php
    set_time_limit(600);
    include('student-session.php');

    $student_ID = $login_id;
    $test_ID = $_SESSION['test_ID'];
    $answer1 = $_REQUEST['answer1'];
    $answer2 = $_REQUEST['answer2'];
    $answer3 = $_REQUEST['answer3'];

    $sql1 = "INSERT INTO answers VALUES ('$test_ID', '$student_ID', '$answer1', '$answer2', '$answer3')";
    $result1 = mysqli_query($db, $sql1);
    
    $exp_ans1 = $_SESSION['question1_ea'];
    $exp_ans2 = $_SESSION['question2_ea'];
    $exp_ans3 = $_SESSION['question3_ea'];

    $user_CSV[0] = array('student1', 'expected1', 'student2', 'expected2', 'student3', 'expected3');
    $user_CSV[1] = array($answer1, $exp_ans1, $answer2, $exp_ans2, $answer3, $exp_ans3);

    $fp = fopen('answers.csv', 'wb');
    foreach ($user_CSV as $line){
        fputcsv($fp, $line, ',');
    }
    fclose($fp);

    $command = escapeshellcmd('python evaluate-test.py answers.csv');
    $score = shell_exec($command);
    
    $sql2 = "INSERT INTO scores VALUES ('$test_ID', '$student_ID', '$score')";
    $result2 = mysqli_query($db, $sql2);

    echo '<script>alert("Your test has been evaluated.")</script>';
    header("location: student-home.php");
?>