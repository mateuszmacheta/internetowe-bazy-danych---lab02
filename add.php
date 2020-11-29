<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$fname = $_POST['fname'];
	$email = $_POST['email'];
  
	//db connection
	$host         = "localhost";
	$username     = "root";
	$password     = "";
	$dbname       = "test";

	$conn = new mysqli($host, $username, $password, $dbname);
	if ($conn->connect_error) {
		die("Connection to database failed: " . $conn->connect_error);}
	$query = "INSERT INTO `subscribers` (`id`, `fname`, `email`) VALUES (NULL, '" . $fname . "', '" . $email . "')";
	$result = $conn->query($query);
    if($result)
    {
        echo "<h1>Dodano użytkownika</h1>";
    }
    else
    {
        echo "<h1 colour='red'>Błąd - nie dodano użytkownika.</h1>";
    }
	mysqli_close($conn);
}


?>

<a href="index.php">Back</a>