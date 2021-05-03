<?php
	include('../config.php');
	session_start();
	//Initialize Variable
	$appt="";
	$id="";
	
	if(isset($_POST['submit'])){//check if option selected
		$appt=mysqli_real_escape_string($db,$_POST['appt']);
		$id=$_SESSION['ID'];
		$_SESSION['appointNo']=$appt;
		
		$sql = "SELECT *
				FROM appointment
				WHERE appointNo='$appt'
			   ";
		$result = mysqli_query($db,$sql);	
		$row = mysqli_fetch_array($result);
		$_SESSION['healthNo']=$row[2];
		
		header('location: patientInfo.php');
	}
	else{//didn't select a patient
		echo "<script>
						alert('Please select a patient.');
						document.location.href='patientSelect.php';
				 </script>
			";
	}
?>