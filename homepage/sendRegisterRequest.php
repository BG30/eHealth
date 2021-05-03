<?php
	include('../config.php');
	session_start();
	
	//Initialize variables
	$name = "";
	$healthNo = "";
	$email = "";
	$phoneNo = "";
	$address = "";
	$gender = "";
	$insuranceAccountNo = "";
	$company = "";
	$password = "";
	$checkPass = "";
												
	if(isset($_POST["regUser"])){
		$name = mysqli_real_escape_string($db,$_POST['name']);
		$healthNo = mysqli_real_escape_string($db,$_POST['healthNo']);
		$email = mysqli_real_escape_string($db,$_POST['email']);
		$phoneNo = mysqli_real_escape_string($db,$_POST['phoneNo']);
		$address = mysqli_real_escape_string($db,$_POST['address']);
		$gender = mysqli_real_escape_string($db,$_POST['gender']);
		$insuranceAccountNo = mysqli_real_escape_string($db,$_POST['insuranceAccountNo']);
		$company = mysqli_real_escape_string($db,$_POST['company']);
		$password = mysqli_real_escape_string($db,$_POST['password']);
		$checkPass = mysqli_real_escape_string($db,$_POST['checkPass']);
												
		if($password==$checkPass){//proceed if passwords match               
			$sql="SELECT *
				  From patient
				  WHERE healthNo = '$healthNo'
			";
			$result=mysqli_query($db, $sql);
			$count = mysqli_num_rows($result);
			//check if healthNo in database
			if($count==0){//new healthNo      
				$sql="INSERT INTO patient (healthNo, name, email, phoneNo, address, gender, password)
					  VALUES ('$healthNo','$name','$email','$phoneNo','$address','$gender','$password')
				     ";
				mysqli_query($db,$sql);
				echo "<script>
							alert('Registered Successfully!');
							document.location.href='login.php';
					  </script>
				";
	
				$sql="INSERT INTO insurancedetails(insuranceAccountNo, healthNo,companyName)
					  VALUES ('$insuranceAccountNo', '$healthNo','$company')
				     ";
				mysqli_query($db,$sql);
					
				$sql="INSERT INTO patient(insuranceAccountNo)
					  VALUES ('$insuranceAccountNo')
					 ";
				mysqli_query($db,$sql);
					
				$sql="INSERT INTO patient (healthNo, name, email, phoneNo, address, gender, password)
					  VALUES ('$healthNo', '$name', '$email', '$phoneNo', '$address', '$gender', '$password')
				     ";
				mysqli_query($db,$sql);
				echo "<script>
							alert('Registered Successfully!');
							document.location.href='login.php';
					  </script>
					";
			}
			else{//healthNo already exists in database         
				echo "<script>
							alert('Cannot register with this health Number.');
							document.location.href='register.php';
					  </script>
				";
			}
		}
		else{//passwords do not match   
			echo "<script>
							alert('Passwords do not match, try again.');
							document.location.href='register.php';
					  </script>
				";
		}
	}
?>