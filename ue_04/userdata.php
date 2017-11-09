<?php
require 'lib/Template.class.php';
require 'lib/Database.class.php';
require 'lib/Student.class.php';

session_start();
$database = Database::getInstance();

if (empty($_SESSION['username'])) {
    header('location: login.php');
    exit;
}

$tpl = new Template();
$tpl->assign('name', $_SESSION['username']);
$tpl->assign('grade', Student::getNotenBewertung($database->get_grade($_SESSION['username'])));
$tpl->display('templates/userdata.tpl.html');
?>
