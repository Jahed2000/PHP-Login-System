<?php

session_start();

if (isset($_POST['submit'])) {
	
	include 'dbh.inc.php';

	$uid= mysqli_real_escape_string($conn, $_POST['uid']);
	$pwd= mysqli_real_escape_string($conn, $_POST['pwd']);

	//error handler
	//check if inputs are empty
	if (empty($uid) || empty($pwd)) {
		header("location:../index.php?login=empty");
		exit();

	} else{
		$sql= "SELECT * FROM users WHERE user_uid='$uid'";
		$result= mysqli_query($conn, $sql);
		$resultCheck= Mysqli_num_rows($result);

		if ($resultCheck<1) {
			header("location:../index.php?login=uidfalse");
			exit();
		} else{
			if ($row= mysqli_fetch_assoc($result)) {
				//dehashing password
				$hashedPwdCheck= password_verify($pwd, $row['user_pwd']);

				if ($hashedPwdCheck== false) {
					header("location:../index.php?login=passfalse");
					exit();
				} elseif ($hashedPwdCheck== true) {
					//logging in user
					$_SESSION['u_id'] = $row['user_id'];
					$_SESSION['u_first'] = $row['user_first'];
					$_SESSION['u_last'] = $row['user_last'];
					$_SESSION['u_email'] = $row['user_email'];
					$_SESSION['u_ uid'] = $row['user_uid'];
					header("location:../index.php?login=success");
					exit();
				} 
				}
			}

		}

	} else{
		header("location:../index.php?login=error1");
					exit();
				}
	


