<?php
    include('student-session.php');
?>

<html>
    <head>
        <title>View Results - WebAES for Students</title>
        <meta charset='UTF-8'>
        <link rel='stylesheet' type='text/css' href='style.css'>
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
            <?php
                $sql = "SELECT tests.test_name, scores.score FROM tests JOIN scores ON tests.test_ID=scores.test_ID WHERE student_ID='$login_id'";
                $result = mysqli_query($db, $sql);
                if(mysqli_num_rows($result)==0){
                    echo '<h2 class="align-center" style="color: red;">No results available!</h2>';
                }
                else{
                    echo '<h2 class="align-center">Available Results</h2><br>
                        <div class="row"><div class="results-table">
                            <table>
                                <tr>
                                    <th style="width: 276.4px;"">Test Name</th>
                                    <th style="width: 276.4px;">Score</th>
                                </tr>';
                        
                    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                        echo '<tr>
                                <td class="align-center">' . $row["test_name"] . '</td>
                                <td class="align-center">' . $row["score"] . ' / 30.00</td>
                            </tr>';
                    }

                    echo '</table><br><br></div></div>';
                }
            ?>
        </div>
    </body>
</html>