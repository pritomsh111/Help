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
           <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
           <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
           <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />  
      </head>
      <body>  
           <br /><br />  
           <div class="container">  
                <h3 align="center">Admin Panel</h3>  
                <br />  
                <div class="table-responsive">  
                     <table id="employee_data" class="table table-striped table-bordered">  
                          <thead>  
                               <tr>  
                                    <td>Donor's Name</td>  
                                    <td>Donor's Phone No.</td>  
                                    <td>Donor's Email</td>  
                                    <td>Patient's Name</td>  
                                    <td>Amount</td>  
                                    <td>Done</td>  
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
                                    <td>'.$row["amount"].'</td>  
                                    <td>'.$row["success"].'</td>  
                               </tr>  
                               ';  
                          }
                          ?>  
                     </table> 
					 
                </div> 
				

<div class="modal fade" id="donate_money">
	<div class="modal-dialog">
		<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal1">&times;</button>
			<h4 class="modal-title">Donate</h4>
		</div>
		<div class="modal-body">
		<form method="post" id="donateform">
			<label>Enter Your Name</label>
			 <input type="text" name="donor_name" id="donor_name" placeholder="Donor's Name" class="form-control" />
			 <br />
			 <label>Enter Your Phone Number</label>
			 <textarea name="donor_phone" id="donor_phone" placeholder="Donor's Phone No." class="form-control"></textarea>
			 <br />
			 <label>Enter Your Email</label>
			 <input type="text" name="donor_email" id="donor_email" placeholder="Donor's Email" class="form-control" />
			 <br />
			 
			 <label>Enter Patient's Name</label>
			 <select name="patient_name" id="patient_name" class="form-control">
				<?php
				$result = mysqli_query($connect, $query);
				while($row = mysqli_fetch_array($result))
				{
				?>
					<option value="<?php echo $row["name"]; ?>"><?php echo $row["name"]; ?></option>
				<?php
				}
				?>
			 </select>
			 <br />
			 <label>Enter Amount</label>
			 <input type="text" name="amount" id="amount" placeholder="Amount" class="form-control" />
			 <br />  
			 <input type="submit" name="insert" id="insert" value="Donate" class="btn btn-success" />
			 
		</form>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		</div>
	</div>
 </div>
</div>
           </div>
		   
      </body>  
 </html>  
 <script>  
 $(document).ready(function(){  
      $('#employee_data').DataTable();  
 });
 </script>