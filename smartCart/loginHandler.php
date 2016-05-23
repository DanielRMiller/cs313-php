<?php
	$username = $_POST['username'];
	$password = $_POST['password'];
	if ($username == "" || $password == "")
	{
		setcookie("INVALID", 1, time() + 60);
		header("Location: login.php");
	}
	try
	{
		$db = new PDO('mysql:host=localhost;dbname=smartcart;charset=utf8mb4', 'smartCartApp', 'abc123');
	}
	catch (PDOException $ex) 
	{
		echo 'Error!: ' . $ex->getMessage();
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
