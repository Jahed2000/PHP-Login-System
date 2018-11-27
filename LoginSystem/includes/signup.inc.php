<?php

if (isset($_POST['submit'])){
	 
	 include_once 'dbh.inc.php';

	 $first= mysqli_real_escape_string($conn, $_POST['first']);
	 $last= mysqli_real_escape_string($conn, $_POST['last']);
	 $uid= mysqli_real_escape_string($conn, $_POST['uid']);
	 $email= mysqli_real_escape_string($conn, $_POST['email']);
	 $pwd= mysqli_real_escape_string($conn, $_POST['pwd']);
	//error handlers
	//check if inputs are empty
	 if (empty($first) || empty($last) || empty($uid) || empty($email) || empty($pwd)) {
	 	header("location:../signup.php?login=empty");
	 } else{

	 	if (!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last)) {
	 		header("location:../signup.php?invalid");
			exit(); 
	 	} else{
	 		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	 			header("location:../signup.php?email");
				exit();



				
	 		} else{
	 			//check if user is taken
	 			$sql = "SELECT * FROM users WHERE user_id='$uid'";
	 			$result= mysqli_query($conn, $sql);
	 			$resultCheck= mysqli_num_rows($result);

	 			if ($resultCheck>0) {
	 				header("location:../signup.php?login=usertaken");
					exit();
	 			} else{
	 				//hashing pwd
	 				$hashedPwd= password_hash($pwd, PASSWORD_DEFAULT);

	 				//entering data into database
	 				$sql="INSERT INTO users (user_first,user_last,user_email,user_uid,user_pwd) VALUES ('$first','$last','$email','$uid','$pwd')";
	 				$result=mysqli_query($conn, $sql);
	 				header("location:../index.php?signup=success");
	exit();


	 			}
	 		}
	 	}
	 }

} else{
	header("location:../signup.php");
	exit();
}