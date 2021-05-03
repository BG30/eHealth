<?php
	include("../config.php");
	session_start();

	//Initialize Variables
	$id="";
	$name="";
	$email="";
	$medLic="";
	$busLic="";
	$phone="";
	$address="";
	$special="";
	$deg="";
	$pass="";
	$checkPass="";
	
	if(isset($_POST["Submit"])){//form has been submitted
		
		$id = mysqli_real_escape_string($db,$_POST['doctorId']);
		$name = mysqli_real_escape_string($db,$_POST['name']);
		$email = mysqli_real_escape_string($db,$_POST['email']);
		$medLic = mysqli_real_escape_string($db,$_POST['medicalLicence']);
		$busLic = mysqli_real_escape_string($db,$_POST['businessLicence']);
		$phone = mysqli_real_escape_string($db,$_POST['phoneNo']);
		$address = mysqli_real_escape_string($db,$_POST['address']);
		$special = mysqli_real_escape_string($db,$_POST['special']);
		$deg = mysqli_real_escape_string($db,$_POST['degree']);
		$pass = mysqli_real_escape_string($db,$_POST['password']);
		$checkPass = mysqli_real_escape_string($db,$_POST['checkPassword']);
		
		if($pass == $checkPass){//passwords match
			$sql="SELECT *
				  From doctor
				  WHERE doctorId = '$id'
			";
			$result=mysqli_query($db, $sql);
			$count = mysqli_num_rows($result);
			
			if($count==0){//new id
				$sql="SELECT *
					  From doctor
					  WHERE medicalLicense = '$medLic'
				";
				$result=mysqli_query($db, $sql);
				$med = mysqli_num_rows($result);
				
				if($med==0){//unique medicalLicence
					$sql="INSERT INTO doctor (doctorId, name, email, medicalLicense,businessLicense,phoneNo, address, specializations, degrees, password)
						  VALUES ('$id', '$name', '$email', '$medLic', '$busLic', '$phone', '$address', '$special', '$deg', '$pass')
					     ";
					mysqli_query($db,$sql);
					echo "<script>
								alert('Registered Successfully!');
								document.location.href='index.php';
						  </script>
					";
				}
				else{//medical Licence already exists in the database
					echo "<script>
								alert('Medical License already exists in database!');
								document.location.href='registerDoctor.php';
						  </script>
					";
				}
			}
			
			else{//id exists in database
				echo "<script>
							alert('Credentials already exist, try again.');
							document.location.href='registerDoctor.php';
					  </script>
				";
			}
		}
		
		else{//passwords don't match
			echo "<script>
							alert('Passwords do not match, try again.');
							document.location.href='registerDoctor.php';
					  </script>
				";
		}
	}
?>