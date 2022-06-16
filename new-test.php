<?php
    include('faculty-session.php');
?>

<html>
    <head>
        <title>Tests - WebAES for Faculties</title>
        <meta charset='UTF-8'>
        <link rel='stylesheet' type='text/css' href='style.css'>
        <link href='https://fonts.googleapis.com/css?family=Open Sans' rel='stylesheet'>
    </head>
    <body>
        <header class='header'>
            <h2><a class='header-link' href='faculty-home.php'>WebAES - Faculty Home</a></h2>
        </header>
        <div class='welcome'>
            <h4 class='align-right'>Welcome, <?php echo $login_session; ?> &emsp; <a href='logout.php'>Log Out</a> &emsp; <a href='faculty-home.php'>Home</a></h4>
        </div>
        <div class='main-content'>
            <div class='test-form'>
                <h2 class='align-center'>Create new test</h2>
                <hr>
                <form method='POST' action='create-test.php'>
                    <label for='test_name'>Test Name</label>
                    <input type='text' placeholder='Enter test name here...' name='test_name' id='test_name' autocomplete='off' required>
                    <br>
                    <label for='question1'>Question 1 ID</label>
                    <select name='question1' id='question1'>
                    <?php
                        $sql = "SELECT question_ID FROM questions";
                        $result = mysqli_query($db, $sql);
                            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                                echo '<option value="'.$row['question_ID'].'">' . $row['question_ID'] . '</option>';
                            }
                        ?>
                    </select>
                    <br>
                    <label for='question2'>Question 2 ID</label>
                    <select name='question2' id='question2'>
                        <?php
                            $sql = "SELECT question_ID FROM questions";
                            $result = mysqli_query($db, $sql);
                            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                                echo '<option value="'.$row['question_ID'].'">' . $row['question_ID'] . '</option>';
                            }
                        ?>
                    </select>
                    <br>
                    <label for='question3'>Question 3 ID</label>
                    <select name='question3' id='question3'>
                        <?php
                            $sql = "SELECT question_ID FROM questions";
                            $result = mysqli_query($db, $sql);
                            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                                echo '<option value="'.$row['question_ID'].'">' . $row['question_ID'] . '</option>';
                            }
                        ?>
                    </select>
                    <br>
                    <p class='align-center'><button type='submit'>Create</button></p>
                </form>
            </div>
        </div>
    </body>
</html>