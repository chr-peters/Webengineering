<?php
// delete the session
session_start();
session_unset();
// redirecto to the login page
header('location: login.php');
?>
