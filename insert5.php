<?php

$connect = mysqli_connect("localhost", "root", "", "comment");
if(!empty($_POST))
{
	$output = '';
	$name = mysqli_real_escape_string($connect, $_POST["name"]);
	$email = mysqli_real_escape_string($connect, $_POST["email"]);
	$message = mysqli_real_escape_string($connect, $_POST["message"]);
	
	$query = "
    INSERT INTO comments(name, email, message)
	VALUES('$name', '$email', '$message')
    ";
    if(mysqli_query($connect, $query))
    {
		$to = "pritomsh111@gmail.com";
		$subject = "Review Message!";
		$txt = "Please see this review given by
		\r\nName: $name
		\r\nEmail: $email
		\r\nMessage: $message
		\r\n";
		$headers = "From: $email";

		mail($to,$subject,$txt,$headers);
		
		$connect = mysqli_connect("localhost", "root", "", "tbl_employee");
		$output .= '<label class="text-success">Review Inserted</label>';
		$select_query = "SELECT * FROM tbl_employee ORDER BY id DESC";
		$result = mysqli_query($connect, $select_query);
		$output .= '
		<table class="table table-bordered">  
			<tr>  
					<th width="70%">Employee Name</th> 
					<th width="15%">View</th>
					<th width="15%">Donate</th>   
			</tr>
		';
		while($row = mysqli_fetch_array($result))
		{
			$r = $row['trust'];
			if ($r == 'Yes')
			{
				$output .= '
					<tr>  
						 <td><label><a href="#" class="hover" >' .$row["name"]. '</a></label></td>
						 <td><input type="button" name="view" value="view" id="' . $row["id"] . '" class="btn btn-info btn-xs view_data" /></td>
						  <td><input type="button" name="reached" value="Donate" id="' . $row["id"] . '" data-toggle="modal" data-target="#donate_money" class="btn btn-info btn-xs" /></td>
				
					</tr>
				';
			}
		}
		$output .= '</table>';
    }
    echo $output;
}
?>