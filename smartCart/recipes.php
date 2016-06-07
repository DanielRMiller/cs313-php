<?php
  session_start();
  include 'dbConnect.php';
  $stmt = $db->prepare("
    SELECT r.id, r.name, r.description, ur.selected
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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Add Recipe</title>


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
    <title>Smart Cart - Recipes</title>
    <script src="functions.js"></script>
  </head>
  <body>
    <nav class="navbar navbar-inverse navbar-static-top">
      <a class="navbar-brand" href="cart.php">Smart Cart</a>
      <ul class="nav nav-pills">
        <li class="nav-item active">
          <a class="nav-link" href="recipes.php">Recipes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="menu.php">Menu</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php">Cart</a>
        </li>
      </ul>
    </nav>
    <h1 class="text-xs-center"><?=$_SESSION['first_name']?>'s Recipes</h1>
    <form action="recipeSelectHandler.php" method="post">
      <table class="table table-hover table-reflow">
        <tr>
          <th>Name</th>
          <th>Description</th>
          <th>Add/Remove</th>
          <th>DELETE</th>
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
            echo '<td><input type="checkbox" name="' . $recipe['id'] . '" ' . $checked . '></td>';
            echo '<td>
                    <button class="btn btn-danger btn-remove" type="button" data-value="' . $recipe['id'] . '" onclick="deleteRecipe(this);">
                      <span class="glyphicon glyphicon-minus"></span>
                    </button>
                  </td>';
            echo '</tr>';
          }
        ?>
      </table>
      <button role="button" class="btn btn-primary" type="submit">Finished</button>
    </form>
    <button role="button" class="btn btn-secondary" onclick="location.href='recipeForm.php'">Add New Recipe</button>
  </body>
</html>