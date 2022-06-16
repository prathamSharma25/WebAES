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
            <h2><a class='header-link' href='faculty-home.php'>WebAES for Faculties</a></h2>
        </header>
        <div class='welcome'>
            <h4 class='align-right'>Welcome, <?php echo $login_session; ?> &emsp; <a href='logout.php'>Log Out</a> &emsp; <a href='faculty-home.php'>Home</a></h4>
        </div>
        <div class='main-content'>
            <?php
                $sql = 'SELECT test_name, question1_ID, question2_ID, question3_ID FROM tests';
                $result = mysqli_query($db, $sql);

                if(mysqli_num_rows($result)==0){
                    echo '<h2 class="align-center" style="color: red;">No tests available!</h2>';
                }
                else{
                    echo '<div class="row"><div class="tests-table">
                            <table>
                            <h2 class="align-center">Available Tests</h2><br>
                                <tr>
                                    <th style="width: 40%;">Test Name</th>
                                    <th style="width: 20%;">Question 1 ID</th>
                                    <th style="width: 20%;">Question 2 ID</th>
                                    <th style="width: 20%;">Question 1 ID</th>
                                </tr>';
                        
                    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                        echo '<tr>
                                <td class="align-center">' . $row["test_name"] . '</td>
                                <td class="align-center">' . $row["question1_ID"] . '</td>
                                <td class="align-center">' . $row["question2_ID"] . '</td>
                                <td class="align-center">' . $row["question3_ID"] . '</td>
                            </tr>';
                    }

                    echo '</table><p class="align-center"><a href="new-test.php">Create new test</a> &ensp; <a href="remove-test.php">Remove tests</a></p></div></div>';
                }
            ?>
        </div>
    </body>
</html>