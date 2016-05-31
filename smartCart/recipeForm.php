<?php
  session_start();
  include 'dbConnect.php';
?>
<!DOCTYPE html>
<html lang="en">
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
  </head>
  <body>
    <nav class="navbar navbar-inverse">
      <a class="navbar-brand" href="cart.php">Smart Cart</a>
      <ul class="nav nav-pills">
        <li class="nav-item">
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

    <div class="container">
      <form action="recipeFormHandler.php" method="post">
        <fieldset class="form-group">
          <label for="recipeName">Recipe Name</label>
          <input type="text" class="form-control" name="recipeName" id="recipeName" placeholder="Recipe Name">
        </fieldset>
        <fieldset class="form-group">
          <label for="recipeName">Recipe Description</label>
          <input type="text" class="form-control" name="recipeDescription" id="recipeDescription" placeholder="Recipe Description">
        </fieldset>
        <fieldset class="form-group row ingredients">
          <div class="controlDiv">
            <div class="ingredient">
              <div class="col-sm-4">
                <label for="IngredientName">Ingredient Name</label>
                <input type="text" class="form-control" name="ingredientName[]" id="ingredientName" placeholder="Ingredient Name">
              </div>
              <div class="col-sm-3">
                <label for="recipeName">Ingredient Amount</label>
                <input type="number" class="form-control" name="ingredientAmount[]" id="ingredientAmount" placeholder="Recipe Amount">
              </div>
              <div class="col-sm-4">
                <label for="recipeName">Ingredient Measurement Type</label>
                <input type="text" class="form-control" name="ingredientMeasurementType[]" id="ingredientMeasurementType" placeholder="Recipe Description">
              </div>
              <div class="col-sm-1">
                <button class="btn btn-success btn-add" type="button">
                    <span class="glyphicon glyphicon-plus"></span>
                </button>
              </div>
            </div>
          </div>
        </fieldset>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div><!-- /.container -->
  </body>
  <script>
    $(function()
{
    $(document).on('click', '.btn-add', function(e)
    {
        e.preventDefault();

        var controlForm = $('.ingredients .controlDiv:first'),
            currentEntry = $(this).parents('.ingredient:first'),
            newEntry = $(currentEntry.clone()).appendTo(controlForm);

        newEntry.find('input').val('');
        controlForm.find('.ingredient:not(:last) .btn-add')
            .removeClass('btn-add').addClass('btn-remove')
            .removeClass('btn-success').addClass('btn-danger')
            .html('<span class="glyphicon glyphicon-minus"></span>');
    }).on('click', '.btn-remove', function(e)
    {
    $(this).parents('.ingredient:first').remove();

    e.preventDefault();
    return false;
  });
});
  </script>
</html>