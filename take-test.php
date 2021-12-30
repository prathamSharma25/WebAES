<?php
    include('student-session.php');

    $test_ID = (int)$_REQUEST['submit'];
    $_SESSION['test_ID'] = $test_ID;
    $sql = "SELECT * FROM tests WHERE test_ID='$test_ID'";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $test_name = $row['test_name'];
    $question1_ID = $row['question1_ID'];
    $question2_ID = $row['question2_ID'];
    $question3_ID = $row['question3_ID'];

    $sql = "SELECT prompt, expected_answer FROM questions WHERE question_ID='$question1_ID'";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $question1_prompt = $row['prompt'];
    $question1_ea = $row['expected_answer'];
    $_SESSION['question1_ea'] = $question1_ea;

    $sql = "SELECT prompt, expected_answer FROM questions WHERE question_ID='$question2_ID'";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $question2_prompt = $row['prompt'];
    $question2_ea = $row['expected_answer'];
    $_SESSION['question2_ea'] = $question2_ea;

    $sql = "SELECT prompt, expected_answer FROM questions WHERE question_ID='$question3_ID'";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $question3_prompt = $row['prompt'];
    $question3_ea = $row['expected_answer'];
    $_SESSION['question3_ea'] = $question3_ea;
?>

<html>
    <head>
        <title>Available Tests - WebAES for Students</title>
        <meta charset='UTF-8'>
        <link rel='stylesheet' type='text/css' href='css\style.css'>
        <link href='https://fonts.googleapis.com/css?family=Open Sans' rel='stylesheet'>
    </head>
    <body>
        <header class='header'>
            <h2><a class='header-link' href='student-home.php'>WebAES for Students</a></h2>
        </header>
        <div class='welcome'>
            <h4 class='align-right'>Welcome, <?php echo $login_session; ?> &emsp; <a href='logout.php'>Log Out</a> &emsp; <a href='student-home.php'>Home</a></h4>
        </div>
        <div class='main-content'>
            <div class='take-test-form'>
                <h2 class='align-center'><?php echo $test_name ?></h2>
                <hr>
                <form action='evaluate-test.php' method='POST'>
                    <label for='question1_prompt'><b>Question 1: </b><?php echo $question1_prompt ?></label>
                    <label for='answer1'><b>Answer:</b></label>
                    <textarea placeholder='Please type in your answer here...' id='answer1' name='answer1' rows='7' cols='100' autocomplete='off' required></textarea>
                    <br>
                    <label for='question2_prompt'><b>Question 2: </b><?php echo $question2_prompt ?></label>
                    <label for='answer2'><b>Answer:</b></label>
                    <textarea placeholder='Please type in your answer here...' id='answer2' name='answer2' rows='7' cols='100' autocomplete='off' required></textarea>
                    <br>
                    <label for='question3_prompt'><b>Question 3: </b><?php echo $question3_prompt ?></label>
                    <label for='answer3'><b>Answer:</b></label>
                    <textarea placeholder='Please type in your answer here...' id='answer3' name='answer3' rows='7' cols='100' autocomplete='off' required></textarea>
                    <br>
                    <p class='align-center'><input style='width: 10%;' type='submit' name='submit', value='Submit Test'></p>
                </form>
            </div>
        </div>
    </body>
</html>