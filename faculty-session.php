<?php
   include('config.php');
   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($db,"select faculty_name from faculty where faculty_ID = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['faculty_name'];
   
   if(!isset($_SESSION['login_user'])){
      header("location:faculty-login.php");
      die();
   }
?>