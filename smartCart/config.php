<?php
  /** dbConnecter.php **/
  function loadDatabase()
  {
    // See if we are on openshift or localhost
    $dbHost = "";
    $dbPort = "";
    $dbUser = "";
    $dbPassword = "";
    $dbName = "ecen_projects";
    $openShiftVar = getenv('OPENSHIFT_MYSQL_DB_HOST');
    // Now check where we are running this
    if ($openShiftVar === null || $openShiftVar == "") {
      // We are in the local host
      echo "<h1>Localhost</h1>";
      require ("setUpLocalHostCredentials.php");
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
    return $db;
  }
?>