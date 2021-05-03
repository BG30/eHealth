<?php
	include('../config.php');
	session_start();
	
	//Initialize variables
	$day="";
	$time="";
	$doc="";
	$id="";
	
	if(isset($_POST['submit'])){
		$id=$_SESSION['ID'];
		$day=$_POST['selectDay'];
		$time=$_POST['selectTime'];
		$doc=$_SESSION['bookWith'];
		
		$sql="SELECT *
			  FROM appointment
			  WHERE doctorId='$doc' AND day='$day' AND time='$time'
		";
		$result=mysqli_query($db,$sql);
		
		if(mysqli_num_rows($result)==0){//no matches
			//record number will be incremental
			$sql = mysqli_query($db, "SELECT MAX(appointNo) FROM appointment");
			$row = mysqli_fetch_array($sql);		
			$value=$row['0'];
			$apptNum=$value+1;
			
			$status="WAITING";
			
			$sql = "INSERT INTO appointment (appointNo, doctorId, healthNo, day, status, time) 
					VALUES ('$apptNum','$doc','$id','$day','$status','$time')
					";
			mysqli_query($db,$sql);
			
			echo "<script>
					alert('Successfully sent appointment!');
					document.location.href='map.php';
			  </script>
			";
		}
		else{
			echo "<script>
					alert('Slot not available, try again.');
					document.location.href='appointmentForm.php';
			  </script>
			";	
		}
	}
	else{
		echo "<script>
					alert('Action was unsuccessful, try again.');
					document.location.href='appointmentForm.php';
			  </script>
			";
	}
?>