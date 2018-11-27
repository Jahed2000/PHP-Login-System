<?php

if (isset($_POST['submit'])) {
	session_start();
	session_destroy();
	session_unset();
	header("location:../index.php?log=out");
	exit();
}