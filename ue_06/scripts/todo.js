$(function(){
    // handler for a new entry
    $('#new_entry').submit(function (e) {
	var content = $('#content').val();
	// create the JSON object
	var entry = JSON.stringify(content);

	// now send the JSON object
	$.ajax({
	    url: 'todo.php?action=put',
	    type: 'POST',
	    contentType: 'application/json',
	    charSet: 'utf-8',
	    dataType: 'json',
	    data: entry,
	    success: function(data) {
		
	    },
	    error: function(xhr, ajaxOptions, thrownError) {
	    	$('#error').html('An Error occured! Error: '+thrownError+'.');
	    }
	});

	e.preventDefault();
    });
});
