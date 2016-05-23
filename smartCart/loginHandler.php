<?php
	$username = $_POST['username'];
	$password = $_POST['password'];
	if ($username == "" || $password == "")
	{
		setcookie("INVALID", 1, time() + 60);
		header("Location: login.php");
	}
	// See if we are on openshift or localhost
	$dbHost = "";
	$dbPort = "";
	$dbUser = "";
	$dbPassword = "";
	$dbName = "smartcart";
	$openShiftVar = getenv('OPENSHIFT_MYSQL_DB_HOST');
	// Now check where we are running this
	if ($openShiftVar === null || $openShiftVar == "") {
		// We are in the local host
		echo "<h1>Localhost</h1>";
		$dbHost = 'localhost';
		$dbPort = '';
		$dbUser = 'smartCartApp';
		$dbPassword = 'abc123';
	} else {
		// We are on the openshift database!
		echo "<h1>Openshift</h1>";
		$dbHost = getenv('OPENSHIFT_MYSQL_DB_HOST');
		$dbPort = ":" . getenv('OPENSHIFT_MYSQL_DB_PORT');
		$dbUser = getenv('OPENSHIFT_MYSQL_DB_USERNAME');
		$dbPassword = getenv('OPENSHIFT_MYSQL_DB_PASSWORD');
    }
	echo "host:$dbHost$dbPort dbName:$dbName user:$dbUser password:$dbPassword<br >\n";
	try {
		// Connect to the database!
		$db = new PDO("mysql:host=$dbHost$dbPort;dbname=$dbName", $dbUser, $dbPassword);
		echo "<p>Success</p>";
	} catch (PDOException $e) {
		echo "ERROR in connecting to database: " . $e->getMessage();
		die();
	}

	$stmt = $db->prepare("SELECT username, password, first_name, last_name FROM user WHERE username=:username AND password=:password;");
	$stmt->execute(array(':username' => $username, ':password' => $password));
	$rows = $stmt->fetchAll(PDO::FETCH_ASSOC)[0];
	if ($rows['password'] == $password) {
		session_start();
		$_SESSION['username'] = $username;
		header("Location: recipes.php");
	} else {
		setcookie("INVALID", 1, time() + 60);
		header("Location: login.php");
	}
?>
