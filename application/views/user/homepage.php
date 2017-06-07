<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Home</title>
</head>
<body>
<input type="text" class="name" placeholder="Type country name"><br>
<input type="text" class="code" placeholder="Type country code"><br>
<input type="text" class="district" placeholder="Type district"><br>
<input type="text" class="population" placeholder="Type population"><br>
<button id="add">Add</button>
<div id="disp"></div>
<hr>
<h1>Nor file</h1>
	<table border="2" cellpadding="20">
		<tr>
			<th>Name</th>
			<th>CountryCode</th>
			<th>District</th>
			<th>Population</th>
			<th colspan="2">Edit</th>
		</tr>
		<?php 
		if (!empty($inf)) {
			foreach ( $inf as $value) {
				echo '<tr id='.$value['id'].'>';
					echo '<td contenteditable="true">'.$value['name'].'</td>';
					echo '<td contenteditable="true">'.$value['countrycod'].'</td>';
					echo '<td contenteditable="true">'.$value['district'].'</td>';
					echo '<td contenteditable="true">'.$value['population'].'</td>';
					echo '<td><button class="update">Update</button></td>';
					echo '<td><button class="delete">Delete</button></td>';
				echo '</tr>';
			}
		}
		?>
	</table>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="../scripts/script.js" type="text/javascript"></script>
</body>
</html>