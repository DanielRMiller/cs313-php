<?php
    $username = $_POST['username'];
    $password = $_POST['password'];
    if ($username == "" || $password == "") { header("Location: login.php"); }
    include 'dbConnect.php';
    $stmt = $db->prepare("
        SELECT username, password, first_name, last_name 
        FROM user 
        WHERE username=:username 
            AND password=:password;");
    $stmt->execute(array(':username' => $username, ':password' => $password));
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC)[0];
    if ($rows['password'] == $password) {
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['first_name'] = $rows['first_name'];
        $_SESSION['last_name'] = $rows['last_name'];
        header("Location: recipes.php");
    } else { header("Location: login.php"); }
?>
