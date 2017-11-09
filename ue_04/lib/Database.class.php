<?php
require_once "pdooci/src/PDO.php";
require_once "pdooci/src/Statement.php";

class Database {
    private static $instance;

    private $pdo;

    function __construct() {
	$dbname = "oci:dbname=(DESCRIPTION =(ADDRESS = (PROTOCOL = TCP)(HOST= 
        zam1150.zam.kfa-juelich.de)(PORT = 1521))(CONNECT_DATA = (SERVER = 
        DEDICATED)(SERVICE_NAME = dbkurs.fzj.de)))";

	$this->pdo = new PDOOCI\PDO($dbname, "we077970", "WE-WS1718");
    }

    function register_user($username, $password, $grade) {
	// prepare the statement
	$statement = $this->pdo->prepare('insert into users(name, password, grade) values(:name, :password, :grade)');
	$statement->bindParam(':name', $username);
	$statement->bindParam(':password', $password);
	$statement->bindParam(':grade', $grade);

	// now execute it
	$statement->execute();
    }

    function validate_user($username, $password) {
	// prepare the statement
	$statement = $this->pdo->prepare('select password from users where name = :name');
	$statement->bindParam(':name', $username);

	// now execute it
	$statement->execute();
	
	// now validate
	$res = $statement->fetch();
	if (empty($res)) {
	    // invalid username or something went really wrong
	    return false;
	}
	if (password_verify($password, $res['PASSWORD'])) {
	    // login successful
	    return true;
	}
	return false;
    }

    function get_grade($username) {
	// prepare the statement
	$statement = $this->pdo->prepare('select grade from users where name = :name');
	$statement->bindParam(':name', $username);

	// now execute it
	$statement->execute();

	return $statement->fetch()['GRADE'];
    }
    
    public static function getInstance() {
	if (!isset(Database::$instance)) {
	    Database::$instance = new Database();
	}
	return Database::$instance;
    }
}
?>
