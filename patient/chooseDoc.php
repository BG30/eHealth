<html> 
	<head>
		<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
		<meta charset="utf-8">
		<title>Doctor Map</title>		
	</head>
	<body background="../reglog.jpg">
		<?php
			include('../config.php');
			session_start();
			
			if(isset($_POST['submit'])){//getting the type of doctor that the patient wants to book with
				$type=$_POST['option'];
			}
			$id = $_SESSION['ID'];
			
			$sql = "SELECT *
					FROM doctor							
					WHERE specializations = '$type'
					";
			$result = mysqli_query($db,$sql);
				
			echo "<h1>";
			echo "Booking with ".$type;
			echo "</h1>";
				
			echo ("<table border='1' bgcolor='#FFFFFF'>");
			echo"	<tr>
						<th>Name</th>
						<th>Doctor ID</th>
						<th>Email</th>
						<th>Phone Number</th>
						<th>Address</th>
						<th>Degree</th>
					</tr>
				";
						
			while($row = mysqli_fetch_array($result)){
				echo "</tr>";
				echo "<td>";
				echo $row['name'];
				echo "</td>";
				echo "<td>";
				echo $row['doctorId'];
				echo "</td>";
				echo "<td>";
				echo $row['email'];
				echo "</td>";
				echo "<td>";
				echo $row['phoneNo'];
				echo "</td>";
				echo "<td>";
				echo $row['address'];
				echo "</td>";
				echo "<td>";
				echo $row['degrees'];
				echo "</td>";
				echo "</tr>";	
			}
			echo ("</table><br><br>");
		?> 
		
		<button onclick="location.href='patientHome.php'" type= "button">Go Back</button>
			
		<form action="appointmentForm.php" method="post">
			<label>Select Doctor ID*: </label>
			<select name="doc">
				<?php
					$sql="SELECT *
						  FROM doctor
						  WHERE specializations = '$type'
					";
					$result = mysqli_query($db,$sql);
					while($row = mysqli_fetch_array($result)){
						echo "<option value=";
						echo $row['doctorId'];
						echo ">";
						echo $row['name'];
						echo "-";
						echo $row['doctorId'];
						echo "</option>";
					}
				?>
				</select>		
				<button name='submit' type="submit">Submit</button>
		</form>
			
		<div id="map"></div>
	</body>
</html>