<?php
  session_start();
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
    $dbHost = 'localhost';
    $dbPort = '';
    $dbUser = 'smartCartApp';
    $dbPassword = 'abc123';
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
  $stmt = $db->prepare("
    SELECT ri.amount, ri.measurement_type, i.name
      FROM user as u 
        JOIN user_recipe AS ur ON ur.user_id=u.id
        JOIN recipe AS r ON r.id=ur.recipe_id
        JOIN recipe_ingredient AS ri ON ri.recipe_id=r.id
        JOIN ingredient AS i ON i.id=ri.ingredient_id
      WHERE u.username=:username 
        AND ur.selected!=0;
  ");
  $stmt->execute(array(':username' => $_SESSION['username']));
  $ingredients = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="">
  <head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Smart Cart - Cart</title>

    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

    <!-- Custom styles -->
    <link rel="stylesheet" href="../style.css">
  </head>
  <body>
    <nav class="navbar navbar-inverse navbar-static-top">
      <a class="navbar-brand" href="cart.php">Smart Cart</a>
      <ul class="nav nav-pills">
        <li class="nav-item">
          <a class="nav-link" href="recipes.php">Recipes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="menu.php">Menu</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="cart.php">Cart</a>
        </li>
      </ul>
    </nav>
    <h1 class="text-xs-center">Cart</h1>
    <table class="table table-hover">
    <?php 
      foreach ($ingredients as $ingredient) {
        echo '<tr>';
        echo '<td>' . $ingredient['amount'] . '</td>';
        echo '<td>' . $ingredient['measurement_type'] . '</td>';
        echo '<td>' . $ingredient['name'] . '</td>';
        echo '</tr>';
      }
    ?>
    </table>
    <button class="btn btn-secondary" onclick="location.href='menu.php'">Back To Menu</button>
  </body>
</html>