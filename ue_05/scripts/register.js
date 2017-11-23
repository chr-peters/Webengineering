$(function() {
    // set the color of the button in the beginning
    $('#btn').css('background-color', getColorCode($('select').val()));
    
    $('select').change(function () {
	// set the color of the button
	$('#btn').css('background-color', getColorCode($('select').val()));
    });

    // set the handler for submit
    $('form').submit(function(e) {
	var name = $('#user').val();
	var pw = $('#pw').val();
	//clear the output
	$('#output').html('');
	if (name==="") {
	    $('#output').append('Bitte geben Sie einen Namen ein!<br>');
	    // prevent the form from submitting
	    e.preventDefault();
	}
	if (pw==="") {
	    $('#output').append('Bitte geben Sie ein Passwort ein!<br>');
	    // prevent the form from submitting
	    e.preventDefault();
	}
    });

    // set the handler for the second button
    $('#second').click(function () {
	var name = $('#user').val();
	var pw = $('#pw').val();
	var grade = $('select').val();
	// now print the table
	$('#output').html('<table>\
<td>Benutzername</td><td>'+name+'</td><tr>\
<td>Passwort</td><td>'+pw+'</td><tr>\
<td>Note</td><td>'+grade+'</td>\
</table>');
    });

    function getColorCode(grade) {
	if (grade == 1 || grade == 2) {
	    return "#5cb85c";
	} else if (grade == 3 || grade == 4) {
	    return "#f0ad4e";
	} else {
	    return "#d9534f";
	}
    }
});
