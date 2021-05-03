<?PHP
	include('../config.php');
	SESSION_START();
?>
<!DOCTYPE html>
<html>
	<head>
		<script src='https://www.google.com/recaptcha/api.js'></script>
		<title>Login Page</title>
	</head>
	<body background="../reglog.jpg">
		<center>
			<h2>
				Login Form
			</h2>
		</center>
			
		<form action="sendLoginRequest.php" method="post">
			<center>	
				<label>
					<b>User ID*:</b>
				</label>
				<input type="text" placeholder="Enter User ID" name="id" required><br>
				
				<label>
					<b>Password*:</b>
				</label>				
				<input type="password" placeholder="Enter Password" name="password" required><br>
				
				<input type="radio" name="option" value="doctor">Doctor
				<input type="radio" name="option" value="patient">Patient
				<input type="radio" name="option" value="admin">Administrator<br>

				<br><div class="g-recaptcha" data-sitekey="6LfrlHcUAAAAAL24KtAgO0Puf0Tt0WMXn8f8r-Rt"></div><br>
				
				<button name="submit" type="submit">Login</button>
				<a href="register.php"><button type="button">Register</button></a>
				<a href="index.php"><button type="button">Home Page</button></a>
			</center>
		</form>
	</body>
</html>