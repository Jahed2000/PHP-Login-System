<?php

if (isset($_POST['submit'])) {
	
	include_once 'dbh.inc.php';

	$first= $_POST['first'];
	$last= $_POST['last'];
	$uid= $_POST['uid'];
	$email= $_POST['email'];
	$pwd= $_POST['pwd'];

	$sql="INSERT INTO users (user_first, user_last, user_email, user_uid, user_pwd) VALUES ('$first', '$last', '$email', '$uid', '$pwd');";
	$result=mysqli_query($conn, $sql);

	header("location:../index.php?signup=success");
	

} else{

	header("Location:../signup.php");
	exit();
}