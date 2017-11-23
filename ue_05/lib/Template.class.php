<?php
class Template {
    private $fields;

    function __construct() {
	$fields = array();
    }
    
    public function assign($key, $value) {
	$this->fields[$key] = $value;
    }

    public function display($filename) {
	// read the file
	$file = file_get_contents($filename);
	// now replace the tags
	if (count($this->fields) > 0) {
	    foreach($this->fields as $curtag=>$curfield) {
		$file = str_replace('{$'.$curtag.'}', $curfield, $file);
	    }
	}
	echo $file;
    }
}
?>
