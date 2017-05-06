<?php
if(isset($_POST["id"]))
{
	$connect = mysqli_connect("localhost", "root", "", "tbl_employee");
	$output = '';
	$pb = '';
	$query = "SELECT * FROM tbl_employee WHERE id='".$_POST["id"]."'";
	$result = mysqli_query($connect, $query);
	while($row = mysqli_fetch_array($result))
	{
		$output = '
			<p><img src="/'.$row['image'].'" class="img-responsive img-thumbnail" /></p>
			<p><label>Name : '.$row['name'].'</label></p>
			<p><label>Designation : </label>'.$row['designation'].'</p>
			<p><label>Department : </label>'.$row['dept'].'</p>
			<p><label>Age : </label>'.$row['age'].' Years</p>
		  ';
		  
		$total = $row['goal'];
		$current = $row['reached'];
		$percent = round(($current/$total) * 100);
		$pb = '
			<p><label>Goal : </label>'.$row['goal'].' BDT</p>
			<p><label>Reached : </label>'.$row['reached'].' BDT</p>
			<p><div class="progress">
				<div class="progress-bar progress-bar-success progress-bar-striped active" style="width:'.$percent.'%;">
				'.$percent.'%
				</div>
			</div></p>
		';
	}
	echo $output;
	echo $pb;
}
?>