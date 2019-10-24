<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<header>
		<nav>
			<div class = main-wrapper>
				<ul>
					<li><a href="index.php">HOME</a></li>
				</ul>
				<div class="nav-login">
					<?php

					if (isset($_SESSION['u_id'])) {
						echo '<form action="logout.php" method="POST">
						<button type="submit" name="submit">Logout</button>
					    </form>';
						
					} else {
						echo ' <form action="login.inc.php" method="POST">
						<input type="text" name="uid" placeholder="Username/e-mail">
						<input type="password" name="pwd" placeholder="password">
						<button type="submit" name="submit">Login</button>
					    </form>
					    <a href="signup.php">Signup</a>';			   
					}
					?>
					
				</div>
				
			</div>
		</nav>
		
	</header>