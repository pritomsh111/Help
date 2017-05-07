<?php  

if(isset($_POST["employee_id"]))
{
	$pb = '';
	$output = '';
	$connect = mysqli_connect("localhost", "root", "", "tbl_employee");
	$query = "SELECT * FROM employee WHERE id = '".$_POST["employee_id"]."'";
	$result = mysqli_query($connect, $query);
	$output .= '  
			<div class="table-responsive">  
			<table class="table table-bordered">';
			while($row = mysqli_fetch_array($result))
			{
				$total = $row['goal'];
				$current = $row['reached'];
				$percent = round(($current/$total) * 100);
				$output .= '
				<tr>  
					<td width="30%"><label>Name</label></td>  
					<td width="70%">'.$row["name"].'</td>  
				</tr>
				<tr>  
					<td width="30%"><label>Address</label></td>  
					<td width="70%">'.$row["address"].'</td>  
				</tr>
				<tr>  
					<td width="30%"><label>Gender</label></td>  
					<td width="70%">'.$row["gender"].'</td>  
				</tr>
				<tr>  
					<td width="30%"><label>Designation</label></td>  
					<td width="70%">'.$row["designation"].'</td>  
				</tr>
				<tr>  
					<td width="30%"><label>Age</label></td>  
					<td width="70%">'.$row["age"].'</td>  
				</tr>
				<tr>  
					<td width="30%"><label>Age</label></td>  
					<td width="70%">'.$row["goal"].'</td>  
				</tr>
				<tr>  
					<td width="30%"><label>Age</label></td>  
					<td width="70%">'.$row["reached"].'</td>  
				</tr>
				<tr>  
					<td width="30%"><label>Age</label></td>  
					<td width="70%">'.$row["reached"].'</td>  
				</tr>
			 ';
			 $pb = '
				<p><div class="progress">
					<div class="progress-bar progress-bar-success progress-bar-striped active" style="width:'.$percent.'%;">
					'.$percent.'%
					</div>
				</div></p>
				';
			}
    $output .= '</table></div>';
    echo $output;
	echo $pb;
}
?>