<!DOCTYPE html>

<html>
  <head>
    <title>ILIAS FH Aachen</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Include Bootstrap -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </head>
  <body>
    <b>Die Inhalte des GET-Arrays:</b><br>
    <?php print_r($_GET) ?><br><br>
    <b>Die Inhalte des POST-Arrays:</b><br>
    <?php print_r($_POST) ?><br><br>
    <b>Wann Sie uns das letzte Mal besucht haben:</b><br>
    <?php
       if(isset($_COOKIE['time'])){
           echo "Zeit: ".$_COOKIE['time'];
       } else {
           echo "Sie haben die Cookies gelöscht oder waren noch nie hier. :-(";
       }
       // Setze den neuen Cookie
       setcookie("time", date("H:i:s"));
    ?>
    <br><br>
    <div class="form-group" style="width: 50%">
    <form action="" method="post">
      <label>Name:</label>
      <div class="input-group">
	<span class="input-group-addon">
	  <i class="glyphicon glyphicon-user"></i>
	</span>
	<input type="text" name="user" class="form-control" placeholder="Name">
      </div>
      <label>Passwort:</label>
      <div class="input-group">
	<span class="input-group-addon">
	  <i class="glyphicon glyphicon-lock"></i>
	</span>
	<input type="password" name="pw" class="form-control">
      </div>
      <label>Note:</label>
      <div class="input-group">
	<span class="input-group-addon">
	  <i class="glyphicon glyphicon-education"></i>
	</span>
      <select class="form-control" name="note">
	<option value="1">sehr gut</option>
	<option value="2">gut</option>
	<option value="3">befriedigend</option>
	<option value="4">ausreichend</option>
	<option value="5">mangelhaft</option>
	<option value="6">ungenügend</option>
      </select>
      </div>
      <br>
      <input type="submit" value="Absenden" class="btn btn-default form-control">
    </form>
    </div>
  </body>
</html>
