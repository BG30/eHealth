<?php
	include('../config.php');
	session_start();
	
	//Initialize variables
	$option="";
	$appt="";
	
	if(isset($_POST['submit'])){
		$option=mysqli_real_escape_string($db,$_POST['option']);
		$appt=mysqli_real_escape_string($db,$_POST['appt']);
		
		if($option=='ACCEPTED'){
			$sql = "UPDATE appointment
					SET status='ACCEPTED'						
					WHERE appointNo='$appt'
					";
			mysqli_query($db,$sql);
			
			echo "<script>
					alert('Successfully accepted appointment!');
					document.location.href='timeTable.php';
			  </script>
			";
		}
		else if($option=='CANCELLED'){
			$sql = "UPDATE appointment
					SET status='CANCELLED'						
					WHERE appointNo='$appt'
					";
			mysqli_query($db,$sql);
			
			echo "<script>
					alert('Successfully cancelled appointment!');
					document.location.href='timeTable.php';
			  </script>
			";	
		}
		else{//no options picked
			echo "<script>
					alert('No action picked.');
					document.location.href='timetable.php';
				</script>
			";
		}
	}
	else{
		echo "<script>
					alert('Action was unsuccessful.');
					document.location.href='timeTable.php';
			  </script>
			";
	}
?>