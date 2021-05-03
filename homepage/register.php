<?php
	include('sendRegisterRequest.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Register</title>
	</head>
	<body background="../reglog.jpg">
		<center><h1>Register</h1></center>
		
		<form action="sendRegisterRequest.php" method="post">
			<center>
				<label><b>Name*:</b></label>
				<input type="text" maxlength="30" placeholder="Enter name" name="name" required><br>
			
				<label><b>Health Number*:</b></label>
				<input type="number" maxlength="9" placeholder="Enter health number" name="healthNo" required><br>
				
				<label><b>Email*:</b></label>
				<input type="email" maxlength="30" placeholder="Enter email" name="email" required><br>
				
				<label><b>Phone Number*:</b></label>
				<input type="tel" maxlength="9" placeholder="Enter phone number" name="phoneNo" required><br>
				
				<label><b>Address*:</b></label>
				<input type="text" maxlength="30" placeholder="Enter address" name="address" required><br>
				
				<label><b>Gender*:</b></label>
				<select name="gender">
					<option value="M">Male</option>
					<option value="F">Female</option>
				</select><br>
	 
				<label><b>Insurance Account Number:</b></label>
				<input type="text" maxlength="10" placeholder="insurance Account Number" name="insuranceAccountNo"><br>
				
				<label><b>Company Name:</b></label>
				<input type="text" maxlength="30" placeholder="Enter Insurance company" name="company"><br>
				
				<label><b>Password*:</b></label>
				<input type="password" maxlength="20" placeholder="Enter Password" name="password" required><br>
				
				<label><b>Confirm Password*:</b></label>
				<input type="password" maxlength="20" placeholder="Enter Password" name="checkPass" required><br>
				
				<button name="regUser" type="submit">Sign Up</button><br>
				
				<a href="login.php"><button type="button">Back to Login</button></a><br>
			</center>
		</form>
	</body>
</html>