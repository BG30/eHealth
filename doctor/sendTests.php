<?php
	include('../config.php');
	session_start();
	
	//Initialize Variables
	$recordNo="";           
	$healthNo="";           
	$appointNo="";          
	$prescriptionNo="";     
	$observations="";       
	$testResult="";         
	
	if(isset($_POST['submit'])){
		$person=$_SESSION['healthNo'];
		$appointNo=$_SESSION['appointNo'];
		$testResult=mysqli_real_escape_string($db,$_POST['testResult']);
		
		//record number will be incremental
		$sql = mysqli_query($db, "SELECT MAX(recordNo) FROM record");
		$row = mysqli_fetch_array($sql);		
		$value=$row['0'];
		$recordNo=$value+1;
		
		//Insert into record table
		$sql = "INSERT INTO record (recordNo, healthNo, appointNo, prescriptionNo, observations, testResult) 
				VALUES ('$recordNo','$person', '$appointNo','$prescriptionNo', '$observations', '$testResult')
			   ";
		mysqli_query($db,$sql);
		
		echo "<script>
					alert('Successfully sent test');
					document.location.href='patientTests.php';
			  </script>
			";
	}
	else{
			echo "<script>
							alert('Cannot send the tests at the moment');
							document.location.href='patientTests.php';
					  </script>
				";
	}
?>