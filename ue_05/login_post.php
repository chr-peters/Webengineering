<?php
// load database class
require_once('lib/Database.class.php');
$database = Database::getInstance();

// retrieve the user information
$username = filter_input(INPUT_POST, 'user', FILTER_SANITIZE_SPECIAL_CHARS);
if (empty($username)) {
    exit;
}

$password = filter_input(INPUT_POST, 'pw', FILTER_UNSAFE_RAW);
if (empty($password)) {
    exit;
}

// now validate the user data
if ($database->validate_user($username, $password)) {
    // start the session
    session_start();
    $_SESSION['username'] = $username;

    // redirect the user
    header('Location: userdata.php');

    exit;
} else {
    echo "Wrong username or password!";
}

?>
