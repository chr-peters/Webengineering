<?php
// load the database class
require_once "lib/Database.class.php";

// first retrieve the data
$username = filter_input(INPUT_POST, 'user', FILTER_SANITIZE_SPECIAL_CHARS);
if (empty($username)) {
    exit;
}

$password = filter_input(INPUT_POST, 'pw', FILTER_UNSAFE_RAW);
if (empty($password)) {
    exit;
}
// hash the password
$password = password_hash($password, PASSWORD_DEFAULT);

$range = array (
    'options' => array ('min_range' => 1, 'max_range' => 6)
);
$grade = filter_input(INPUT_POST, 'grade', FILTER_VALIDATE_INT, $range);
if ($grade === false || $grade === null) {
    exit;
}

// create a connection to the database
$database = Database::getInstance();
$database->register_user($username, $password, $grade);

?>
