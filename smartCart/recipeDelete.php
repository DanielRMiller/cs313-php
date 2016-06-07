<?php
  include 'dbConnect.php';
  $stmt = $db->prepare("
    DELETE FROM user_recipe WHERE recipe_id=:id
    ");
  $stmt->execute(array(':id' => $_POST['id']));
  $stmt = $db->prepare("
    DELETE FROM recipe_ingredient WHERE recipe_id=:id
    ");
  $stmt->execute(array(':id' => $_POST['id']));
  $stmt = $db->prepare("
    DELETE FROM recipe WHERE id=:id
    ");
  $stmt->execute(array(':id' => $_POST['id']));
 ?>