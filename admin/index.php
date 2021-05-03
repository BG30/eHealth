<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Admin: Home</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="../deCss.css">
		<link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Macondo" rel="stylesheet"
	</head>
	<body background="../adminWall.jpg">
		<div id="wrapper">
			<main>
				<center>
					<h1>Administrator</h1>
					<label>Make Changes to the Database</label>
					<button onclick="location.href='http://localhost/phpmyadmin/'" type= "button">Edit System</button><br><br>
					
					<label>Register a doctor into the system</label>
					<button onclick="location.href='registerDoctor.php'" type= "button">Register</button><br><br>
					
					<label>Send payments to vendors</label>
					<button onclick="validatePayment()">Send Payments</button><br><br>
					<p id="valPay"></p>
					<script>
						function validatePayment(){
							var response;
							if (confirm("Do you wish to validate all insurance payments!")){
								response = "All payments have been successfully validated";
							} 
							else{
								response = "Action terminated!";
							}
							document.getElementById("valPay").innerHTML = response;
						}
					</script>
					
					
					<label>Export medical tests to vendors</label>
					<button onclick="info()">Export</button><br><br>
					<p id="io"></p>
					<script>
						function info(){
							var response;
							if (confirm("Do you wish to send medical tests to vendors")){
								response = "Successfully sent medical tests!";
							} 
							else{
								response = "Medical tests not sent!";
							}
							document.getElementById("io").innerHTML = response;
						}
					</script>
					
					<label>Import medical information/ tests from vendors</label>
					<button onclick="take()">Import</button><br><br>
					<p id="to"></p>
					<script>
						function take(){
							var response;
							if (confirm("Do you wish to import medical information from vendors")){
								response = "Medical tests/ information successfully imported and saved!";
							} 
							else{
								response = "Medical information not recieved!";
							}
							document.getElementById("to").innerHTML = response;
						}
					</script>
					<button onclick="location.href='../homepage/login.php'" type= "button">Logout</button><br><br>
				</center>
			</main>
		</div>
	</body>
	<footer style="margin-left: 70px">
		<small>© Copyright 2018 Smart Health Inc. All Rights Reserved. Authorized by the Federal Bureau of Health.</small><br>
	</footer>
</html>