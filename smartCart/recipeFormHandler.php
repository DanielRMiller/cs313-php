<?php
  session_start();
  include 'dbConnect.php';
  $stmt = $db->prepare("
    SELECT name
    FROM recipe
    WHERE name=:name
    ");
  $name = $_POST['recipeName'];
  $stmt->execute(array(':name' => $name));
  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
  if (!empty($results)) {
    header("Location: recipeForm.php?error=That Recipe Already Exists!");
  }
  else {
    $uid = (int)$_SESSION['id'];
    $stmt = $db->prepare("
      INSERT INTO recipe
      SET
        name=:name,
        description=:description,
        created_by=:creator
      ");
    $stmt->execute(array(':name' => $name, ':description' => $_POST['recipeDescription'], ':creator' => $uid));
    $rid = $db->lastInsertId();
    $stmt = $db->prepare("
      INSERT INTO user_recipe
      SET
        recipe_id=:rid,
        user_id=:uid
      ");
    $stmt->execute(array(':rid' => $rid, ':uid' => (int)$_SESSION['id'] ));
    // For each of the ingredients they provided
    foreach ($_POST['ingredientName'] as $key => $name) {
      $measurement_type = $_POST['ingredientMeasurementType'][$key];
      $ingredient_amount = $_POST['ingredientAmount'][$key];
      if (!$name) {
        continue;
      }
      // Get the Ingredient ID if it exists
      $stmt = $db->prepare("
        SELECT id 
        FROM ingredient 
        WHERE name=:name 
        LIMIT 1"
      );
      $stmt->execute(array(':name' => $name));
      $iid = $stmt->fetch(PDO::FETCH_ASSOC)['id'];
      var_dump($iid);
      // If it does not then create it
      if (empty($iid)) {
        $stmt->execute(array(':name' => $name));
        $stmt = $db->prepare("
          INSERT INTO ingredient
          SET
            name=:name
          ");
        $stmt->execute(array(':name' => $name));
        $iid = $db->lastInsertId();
      }
      // Hook the ingredient (new or just made) to the new recipe
      // This statement will set or update depending if the item is already there.
      $stmt = $db->prepare("
        INSERT INTO recipe_ingredient
        SET
          ingredient_id=:iid,
          measurement_type=:measurement,
          amount=:amount,
          recipe_id=:rid
        ON DUPLICATE KEY UPDATE 
          measurement_type=:measurement,
          amount=:amount;
        ");
      $stmt->execute(array(
          ':iid' => $iid,
          ':measurement' => $measurement_type,
          ':amount' => $ingredient_amount,
          ':rid' => $rid));
    }
    header("Location: recipes.php");
  }
?>