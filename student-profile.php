<?php
   include('student-session.php');
?>

<html>
    <head>
        <title>Student Profile - WebAES for Students</title>
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
                $sql = "SELECT student_ID, student_name, email, mobile FROM students WHERE Student_ID = '$login_id'";
                $result = mysqli_query($db, $sql);

                echo '<div class="row"><div class="profile-table">
                        <table>
                        <h2 class="align-center">Your Profile</h2><br>
                            <tr>
                                <th style="width: 15%;">Student ID</th>
                                <th style="width: 20%;">Student Name</th>
                                <th style="width: 20%;">Email ID</th>
                                <th style="width: 20%;">Mobile</th>
                            </tr>';
                    
                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                    echo '<tr>
                            <td class="align-center">' . $row["student_ID"] . '</td>
                            <td class="align-center">' . $row["student_name"] . '</td>
                            <td class="align-center">' . $row["email"] . '</td>
                            <td class="align-center">' . $row["mobile"] . '</td>
                        </tr>';
                }

                echo '</table><p class="align-center"><a href="edit-student-profile.php">Edit Profile</a></p></div></div>';
            ?>
        </div>
    </body>
</html>