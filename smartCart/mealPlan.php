<?php
  session_start();
  if (!$_SESSION['username']) {
    header("Location: index.php");
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
  $stmt = $db->prepare("
    SELECT r.name, r.description 
      FROM user as u 
        JOIN user_recipe AS ur ON ur.user_id=u.id
        JOIN recipe AS r ON r.id=ur.recipe_id
      WHERE u.username=:username 
        AND ur.selected!=0;");
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
    <a href="mealPlan.php">Meal Plan</a>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/css/bootstrap.css">
  </head>
  <body>
    <h1 class="text-xs-center">Recipes</h1>
    <table>
    <?php 
      foreach ($recipes as $recipe) {
        echo '<tr>';
        echo '<td>' . $recipe['name'] . '</td>';
        echo '<td>' . $recipe['description'] . '</td>';
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