<?php
	$connect = mysqli_connect("localhost", "root", "", "assist");
	$query ="SELECT * FROM holla";
	$result = mysqli_query($connect, $query);
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Help!</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
	</head>
	<body>  
		<br /><br />
		<div class="container">  
                <h1 align="center">Admin Panel (Donation Section)</h1>  
                <br />  
                <div class="table-responsive">  
                     <table id="employee_data" class="table table-striped table-bordered">  
                          <thead>  
                               <tr>  
                                    <td>Donor's Name</td>  
                                    <td>Donor's Phone No.</td>  
                                    <td>Donor's Email</td>
                                    <td>Patient's Name</td>
                                    <td>bKash No.</td>
                                    <td>Amount</td>
                                    <td>Date</td>
                                    <td>Done?</td>
                               </tr>  
                          </thead>  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo '  
                               <tr>  
                                    <td>'.$row["donor_name"].'</td>  
                                    <td>'.$row["donor_phone"].'</td>  
                                    <td>'.$row["donor_email"].'</td>  
                                    <td>'.$row["patient_name"].'</td>  
                                    <td>'.$row["bkash_no"].'</td>  
                                    <td>'.$row["amount"].'</td>  
                                    <td>'.$row["date"].'</td>  
                                    <td>'.$row["success"].'</td>  
                               </tr>  
                               ';  
                          }
                          ?>  
                     </table>
                </div>  
           </div>  
		   <div align="center">
				<button type="button" name="age" id="age" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-warning">Authenticate</button>
			</div>
	</body>  
</html>  


<div class="modal fade" id="add_data_Modal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Admin Panel</h4>
			</div>
			<div class="modal-body">
				<form method="post" id="insert_form">
					<label>Enter Victim's Name</label>
					<select name="patient_name" id="patient_name" class="form-control">
					<?php
					$result = mysqli_query($connect, $query);
					while($row = mysqli_fetch_array($result))
					{
					?>
						<option value="<?php echo $row["patient_name"]; ?>"><?php echo $row["patient_name"]; ?></option>
					<?php
					}
					?>
					</select>	

					 <br />  
					 <label>Enter Unique ID For This User</label>
					 <input type="text" name="unique_id" id="unique_id" placeholder="Unique ID" class="form-control" />
					 <br /> 
					<input type="submit" name="success" id="success" value="Done" class="btn btn-success" />
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>


<script>  
$(document).ready(function(){
	
	$('#insert_form').on("submit", function(event){  
		event.preventDefault();  
		if($('#patient_name').val() == "")  
		{  
			alert("Name is required");  
		}
		else  
		{  
			$.ajax({  
				url:"insert3.php",  
				method:"POST",  
				data:$('#insert_form').serialize(),  
				beforeSend:function(){  
				 $('#insert').val("Inserting");  
				},  
				success:function(data)
				{  
					$('#insert_form')[0].reset();  
					$('#add_data_Modal').modal('hide');  
					$('#employee_table').html(data);  
				}  
			});  
		}  
	});
});
 </script>