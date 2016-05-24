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
    SELECT r.name, r.description, ur.selected
      FROM user as u 
        JOIN user_recipe AS ur ON ur.user_id=u.id
        JOIN recipe AS r ON r.id=ur.recipe_id
      WHERE u.username=:username;");
  $stmt->execute(array(':username' => $_SESSION['username']));
  $recipes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="">
  <head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Smart Cart - Recipes</title>
    <a href="menu.php">Menu</a>
    <a href="cart.php">Cart</a>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/css/bootstrap.css">
  </head>
  <body>
    <h1 class="text-xs-center"><?=$_SESSION['first_name']?>'s Recipes</h1>
    <table>
      <tr>
        <th>Name</th>
        <th>Description</th>
        <th>Add/Remove</th>
      </tr>
    <?php 
      foreach ($recipes as $recipe) {
        echo '<tr>';
        echo '<td>' . $recipe['name'] . '</td>';
        echo '<td>' . $recipe['description'] . '</td>';
        $checked = '';
        if ($recipe['selected'] == 1) {
          $checked = 'checked';
        }
        echo '<td><input type="checkbox" name="checkbox" ' . $checked . '></td>';
        echo '</tr>';
      }
    ?>
    </table>
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <!-- Include Tether -->
    <script src="https://www.atlasestateagents.co.uk/javascript/tether.min.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/js/bootstrap.js"></script>
  </body>
</html>