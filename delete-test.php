<?php
    include('faculty-session.php');

    foreach ($_POST["checkbox"] as $value){
        $id = (int)$value;
        $sql = "DELETE FROM tests WHERE test_ID='$id'";
        if(mysqli_query($db, $sql)){
            echo '<script>alert("Question removed successfully.")</script>';
            header("location: tests.php");
        }
    }
?>