<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset = "utf-8" />
		<title>Daniel Miller's Assignments</title>
	</head>
	<body>
		<h1 class="title">CS 313 Assignments</h1>
		<table>
			<tr>
				<td>
					<ul>
						<?php 
							for ($x = 1; $x <= 9; $x++) {
								echo "<li><a href=\"assign0{$x}.html\">Assignment {$x}</a></li>";
							} 
						?>
					</ul>
				</td>
			</tr>
		</table>
	</body>
</html>
