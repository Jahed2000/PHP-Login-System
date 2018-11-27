<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
	<title>Login System</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
	<header>
		<nav>
			<div class="main-wrapper">
				<ul>
					<li><a href="index.php">Home</a></li>
					<!--<li><a href="index.php">About</a></li>-->
				</ul>

				<?php 
				if (isset($_SESSION['u_id'])) {
				?>
				<div class="nav-logout">
				<form action="includes/logout.inc.php" method="POST">
					<button type="submit" name="submit">Logout</button>
				</form>
				</div>

				
				<?php } else{ ?>
					<div class="nav-login">
					<form action="includes/login.inc.php" method="POST">
						<input type="text" name="uid" placeholder="username/email">
						<input type="password" name="pwd" placeholder="password">
						<button type="submit" name="submit">Login</button>
					</form>
					<a href="signup.php">Sign up</a>
					
				</div>
 
				<?php } ?>

			</div>
		</nav>
	</header>