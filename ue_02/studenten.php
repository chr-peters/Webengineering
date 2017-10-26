<?php
require('lib/Student.class.php');

$student1 = new Student("Hans");
$student2 = new Student("Peter");
$student3 = new Student("Friedrich");

$studenten = Array($student1, $student2, $student3);

$student1->setNote(1);
$student2->setNote(6);
$student3->setNote(5);

echo "<b>Unsortiert:</b><br>";
Student::printStudenten($studenten);

$comparator = function($a, $b) {
    if ($a->getNote() < $b->getNote()) {
	return -1;
    } else if ($a->getNote() > $b->getNote()) {
	return 1;
    } else {
	return 0;
    }
};

usort($studenten, $comparator);

echo "<br>";
echo "<b>Sortiert:</b><br>";
Student::printStudenten($studenten);

$studentFactory = createStudentFactory(5);
$studentMax = $studentFactory('Max');
$studentMartin = $studentFactory('Martin');
$studentMarvin = $studentFactory('Marvin');
$mangelhafte = Array($studentMax, $studentMartin, $studentMarvin);
echo "<br><b>Die Mangelhaften:</b><br>";
Student::printStudenten($mangelhafte);
?>
