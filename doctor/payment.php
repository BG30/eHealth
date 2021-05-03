<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Doctor: Payment</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="../deCss.css">
		<link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Macondo" rel="stylesheet"
	</head>
	<body id="flatDoc">
		<div id="wrapper">
		<div>
			<nav>
				<ul>
					<li><a href="doctorHome.php"><img src="doctorIndex.png" alt="Doctor Homepage" width="120" height="60"></a></li>
					<li class="navfont"><a href="patientSelect.php">Select Patient</a></li>
					<li class="navfont"><a href="timeTable.php">Schedule</a></li>
					<li class="navfont"><a href="../homepage/login.php">Sign-Out</a></li> 
				</ul>					   
			</nav>
		</div><br>
			<center>	
				<form action="sendPayment.php" method="post">
					
					<label>Card Number*:</label>
					<input type="text" maxlength="16" name="cardNum" required><br>
			
					<label>Card Type*:</label>
					<select name="cType">
						<option value="C">Credit Card</option>
						<option value="D">Debit Card</option>
					</select><br>
					
					<label>Amount*:</label>
					<input type="text" placeHolder="$" name="amount" required><br>
						
					<input type="submit" value="submit" name="submit">
				</form>
		</center>
		</div>
	</body>
	<footer style="margin-left: 70px">
		<small>© Copyright 2018 Smart Health Inc. All Rights Reserved. Authorized by the Federal Bureau of Health.</small><br>
	</footer>
</html>