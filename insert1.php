<?php

$connect = mysqli_connect("localhost", "help", "help", "help");
if(!empty($_POST))
{
	$output = '';
	$name = mysqli_real_escape_string($connect, $_POST["name"]);  
    $phone_number = mysqli_real_escape_string($connect, $_POST["phone_number"]);
    $address = mysqli_real_escape_string($connect, $_POST["address"]);  
    $gender = mysqli_real_escape_string($connect, $_POST["gender"]);  
    $designation = mysqli_real_escape_string($connect, $_POST["designation"]);  
    $dept = mysqli_real_escape_string($connect, $_POST["dept"]);  
    $age = mysqli_real_escape_string($connect, $_POST["age"]);
    $image = mysqli_real_escape_string($connect, $_POST["image"]);  
    $goal = mysqli_real_escape_string($connect, $_POST["goal"]);
    $fblink = mysqli_real_escape_string($connect, $_POST["fblink"]);
    $trust = 'No';
	$unique_id = rand(1,1000000000);
	$datee='';
	$dateTime = new DateTime('now', new DateTimeZone('Asia/Dhaka')); 
	$datee = $dateTime->format("d/m/y");
	$datee.= '</br>';
	$datee .= $dateTime->format("H:i A");
    $query = "
    INSERT INTO tbl_employee(name, phone_number, address, gender, designation, dept, age, image, goal, trust,  fblink, date, unique_id)
     VALUES('$name', '$phone_number', '$address', '$gender', '$designation', '$dept', '$age', '$image', '$goal', '$trust', '$fblink', '$datee', '$unique_id')
    ";
    if(mysqli_query($connect, $query))
    {
		require_once "lib/swift_required.php";

		$message = Swift_Message::newInstance()
            ->setSubject('AUTHENTICATION!')
            ->setFrom(array('noreply@lalbus.com' => 'Lalbus'))
            ->setTo(array('protimsh111@gmail.com'))
            ->setBody('Please authenticate this account:
Name: ' . $name . '
Phone Number: ' . $phone_number . '
Address: ' . $address . ' 
Designation: ' . $designation . ' 
Department: ' . $dept . ' 
Goal: ' . $goal . ' 
Facebook Link: ' . $fblink . ' 
UNIQUE ID For This User: ' . $unique_id . '
			');

        $transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, "ssl")
            ->setUsername('protimsh111')
            ->setPassword('nos123412344');
			
        $mailer = Swift_Mailer::newInstance($transport);
        $result = $mailer->send($message);
		
		
		/*$to = "pritomsh111@gmail.com";
		$subject = "Authentication!";
		$txt = "Please authenticate this account:
		\r\nName: $name
		\r\nPhone Number: $phone_number
		\r\nAddress: $address
		\r\nDesignation: $designation
		\r\nDepartment: $dept
		\r\nGoal(BDT): $goal
		\r\nFacebook Link: $fblink
		\r\n
		\r\nUNIQUE ID For This User: $unique_id";
		$headers = "From: $name";

		mail($to,$subject,$txt,$headers);
		*/
		$output .= '<label class="text-success">Data Inserted</label>';
		$select_query = "SELECT * FROM tbl_employee";
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