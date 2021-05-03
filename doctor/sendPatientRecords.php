<?php
	include('../config.php');
	session_start();
	//Initialize variables
	$prescriptionNo="";
	$appt="";
	$person="";
	$recordNo="";
	$observe="";
	$test="";
	
	
	if(isset($_POST["submit"])){
		$observe=mysqli_real_escape_string($db,$_POST['observe']);
		$person=$_SESSION['healthNo'];
		$appt=$_SESSION['appointNo'];
		$test="none";
		
		//record number incremental
		$sql = mysqli_query($db, "SELECT MAX(recordNo) FROM record");
		$row = mysqli_fetch_array($sql);		
		$value=$row['0'];
		$recordNo=$value+1;
		
		//prescriptonNo will be 0
		$prescriptionNo=0;
		
		$sql = "INSERT INTO record (recordNo, healthNo, appointNo, prescriptionNo, observations, testResult) 
				VALUES ('$recordNo','$person', '$appt','$prescriptionNo', '$observe', '$test')
			   ";
		mysqli_query($db,$sql);
		
		echo "<script>
					document.location.href='patientMedicalrecords.php';
					alert('Observation successfully added!');
			 </script>
		";
	}
	else{
		echo "<script>
					document.location.href='patientMedicalrecords.php';
					alert('Observation did not upload.');
			 </script>
		";
	}
?>