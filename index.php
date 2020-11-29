<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=980px, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Add user</title>
</head>
<body>
<?php require("menu.php"); ?>
<h1>Przykład: wyzwalacz przed dodaniem użytkownika</h1>
<form action="add.php" method="post">
<label for="fname">Imię:</label><br/>
  <input type="text" id="fname" name="fname"><br/>
  <label for="lname">Email:</label><br/>
  <input type="text" id="email" name="email"><br/><br/>
  <input type="submit" value="Register subscriber">
</form>
</body>
</html>