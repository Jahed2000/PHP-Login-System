<?php
	include_once 'header.php';
?>

<section class="main-container">
	<div class="main-wrapper">
		<h3>Sign Up</h3>
		<form class="signup-form" action="includes/signup.inc.php" method="POST">
			<input required type="text" name="first" placeholder="First Name">
			<input type="text" name="last" placeholder="Last Name">
			<input type="text" name="uid" placeholder="User id">
			<input type="text" name="email" placeholder="E-mail">
			<input type="password" name="pwd" placeholder="password">
			<button type="submit" name="submit">Signup</button>
		</form>

	</div>

</section>

<?php
	include_once 'footer.php';
?>
