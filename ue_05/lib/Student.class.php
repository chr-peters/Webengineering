<?php
class Student {
    private $name;
    private $note;

    function __construct($name) {
	$this->name = $name;
    }

    public function getName() {
	return $this->name;
    }
    
    public function getNote() {
	return $this->note;
    }

    public function setNote($note) {
	return $this->note = $note;
    }
    
    public static function getNotenBewertung($note) {
	switch($note) {
	    case 1: {
		return "sehr gut";
		break;
	    }
	    case 2: {
	        return "gut";
	        break;
	    }
	    case 3: {
	        return "befriedigend";
	        break;
	    }
	    case 4: {
		return "ausreichend";
		break;
	    }
	    case 5: {
		return "mangelhaft";
		break;
	    }
	    case 6: {
		return "ungenügend";
		break;
	    }
	    default: return NULL;
	}
    }

    public static function printStudenten($studenten) {
	foreach($studenten as $curStudent) {
	    echo "Name: ".$curStudent->getName().", Note: ".
		Student::getNotenBewertung($curStudent->getNote())."<br>";
	}
    }
}

function createStudentFactory($note) {
    return function ($name) use ($note){
	$student = new Student($name);
	$student->setNote($note);
	return $student;
    };
}
?>
