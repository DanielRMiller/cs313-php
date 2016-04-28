<?php 
	$count = 0;
	if (!$_COOKIE["pageView"]) {
		$count = 1;
	}
	else {
		$count = $_COOKIE["pageView"] + 1;
	}
	setcookie("pageView", $count, time() + 1000);
 ?>
<!DOCTYPE html>

<html>
	<head></head>
	<body>
		<h1>Fun with cookies!</h1>
		<?php 

		 ?>
	</body>
</html>