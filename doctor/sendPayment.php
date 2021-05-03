<?php
	include('../config.php');
	session_start();
	//Initialize Variable
	$cType="";
	$cardNum="";
	$amount="";
	$healthNo="";
	$transactionNo="";
	$appointNo="";
	
	if(isset($_POST['submit'])){
		$cType = mysqli_real_escape_string($db,$_POST['cType']);
		$cardNum = mysqli_real_escape_string($db,$_POST['cardNum']);
		$amount = mysqli_real_escape_string($db,$_POST['amount']);
		$healthNo = $_SESSION['healthNo'];
		$appt = $_SESSION['appointNo'];
		
		//record number will be incremental
		$sql = mysqli_query($db, "SELECT MAX(transactionNo) FROM payment");
		$row = mysqli_fetch_array($sql);		
		$value=$row['0'];
		$transactionNo=$value+1;
		
		//Insert into record table
		$sql = "INSERT INTO payment (transactionNo, cardType, cardNo, healthNo, amount, appointNo) 
				VALUES ('$transactionNo','$cType','$cardNum','$healthNo','$amount', '$appt')
			   ";
		mysqli_query($db,$sql);
		
		echo "<script>
						alert('Payment is successful.');
						document.location.href='doctorHome.php';
				 </script>
			";
	}
	else{//didn't select a patient
		echo "<script>
						alert('Please try again.');
						document.location.href='payment.php';
				 </script>
			";
	}
?>