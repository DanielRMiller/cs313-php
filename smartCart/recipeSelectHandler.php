<?php
  session_start();
  include 'dbConnect.php';
  $stmt = $db->prepare("
    SELECT 
      r.id AS rid, 
      r.name, 
      r.description, 
      ur.selected, 
      u.id AS uid
    FROM user as u 
      JOIN user_recipe AS ur ON ur.user_id=u.id
      JOIN recipe AS r ON r.id=ur.recipe_id
    WHERE u.username=:username;");
  $stmt->execute(array(':username' => $_SESSION['username']));
  $recipes = $stmt->fetchAll(PDO::FETCH_ASSOC);
  echo '<br>';
  foreach ($recipes as $recipe) {
    $recipeSelected = isset($_POST[$recipe['rid']]);
    if (!($recipe['selected'] == $recipeSelected)) {
      $stmt = $db->prepare("
        UPDATE user_recipe
        SET selected=:selected
        WHERE user_id=:uid
          AND recipe_id=:rid
        ");
      $stmt->execute(array(':selected' => (int)$recipeSelected ,':uid' => $recipe['uid'], ':rid' => $recipe['rid']));
      echo "<br>";
    }
  }
  header("Location: menu.php");
?>