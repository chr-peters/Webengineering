<!DOCTYPE html>

<html>
  <head>
    <title>ILIAS FH Aachen</title>
    <meta charset="UTF-8">
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
    <form action="" method="post">
      Name:
      <input type="text" name="user">
      <br>
      Passwort:
      <input type="password" name="pw">
      <br>
      Note:
      <select name="note">
	<option value="1">sehr gut</option>
	<option value="2">gut</option>
	<option value="3">befriedigend</option>
	<option value="4">ausreichend</option>
	<option value="5">mangelhaft</option>
	<option value="6">ungenügend</option>
      </select>
      <br>
      <input type="submit" value="Absenden">
    </form>
  </body>
</html>
