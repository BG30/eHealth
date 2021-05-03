<?php
	include('../config.php');
	session_start();
		
	//Initializing Variables	
	$id="";
	$password="";
	$op="";
	
	if(isset($_POST['submit'])){	
		if (isset($_POST['g-recaptcha-response']))
			$captcha=$_POST ['g-recaptcha-response'];
		
		if(!$captcha){//Failed Captcha Attempt
			echo "<script>
						alert('Please identify yourself.');
						document.location.href='login.php';
				 </script>
			";
		}
		else{ //Successful Captcha Attempt
			$id = mysqli_real_escape_string($db,$_POST['id']);
			$pass = mysqli_real_escape_string($db,$_POST['password']);
			$op = $_POST['option'];	
			
			//sign-in as doctor
			if($op=='doctor'){
				$sql="SELECT *
					  FROM doctor
					  WHERE doctorId = '$id' AND password = '$pass'   
				";
				$result=mysqli_query($db, $sql);
				$count = mysqli_num_rows($result);
				
				if($count==1){//credentials are true 
					$_SESSION['ID']=$id;
					header('location: ../doctor/doctorHome.php');
				}
				else{//incorrect credentials
					echo "<script>
							alert('Incorrect id and/or password');
							document.location.href='login.php';
						 </script>
					";
				}
			}
				
			//sign-in as patient
			else if($op=='patient'){
				$sql="SELECT *
					  FROM patient
					  WHERE healthNo = '$id' AND password = '$pass'
				";
				$result=mysqli_query($db, $sql);
				$count = mysqli_num_rows($result);
				if($count==1){//credentials are true
					$_SESSION['ID']=$id;
					header('location: ../patient/patientHome.php');
				}
				else{//incorrect credentials
					echo "<script>
							alert('Incorrect id and/or password');
							document.location.href='login.php';
						  </script>
					";
				}
			}
			
			//sign-in as admin
			else if($op=='admin'){
				$sql="SELECT *
					  FROM administrator
					  WHERE adminId = '$id' AND password = '$pass'
				";
				$result = mysqli_query($db, $sql);
				$count = mysqli_num_rows($result);
				if($count==1){//credentials are true
					$_SESSION['ID']=$id;
					header('location: ../admin/index.php');
				}
				else{//incorrect credentials
					echo "<script>
							alert('Incorrect id and/or password');
							document.location.href='login.php';
						 </script>
				";
				}
			}
			else{//credentials are not in database or has not selected radio button
				header('location: login.php');
				echo "<script type='text/javascript'>
							alert('Incorrect id and/or password');
					   </script>";
			}
		}
	}
?>