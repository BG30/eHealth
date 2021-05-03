<?php
	include('../config.php');
	session_start();
	
	//Initialize Variables
	$prescriptionNo="";
	$medID="";
	$medName="";
	$medicineTakeDate="";
	$dosage="";
	$person="";
	$recordNo="";
	$observe="";
	$test="";
	
	if(isset($_POST['submit'])){
		$medID = mysqli_real_escape_string($db,$_POST['medID']);
		$medName = mysqli_real_escape_string($db,$_POST['medName']);
		$medicineTakeDate = mysqli_real_escape_string($db,$_POST['medicineTakeDate']);
		$dosage = mysqli_real_escape_string($db,$_POST['dosage']);
		$person = $_SESSION['healthNo'];
		$appt = $_SESSION['appointNo'];
		
		
		//prescriptionNo incremental
		$sql = mysqli_query($db, "SELECT MAX(prescriptionNo) FROM medication");
		$row = mysqli_fetch_array($sql);		
		$value=$row['0'];
		$prescriptionNo=$value+1;
		
		//add medication into table
		$sql = "INSERT INTO medication (prescriptionNo, healthNo, medicineName, dosage, medicineTakeDate, appointNo, medID) 
				VALUES ('$prescriptionNo', '$person', '$medName','$dosage', '$medicineTakeDate', '$appt', '$medID')
			   ";
		if(mysqli_query($db, $sql)){
			echo "success";
		}	
		else{
			echo "snap";
		}
		
		//record number incremental
		$sql = mysqli_query($db, "SELECT MAX(recordNo) FROM record");
		$row = mysqli_fetch_array($sql);		
		$value=$row['0'];
		$recordNo=$value+1;
		
		//Insert into record table
		$observe="none";
		$test="none";
		$sql = "INSERT INTO record (recordNo, healthNo, appointNo, prescriptionNo, observations, testResult) 
				VALUES ('$recordNo','$person', '$appt','$prescriptionNo', '$observe', '$test')
			   ";
		mysqli_query($db, $sql);
		
		echo "<script>
					document.location.href='patientMedications.php';
					alert('Medication successfully added!');
			 </script>
			 ";
	}
	else{
		echo "<script>
						alert('Unable to add medication.');
						document.location.href='patientMedications.php';
				 </script>
			";
	}
?>