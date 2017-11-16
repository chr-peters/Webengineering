<?php





if (is_ajax())
{    
    if(strcasecmp($_SERVER['REQUEST_METHOD'], 'POST') == 0){  
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
        if(strcasecmp($contentType, 'application/json') == 0){
            
            $content = trim(file_get_contents("php://input"));
            $person = json_decode($content, true);
            $person['Name'] = "V. Sander";
	    $person['Stadt'] = "Aachen";
            $output= json_encode($person);
        }
        else {
            $output= json_encode("content Type is not JSON");
        }
    }   
    else {
        $output= json_encode("not called through POST");
    }
}
else    {
    $output= json_encode("not called through ajax");
}
echo $output;


// Testfunktion ob der Aufruf über AJAX stattgefunden hat. Die meisten Browser 
// setzen HTTP_X_REQUESTED_WITH bei AJAX-Requests
function is_ajax() {
  return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
}
