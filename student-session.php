<?php
   include('config.php');
   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($db,"select student_ID, student_name from students where student_ID = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['student_name'];

   $login_id = $row['student_ID'];
   
   if(!isset($_SESSION['login_user'])){
      header("location:student-login.php");
      die();
   }
?>