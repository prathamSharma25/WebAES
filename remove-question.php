<?php
    include('faculty-session.php');
?>

<html>
    <head>
        <title>Remove Questions - WebAES for Faculties</title>
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
                $sql = 'SELECT question_ID, prompt, expected_answer FROM questions';
                $result = mysqli_query($db, $sql);

                if(mysqli_num_rows($result)==0){
                    echo '<h2 class="align-center" style="color: red;">No questions available!</h2>';
                }
                else{
                    echo '<div class="row"><div class="question-table">
                    <form method="POST" action="delete-question.php">
                        <table>
                        <h2 class="align-center">Remove Questions</h2><br>
                            <tr>
                                <th style="width: 120px;">Question ID</th>
                                <th>Prompt</th>
                                <th>Expected Answer</th>
                                <th>Remove</th>
                            </tr>';
                        while($row = mysqli_fetch_assoc($result)){
                            echo "<tr>";
                            echo "<td>".$row['question_ID']."</td>";
                            echo "<td>".$row['prompt']."</td>";
                            echo "<td>".$row['expected_answer']."</td>";
                            echo "<td> <input type='checkbox' name='checkbox[]' value='".$row["question_ID"]."'</td>";
                            echo "</tr>";
                        }

                        echo '</table>
                        <p class="align-center"><input type="submit" name="remove" value="Remove"></p>
                    </form></div></div>';
                }
            ?>
        </div>
    </body>
</html>