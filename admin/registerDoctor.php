<?php
	include("sendDoctorRegRequest.php");
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Admin: Register Doctor</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="../deCss.css">
		<link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Macondo" rel="stylesheet"
	</head>
	<body id="flatDoc">
		<div id="wrapper">
			<main>
				<center>
					<h2>Register Doctor</h2>
					
					<form action="sendDoctorRegRequest.php" method="post">
					
						<label for='doctorId' >Doctor ID*: </label>
						<input type='number' name='doctorId' id='doctorId' maxlength="9" required><br>
					
						<label for='name' >Name*: </label>
						<input type='text' name='name' id='name' maxlength="30" required><br>
					
						<label for='email' >Email Address*:</label>
						<input type='email' name='email' id='email' maxlength="30" required><br> 

						<label for='medicalLicense' >Medical Licence Number*:</label>
						<input type='text' name='medicalLicence' id='MedicalLicence' maxlength="10" required><br>
				
						<label for='businessLicence' >Busincess Licence Number*: </label>
						<input type='text' name='businessLicence' id='businessLicence' maxlength="10" required><br>
					
						<label for='phoneNo' >Phone Number*: </label>
						<input type='tel' name='phoneNo' id='phoneNo' maxlength="10" required><br>
					
						<label for='address' >Address*: </label>
						<input type='text' name='address' id='address' maxlength="30" required><br>
					
						<label for='special' >Specialization*: </label>
						<input type='text' name='special' id='special' maxlength="40" required><br>
				
						<label for='degrees' >Degrees*: </label>
						<input type='text' name='degree' id='degree' maxlength="" required><br>
					
						<label for='password' >Password*:</label>
						<input type='password' name='password' id='password' maxlength="20" required><br>
						
						<label for='password' >Re-Enter Password*:</label>
						<input type='password' name='checkPassword' id='checkPassword' maxlength="20" required><br>
						
						<input type='submit' name='Submit' value='Submit'>
					</form>
				</center>
			</main>
		</div>
	</body>
	<footer style="margin-left: 70px">
		<small>© Copyright 2018 Smart Health Inc. All Rights Reserved. Authorized by the Federal Bureau of Health.</small><br>
	</footer>
</html>