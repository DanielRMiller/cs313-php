<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset = "utf-8" />
		<title>Daniel Miller's Assignments</title>
		<link rel="stylesheet" type="text/css" href="external.css" />
	</head>
	<body>
		<header id="top"><h1 class="title">CS 313 Assignments</h1></header>
		
		<table id="main">
			<tr>
				<td>
					<ul>
						<?php 
							for ($x = 1; $x <= 9; $x++) {
								echo "<li><a href=\"assign{$x}.html\">Assignment {$x}</a></li>";
							} 
						?>
					</ul>
				</td>
			</tr>
		</table>
	</body>
</html>
