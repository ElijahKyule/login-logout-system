<? php
if (isset($_POST['submit'])) {

	include_once 'dbh.inc.php';

	$first = mysqli_real_escape_string($conn, $_POST['first']);
	$last = mysqli_real_escape_string($conn, $_POST['last']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$uid = mysqli_real_escape_string($conn, $_POST['uid']);
	$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

	//Error handlers
	//check forempty fields
	 if (empty($first) || empty($last) || empty($email) || empty($uid) || empty($pwd)) {
    	header("Location: ../signup.php?signup=empty");
	    exit();
	} else {
	 	//check if characters are valid
		if (!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $first)) {
	   	       header("Location: ../signup.php?signup=characters invalid");
	           exit();
	 	} else {
    		//check if email is valid
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	 			header("Location: ../signup.php?signup=invalid email");
	            exit();
			} else {
    			$sql = "SELECT * FROM users WHERE user_uid = '$uid'";
				$result = mysql_query($conn, $sql);
	 			$resultCheck = mysql_num_rows($result);
				
	 			if ($resultCheck > 0 ) {
	 				header("Location: ../signup.php?signup=usertaken");
	                 exit();
	 			} else {
					//hashing password
					$hashedpwd = password_hash($pwd, PASSWORD_DEFAULT)
    				//insert the user into database
					$sql = "INSERT INTO users (user_first, user_last, user_email, user_uid, user_pwd) VALUES ('$first', '$last', '$email', '$uid', '$hashedpwd');";
					mysql_query($conn, $sql);
					header("Location: ../signup.php?signup=success");
	                exit();

				}
				
	 		}
			
	 	}
		
	 }
	
	.
} else {
	header("Location: ../signup.php");
	exit();
}
