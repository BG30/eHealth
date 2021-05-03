<?php
	include("../config.php");
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Patient: Medications</title>
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
						<li class="navfont"><a href="patientHome.php">Home</a></li>
						<li class="navfont"><a href="patientTests.php">Tests</a></li>
						<li class="navfont"><a href="patientMedications.php">Medications</a></li>
						<li class="navfont"><a href="appointmentHome.php">Schedule</a></li>
						<li class="navfont"><a href="patientBilling.php">Billing</a></li>
						<li class="navfont"><a href="../homepage/login.php">Logout</a></li>
					</ul>					   
				</nav>
			</div><br>
			<main>
				<?php
					$person=$_SESSION['ID'];
					$sql = "SELECT *
							FROM medication 
							WHERE healthNo= '$person' 
						   ";
					$result = mysqli_query($db,$sql);
				
					echo ("<table border='1' bgcolor='#FFFFFF'>");
					echo"	<tr>
								<th>Prescription Number</th>
								<th>Medicine Name</th>
								<th>Medicine ID</th>
								<th>Dosage</th>
								<th>Take Date</th>
							</tr>
						";
						
					while($row = mysqli_fetch_array($result)){
						echo "</tr>";
						echo"<td>";
						echo $row['prescriptionNo'];
						echo"</td>";
						echo"<td>";
						echo $row['medicineName'];
						echo"</td>";
						echo"<td>";
						echo $row['medID'];
						echo"</td>";
						echo"<td>";
						echo $row['dosage'];
						echo"</td>";
						echo"<td>";
						echo $row['medicineTakeDate'];
						echo"</td>";
						echo"</tr>";	
					}
					echo ("</table><br><br>");
				?>
			</main>
		</div>
	</body>
	<footer style="margin-left: 70px">
		<small>© Copyright 2018 Smart Health Inc. All Rights Reserved. Authorized by the Federal Bureau of Health.</small><br>
	</footer>
</html>