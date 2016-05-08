<?php
	session_start();
	echo @$_SESSION["submit"];
	if(@$_SESSION["submit"] == true) {
		header('Location: surveyHandler.php');
	}
?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="../../favicon.ico">

  <title>Homepage</title>

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

  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.red-blue.min.css" />
	<script defer src="https://code.getmdl.io/1.1.3/material.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="jumbotron">
			<h1>Best Restaurant</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<form action="surveyHandler.php" method="post">
					<h2>Atmosphere</h2>
					<p><label for="family">Family Friendly:&nbsp;</label>
						<select name="family" id="">
							<option value="">Select...</option>
							<option value="JBs">JB's</option>
							<option value="Gringos">Gringo's</option>
							<option value="Original_Thai">Original Thai</option>
							<option value="The_Hickory">The Hickory</option>
						</select>
					</p>
					<p>
						<label for="date">Date Friendly:&nbsp;</label>
						<select name="date" id="">
							<option value="">Select...</option>
							<option value="JBs">JB's</option>
							<option value="Gringos">Gringo's</option>
							<option value="Original_Thai">Original Thai</option>
							<option value="The_Hickory">The Hickory</option>
						</select>
					</p>
					<h2>Quality</h2>
					<p>
						<label for="service">Service of Wait Staff:&nbsp;</label>
						<select name="service" id="">
							<option value="">Select...</option>
							<option value="JBs">JB's</option>
							<option value="Gringos">Gringo's</option>
							<option value="Original_Thai">Original Thai</option>
							<option value="The_Hickory">The Hickory</option>
							</select>
						</p>
					<p>
						<label for="taste">Taste of Food:&nbsp;</label>
						<select name="taste" id="">
							<option value="">Select...</option>
							<option value="JBs">JB's</option>
							<option value="Gringos">Gringo's</option>
							<option value="Original_Thai">Original Thai</option>
							<option value="The_Hickory">The Hickory</option>
						</select>
					</p>
					<input type="submit" value="Submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored" />
					<input type="reset" value="Reset" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored" />
				</form>
			</div>
		</div>
    <footer class="copyright">Copyright &#169; 2016 Daniel Miller</footer>
	</div>
</body>
</html>