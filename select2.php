<?php

$connect = mysqli_connect("localhost", "help", "help", "help");
if(!empty($_POST))
{
	$output = '';
	$donor_name = mysqli_real_escape_string($connect, $_POST["donor_name"]);
	$donor_phone = mysqli_real_escape_string($connect, $_POST["donor_phone"]);
	$donor_email = mysqli_real_escape_string($connect, $_POST["donor_email"]);
	$patient_name = mysqli_real_escape_string($connect, $_POST["patient_name"]);
	$bkash_no = mysqli_real_escape_string($connect, $_POST["bkash_no"]);
	$amount = mysqli_real_escape_string($connect, $_POST["amount"]);
	$success = 'Not Done';
	$unique_id = rand(1,1000000000);
	 
	$datee='';
	$dateTime = new DateTime('now', new DateTimeZone('Asia/Dhaka')); 
	$datee = $dateTime->format("d/m/y");
	$datee.= '</br>';
	$datee .= $dateTime->format("H:i A");
    $query = "
    INSERT INTO holla(donor_name, donor_phone, donor_email, patient_name, bkash_no, amount, unique_id, date, success)
	VALUES('$donor_name', '$donor_phone', '$donor_email', '$patient_name', '$bkash_no', '$amount', '$unique_id', '$datee', '$success')
    ";
    if(mysqli_query($connect, $query))
    {
		$to = "pritomsh111@gmail.com";
		$subject = "DONATION!";
		$txt = "Please authenticate the donation made by
		\r\nDonor's Name: $donor_name
		\r\nDonor's Phone No: $donor_phone
		\r\nDonor's Email: $donor_email
		\r\nbKash No(Personal No): $bkash_no
		\r\n
		\r\nPatient's Name: $patient_name
		\r\nAmount(BDT): $amount
		\r\nUNIQUE ID For This User: $unique_id";
		$headers = "From: $donor_email";

		mail($to,$subject,$txt,$headers);
		
		$connect = mysqli_connect("localhost", "help", "help", "help");
		$output .= '<label class="text-success">Donation On Process!</label>';
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