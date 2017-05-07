<?php

$connect = mysqli_connect("localhost", "help", "help", "help");
if(!empty($_POST))
{
	$name = mysqli_real_escape_string($connect, $_POST["name"]);
	$trust = mysqli_real_escape_string($connect, $_POST["trust"]);
	$unique_id = mysqli_real_escape_string($connect, $_POST["unique_id"]);
    $query = "SELECT * FROM tbl_employee";
	$result = mysqli_query($connect, $query);
	while($row = mysqli_fetch_array($result))
	{
		if($row['name']==$name)
		{
			if($row['unique_id']==$unique_id)
			{
				$query = "  
				UPDATE tbl_employee
				SET trust = '$trust'
				WHERE unique_id='".$row['unique_id']."'"; 
				$result = mysqli_query($connect, $query);
				break;
			}
		}
	}
}
?>