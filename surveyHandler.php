<?php
	session_start();
	if ((isset($_POST["family"]) || 
			isset($_POST["date"]) || 
			isset($_POST["service"]) || 
			isset($_POST["taste"])) &&
			@!$_SESSION["submit"]) {
		$_SESSION["submit"] = true;

		$family = $_POST["family"];
		$date = $_POST["date"];
		$service = $_POST["service"];
		$taste = $_POST["taste"];
		try {
			@$file = explode(',', file_get_contents("responses.txt"));
			if (!$file) {
				throw new Exception('Failed to open uploaded file');
			}
		} catch (Exception $e) {
			die("<h2>Unable to open file!</h2>");
		}
		$enum = array('JBs' => 0, 'Gringos' => 1, 'Original_Thai' => 2, 'The_Hickory' => 3);
		$row = 0;
		if ($family !== ''){
			$file[$enum[$family]+$row*5] = $file[$enum[$family]+$row*5] + 1;
			$file[4+$row*5] = $file[4+$row*5] + 1;
		}
		$row = $row + 1;
		if ($date !== ''){
			$file[$enum[$date]+$row*5] = $file[$enum[$date]+$row*5] + 1;
			$file[4+$row*5] = $file[4+$row*5] + 1;
		}
		$row = $row + 1;
		if ($service !== ''){
			$file[$enum[$service]+$row*5] = $file[$enum[$service]+$row*5] + 1;
			$file[4+$row*5] = $file[4+$row*5] + 1;
		}
		$row = $row + 1;
		if ($taste !== ''){
			$file[$enum[$taste]+$row*5] = $file[$enum[$taste]+$row*5] + 1;
			$file[4+$row*5] = $file[4+$row*5] + 1;
		}
		file_put_contents('responses.txt', implode(",", $file));
	}
	else {
		try {
			@$file = explode(',', file_get_contents("responses.txt"));
			if (!$file) {
				throw new Exception('Failed to open uploaded file');
			}
		} catch (Exception $e) {
			die("<h2>Unable to open file!</h2>");
		}
	}
	$row = 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="../../favicon.ico">

  <title>Survey Results</title>

  <!-- JQuery and Bootstrap JavaScript for carousel -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

  <!-- Custom styles -->
  <link rel="stylesheet" href="style.css">

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body>
	<div class="container">
		<div class="jumbotron">
			<h2>Why People Like Restaurants</h2>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-1 col-sm-2 col-md-3"></div>
		<div class="col-xs-10 col-sm-8 col-md-6">
			<div class="panel panel-default table-responsive">
				<h3>Family Atmosphere is the Best</h3>
				<table class="table table-hover table-striped">
					<?php
						@$num = round(($file[0+$row*5] / $file[($row+1)*5-1]) * 100, 0);
						echo "<tr><td>JB's</td><td>$num%</td></tr>";
						@$num = round(($file[1+$row*5] / $file[($row+1)*5-1]) * 100, 0);
						echo "<tr><td>Gringo's</td><td>$num%</td></tr>";
						@$num = round(($file[2+$row*5] / $file[($row+1)*5-1]) * 100, 0);
						echo "<tr><td>Original Thai</td><td>$num%</td></tr>";
						@$num = round(($file[3+$row*5] / $file[($row+1)*5-1]) * 100, 0);
						echo "<tr><td>The Hickory</td><td>$num%</td></tr>";
						$row = $row+1;
					?>
				</table>
				<h3>Dating Atmosphere is the Best</h3>
				<table class="table table-hover table-striped">
					<?php
						@$num = round(($file[0+$row*5] / $file[($row+1)*5-1]) * 100, 0);
						echo "<tr><td>JB's</td><td>$num%</td></tr>";
						@$num = round(($file[1+$row*5] / $file[($row+1)*5-1]) * 100, 0);
						echo "<tr><td>Gringo's</td><td>$num%</td></tr>";
						@$num = round(($file[2+$row*5] / $file[($row+1)*5-1]) * 100, 0);
						echo "<tr><td>Original Thai</td><td>$num%</td></tr>";
						@$num = round(($file[3+$row*5] / $file[($row+1)*5-1]) * 100, 0);
						echo "<tr><td>The Hickory</td><td>$num%</td></tr>";
						$row = $row+1;
					?>
				</table>
				<h3>Wait Staff Quality is the Best</h3>
				<table class="table table-hover table-striped">
					<?php
						@$num = round(($file[0+$row*5] / $file[($row+1)*5-1]) * 100, 0);
						echo "<tr><td>JB's</td><td>$num%</td></tr>";
						@$num = round(($file[1+$row*5] / $file[($row+1)*5-1]) * 100, 0);
						echo "<tr><td>Gringo's</td><td>$num%</td></tr>";
						@$num = round(($file[2+$row*5] / $file[($row+1)*5-1]) * 100, 0);
						echo "<tr><td>Original Thai</td><td>$num%</td></tr>";
						@$num = round(($file[3+$row*5] / $file[($row+1)*5-1]) * 100, 0);
						echo "<tr><td>The Hickory</td><td>$num%</td></tr>";
						$row = $row+1;
					?>
				</table>
				<h3>Quality of Taste is the Best</h3>
				<table class="table table-hover table-striped">
					<?php
						@$num = round(($file[0+$row*5] / $file[($row+1)*5-1]) * 100, 0);
						echo "<tr><td>JB's</td><td>$num%</td></tr>";
						@$num = round(($file[1+$row*5] / $file[($row+1)*5-1]) * 100, 0);
						echo "<tr><td>Gringo's</td><td>$num%</td></tr>";
						@$num = round(($file[2+$row*5] / $file[($row+1)*5-1]) * 100, 0);
						echo "<tr><td>Original Thai</td><td>$num%</td></tr>";
						@$num = round(($file[3+$row*5] / $file[($row+1)*5-1]) * 100, 0);
						echo "<tr><td>The Hickory</td><td>$num%</td></tr>";
						$row = $row+1;
					?>
				</table>
			</div>
		</div>
		<div class="col-xs-1 col-sm-2 col-md-3"></div>
	</div>
  <footer class="copyright">Copyright &#169; 2016 Daniel Miller</footer>
</body>
</html>