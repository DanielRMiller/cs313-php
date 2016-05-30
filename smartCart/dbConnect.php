<?php
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
        include 'dbCredentials.php';
    } else {
        // We are on the openshift database!
        $dbHost = getenv('OPENSHIFT_MYSQL_DB_HOST');
        $dbPort = ":" . getenv('OPENSHIFT_MYSQL_DB_PORT');
        $dbUser = getenv('OPENSHIFT_MYSQL_DB_USERNAME');
        $dbPassword = getenv('OPENSHIFT_MYSQL_DB_PASSWORD');
    }
    try {
    // Connect to the database!
    $db = new PDO("mysql:host=$dbHost$dbPort;dbname=$dbName", $dbUser, $dbPassword);
    } catch (PDOException $e) {
        echo "ERROR in connecting to database: " . $e->getMessage();
        die();
    }
    return $db;
?>