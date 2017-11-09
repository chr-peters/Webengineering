<?php

// test if the student is already logged in
session_start();
if (!empty($_SESSION['username'])) {
    header('location: userdata.php');
    exit;
}

require 'lib/Template.class.php';
$tpl = new Template();
$tpl->display('templates/login.tpl.html');
?>
