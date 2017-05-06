<?php
//insert.php  
$connect = mysqli_connect("localhost", "root", "", "tbl_employee");
if(!empty($_POST))
{
	$output = '';
	$reach = mysqli_real_escape_string($connect, $_POST["reach"]);  
    $query = "
    INSERT INTO tbl_employee(reach)
     VALUES('$reach')
    ";
    if(mysqli_query($connect, $query))
    {
		$result = mysqli_query($connect, $select_query);
	}
?>


<?php  
//select.php  
if(isset($_POST["employee_id"]))
{
 $output = '';
 $pb = '';
 $connect = mysqli_connect("localhost", "root", "", "tbl_employee");
 $query = "SELECT * FROM tbl_employee WHERE id = '".$_POST["employee_id"]."'";
 $result = mysqli_query($connect, $query);
 $output .= '
		<div class="table-responsive">  
		<table class="table table-bordered">';
    while($row = mysqli_fetch_array($result))
    {
		//<img src="data:image/jpeg;base64,'.base64_encode($row['name'] ).'" height="200" width="200" class="img-thumnail" />
		
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
            <td width="30%"><label>Department</label></td>  
            <td width="70%">'.$row["dept"].'</td>  
        </tr>
        <tr>
            <td width="30%"><label>Age</label></td>  
            <td width="70%">'.$row["age"].'</td>  
        </tr>
        <tr>  
            <td width="30%"><label>Goal</label></td>  
            <td width="70%">'.$row["goal"].'</td>  
        </tr>
        <tr>  
            <td width="30%"><label>Reached</label></td>  
            <td width="70%">'.$row["reached"].'</td>  
        </tr>
        <tr>  
            <td width="30%"><label>Facebook Link</label></td>  
            <td width="70%">'.$row["fblink"].'</td>  
        </tr>
		
        <tr><div class="progress">
				<div class="progress-bar progress-bar-success progress-bar-striped active" style="width:'.$percent.'%;">
				'.$percent.'%
				</div>
		</div>
		</tr>
     ';
    }
    $output .= '</table></div>';
    echo $output;
}
?>