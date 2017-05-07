<?php

$connect = mysqli_connect("localhost", "help", "help", "help");
if(!empty($_POST))
{
	$patient_name = mysqli_real_escape_string($connect, $_POST["patient_name"]);
	$unique_id = mysqli_real_escape_string($connect, $_POST["unique_id"]);
    $query = "SELECT * FROM holla";
	$result = mysqli_query($connect, $query);
	while($row = mysqli_fetch_array($result))
	{
		$suc = $row['success'];
		if($row['patient_name']==$patient_name)
		{
			if($row['unique_id']==$unique_id)
			{
				if($suc=='Not Done')
				{
					$newAmount1 = $row['amount'];
					$query = "  
					UPDATE holla
					SET success = 'Done'
					WHERE unique_id='".$row['unique_id']."'"; 
					$result = mysqli_query($connect, $query);
					break;
				}
			}
		}
	}
	
	$connect = mysqli_connect("localhost", "help", "help", "help");
	$query = "SELECT * FROM tbl_employee";
	$result = mysqli_query($connect, $query);
	while($row = mysqli_fetch_array($result))
	{
		if($row['name']==$patient_name)
		{
			$newAmount2 = $row['reached'];
		}
	}
	$newAmount = $newAmount1 + $newAmount2;
	$query = "  
	UPDATE tbl_employee
	SET reached = '$newAmount'   
	WHERE name='".$_POST["patient_name"]."'"; 
	$result = mysqli_query($connect, $query);
}
?>