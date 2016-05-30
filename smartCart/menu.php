<?php
  session_start();
  include 'dbConnect.php';
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
    <title>Smart Cart - Menu</title>
    <a href="recipes.php">Recipes</a>
    <a href="cart.php">Cart</a>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/css/bootstrap.css">
  </head>
  <body>
    <h1 class="text-xs-center">Menu</h1>
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