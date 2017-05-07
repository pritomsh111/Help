<?php

$a = rand(1,1000000000);
echo $a;

	echo "<br>";
	$datee='';
	$dateTime = new DateTime('now', new DateTimeZone('Asia/Dhaka')); 
	$datee = $dateTime->format("d/m/y");
	$datee.= '</br>';
	$datee .= $dateTime->format("H:i A");
	echo "$datee";
?>