<?php
   include('faculty-session.php');
?>

<html>
    <head>
        <title>Faculty Profile - WebAES for Faculties</title>
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
                $sql = "SELECT faculty_ID, faculty_name, email, mobile FROM faculty WHERE faculty_ID = '$login_id'";
                $result = mysqli_query($db, $sql);

                echo '<div class="row"><div class="profile-table">
                        <table>
                        <h2 class="align-center">Your Profile</h2><br>
                            <tr>
                                <th style="width: 15%;">Faculty ID</th>
                                <th style="width: 20%;">Faculty Name</th>
                                <th style="width: 20%;">Email ID</th>
                                <th style="width: 20%;">Mobile</th>
                            </tr>';
                    
                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                    echo '<tr>
                            <td class="align-center">' . $row["faculty_ID"] . '</td>
                            <td class="align-center">' . $row["faculty_name"] . '</td>
                            <td class="align-center">' . $row["email"] . '</td>
                            <td class="align-center">' . $row["mobile"] . '</td>
                        </tr>';
                }

                echo '</table><p class="align-center"><a href="edit-faculty-profile.php">Edit Profile</a></p></div></div>';
            ?>
        </div>
    </body>
</html>