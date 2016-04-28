<!DOCTYPE html>
<html>
<head></head>
<body>
	<?php
		echo '<h1>hello world</h1>';
		for ($x = 0; $x <= 10; $x++) {
    		echo "<div>Div $x</div>";
		}
		$array = array("one", "two", "three", "four", "five", "six");
		foreach ($array as $key => $value) {
    		echo "<div>$value</div>";
		}
		$nameToColor = array("John" => "blue", "Jane" => "yellow");
		foreach ($nameToColor as $key => $value) {
			echo "<p>$key's favorite color is $value</p>";
		}
		$stringOfWords = "Store a sentence as a string.";
		
	?>
</body>
</html>
