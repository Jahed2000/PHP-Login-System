<?php
	include_once 'header.php';
?>

<section class="main-container">
	<div class="main-wrapper">
		<h3>Homepage</h3>

		<?php
		if (isset($_SESSION['u_id'])) {
			echo 'You are logged in';
		}
		?>

	</div>

</section>

<?php
	include_once 'footer.php';
?>

