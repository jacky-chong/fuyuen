<?php
session_start();
echo "<script>alert('You are successful logged out.' ".$_SERVER['user']." ! ')</script>";
//remove all session variables
session_unset();

//destroy the session
session_destroy();
header("location: login.html");
?>