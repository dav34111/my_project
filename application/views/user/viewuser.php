<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Check</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
	<div class="container">
		<div class="title"><h1>LOGIN</h1></div>
		<form action="user/login" method="post">
			<div class="inputs">
				<input type="text" class="inp_1" name="login" placeholder="USERNAME"><br>
				<input type="password" class="inp_2" name="pass" placeholder="PASSWORD"><br>
				<input type="submit" class="but" value="Login" >
			</div>
		</form>
		<div class="info_disp">
			<?php 
				session_start();
					if (isset($_SESSION['msg'])) {
						echo $_SESSION['msg'];
					}
				session_destroy();
			?>
		</div>
	</div>
</body>
</html>