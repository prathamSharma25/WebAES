<?php
    include('student-session.php');
?>

<html>
    <head>
        <title>Available Tests - WebAES for Students</title>
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
                $sql = "SELECT test_ID, test_name FROM tests WHERE test_ID not in (select test_ID from scores where student_ID = '$login_id')";
                $result = mysqli_query($db, $sql);

                if(mysqli_num_rows($result)==0){
                    echo '<h2 class="align-center" style="color: red;">No new tests available! Check again later.</h2>';
                }
                else{
                    echo '<h2 class="align-center">Available Tests</h2><br>
                        <div class="row"><div class="tests-table">
                        <form method="POST" action="take-test.php">
                        <table>
                            <tr>
                                <th style="width: 276.4px;">Test Name</th>
                                <th style="width: 276.4px;">Action</th>
                            </tr>';
                            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                                echo "<tr>";
                                echo "<td>".$row['test_name']."</td>";
                                echo "<td><p class='align-center'><button style='width: 40%' type='submit' name='submit' value=".$row['test_ID'].">Take Test</button></p></td>";
                                echo "</tr>";
                            }
                }
                echo '</table><br>
                    </form></div></div>';
            ?>
        </div>
    </body>
</html>