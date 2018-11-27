<?php

session_start();

if (isset($_POST['submit'])) {
	
	include 'dbh.inc.php';

	$uid= $_POST['uid'];
	$pwd= $_POST['pwd'];


	$sql="SELECT * FROM users WHERE user_uid='$uid'";
	$result= mysqli_query($conn, $sql);
	$resultCheck= mysqli_num_rows($result);

	if ($resultCheck<1) {
	    header("location: ../index.php?nouser");
		exit();
	} else{
		if ($row=mysqli_fetch_assoc($result)) {
			$hashedPwdCheck= password_verify($pwd, $row['user_pwd']);

			/*for non hashed passwords
				if ($pwd!=$row['user_pwd']) { */
					if ($hashedPwdCheck==false) {
				header("location=../index.php?login=pass");
				exit();
			} /*for non hashed passwords
			elseif($pwd==$row['user_pwd']){  */
					elseif($hashedPwdCheck== true){
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


} else{
	header("location=../index.php?login=error");
	exit();

}