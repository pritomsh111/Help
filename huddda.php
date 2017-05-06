<?php  

$connect = mysqli_connect("localhost", "root", "", "tbl_employee");
$query = "SELECT * FROM tbl_employee";
$result = mysqli_query($connect, $query);

?>
<!DOCTYPE html>
<html>
	<head>  
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Donation">
		<meta name="keywords" content="easy donation, donation">
		<meta name="author" content="Team বিন্দু">
		<title>Help!</title>  
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
	</head>  
	<body>

		<div style="background-color:lightblue !important" class="jumbotron">
			<div class="container text-center">
				<h1>Help Us!</h1>
				<h3>Raising Money For A Cause!</h3>
			</div>
		</div>
	
		<br /><br />  
		<div class="container" style="width:700px;">  
			<h3 align="center">Patients</h3>  
			<br />  
			<div class="table-responsive">
			<br />
			<div id="employee_table">
				<table class="table table-bordered">
				<tr>
					<th width="70%">Patient's Name</th> 
					<th width="15%">View</th>   
					<th width="15%">Donate</th>  
				</tr>
				<?php
				while($row = mysqli_fetch_array($result))
				{
				?>
				<?php
				$r = $row['trust'];
				if ($r == 'Yes'): ?>
				<tr>
				<td><label><a href="#" class="hover" id="<?php echo $row["id"]; ?>"><?php echo $row["name"]; ?></a></label></td>
				<td><input type="button" name="view" value="View" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs view_data" /></td>
				<td><input type="button" name="reached" value="Donate" id="<?php echo $row["id"]; ?>" data-toggle="modal" data-target="#donate_money" class="btn btn-info btn-xs" /></td>
				</tr>
				<?php endif; ?>
				<?php
				}
				?>
				</table>
			</div>
			<div align="center">
				<button type="button" name="age" id="age" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-warning">Add Patient</button>
			</div>
			<br /><br />  
			</div>  
		</div>
		<div class="container">
    <section>
      <div class="page-header" id="contact">
          <h2>Contact Us</h2>
        </div><!-- End Page Header -->

        <div class="row">
          <div class="col-lg-4">
            <p>Send us a message, or contact us from the address below</p>
            <address>
              <strong>Team বিন্দু</strong></br>
              Dhaka - 1200</br>
              Phone Number: +8801971322990
            </address>
          </div>
          
          <div class="col-lg-8">
            <form method="post" id="insert_comment" class="form-horizontal">
              <div class="form-group">
                <label for="user-name" class="col-lg-2 control-label">Name</label>
                <div class="col-lg-10">
                  <input type="text" class="form-control" name="name" id="user-name" placeholder="Enter you name">
                </div>
              </div><!-- End form group -->

              <div class="form-group">
                <label for="user-email" class="col-lg-2 control-label">Email</label>
                <div class="col-lg-10">
                  <input type="text" class="form-control" name="email" id="user-email" placeholder="Enter you Email Address">
                </div>
              </div><!-- End form group -->

              <div class="form-group">
                <label for="user-message" class="col-lg-2 control-label">Any Message</label>
                <div class="col-lg-10">
                  <textarea name="message" id="user-message" class="form-control" 
                  cols="20" rows="10" placeholder="Enter your Message"></textarea>
                </div>
              </div><!-- End form group -->

              <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                  <button type="submit" name="insert" id="insert" class="btn btn-primary">Submit</button>
					
                  <button type="submit" name="view" id="view" class="btn btn-primary">See Reviews</button>
                </div>
              </div>
            </form>
          </div>
        </div><!-- End the row -->

    </section>
  </div>

		<footer>
			<hr>
			<div class="container text-center">
				<ul class="list-inline">
					<span>Connect with us:</span>
					<br></br>
					<li><a href="http://www.facebook.com">
						<img src='http://www.womenactionmedia.org/cms/assets/themes/crate/images/social/facebook.png' />
					</a></li>
					<li><a href="http://www.twitter.com">
						<img src='http://grfx.cstv.com/schools/wis/graphics/icon_twitter24.jpg' />
					</a></li>
				</ul>
				<br>
				<p>&copy; Team বিন্দু ,  2017</p>
			</div>
		</footer>
	</body>  
</html>  


<div class="modal fade" id="add_data_Modal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Help!</h4>
			</div>
				<div class="modal-body">
					<form method="post" id="insert_form">
						<label>Enter Victim's Name</label>
						<input type="text" name="name" id="name" placeholder="Name" class="form-control" />
						<br />
						<label>Enter Victim's Phone Number</label>
						<textarea name="phone_number" id="phone_number" placeholder="Phone No." class="form-control"></textarea>
						<br />
						<label>Enter Victim's Address</label>
						<textarea name="address" id="address" placeholder="Address" class="form-control"></textarea>
						<br />
						<label>Select Gender</label>
						<select name="gender" id="gender" class="form-control">
						<option value="Male">Male</option>  
						<option value="Female">Female</option>
						</select>
						<br />  
						<label>Enter Designation</label>
						<input type="text" name="designation" id="designation" placeholder="Designation" class="form-control" />
						<br />  
						<label>Enter Name Of Your Department</label>
						<input type="text" name="dept" id="dept" placeholder="Department" class="form-control" />
						<br /> 
						<label>Enter Age</label>
						<input type="text" name="age" id="age" placeholder="Age" class="form-control" />
						<br />
						<label>Enter Total Money Needed</label>
						<input type="text" name="goal" id="goal" placeholder="Total Money" class="form-control" />
						<br />
						<label>Enter Facebook Link</label>
						<input type="text" name="fblink" id="fblink" placeholder="Facebook Link(Not Necessary)" class="form-control" />
						<br />
						<label>Enter Image Name</label>
						<input type="text" name="image" id="image" placeholder="Designation" class="form-control" />
						<br />  
						<input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />
					</form>
				</div>
			<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
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
						<?php
						$r = $row['trust'];
						if ($r == 'Yes'): ?>
							<option value="<?php echo $row["name"]; ?>"><?php echo $row["name"]; ?></option>
							
						<?php endif; ?>
						<?php
						}
						?>
					 </select>
					 <br />
					 <label>Enter bKash No.</label>
					 <input type="text" name="bkash_no" id="bkash_no" placeholder="bKash No. (Personal No.)" class="form-control" />
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



<div id="dataModal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Detail</h4>
   </div>
   <div class="modal-body" id="employee_detail">
    
   </div>
   <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
   </div>
  </div>
 </div>
</div>

<script>  
$(document).ready(function(){
 $('#donateform').on("submit", function(event){  
  event.preventDefault();  
 if($('#donor_name').val() == "")  
  {  
   alert("Donor's Name is required");  
  }  
  else if($('#donor_phone').val() == '')  
  {  
   alert("Donor's Phone No. is required");  
  }
  else if($('#donor_email').val() == '')
  {  
   alert("Donor's Email is required");  
  }
  else if($('#patient_name').val() == '')
  {  
   alert("Patient's Name is required");  
  }
  else if($('#amount').val() == '')
  {  
   alert("Amount is required");  
  }else{
   $.ajax({  
    url:"select2.php",  
    method:"POST",  
    data:$('#donateform').serialize(),  
    beforeSend:function(){  
     $('#insert').val("Inserting");  
    },  
    success:function(data){  
     $('#donateform')[0].reset();  
     $('#donate_money').modal('hide');  
     $('#employee_table').html(data);  
    }  
   });
  }
 });
 
 $('#insert_form').on("submit", function(event){  
  event.preventDefault();  
  if($('#name').val() == "")  
  {  
   alert("Name is required");  
  }  
  else if($('#address').val() == '')  
  {  
   alert("Address is required");  
  }
  else if($('#designation').val() == '')
  {  
   alert("Designation is required");  
  }
  else if($('#goal').val() == '')
  {  
   alert("Total Money is required");  
  }
   
  else  
  {  
   $.ajax({  
    url:"insert1.php",  
    method:"POST",  
    data:$('#insert_form').serialize(),  
    beforeSend:function(){  
     $('#insert').val("Inserting");  
    },  
    success:function(data){  
     $('#insert_form')[0].reset();  
     $('#add_data_Modal').modal('hide');  
     $('#employee_table').html(data);  
    }  
   });  
  }  
 });
 
 
 $('#insert_comment').on("submit", function(event){  
  event.preventDefault();  
  if($('#user-name').val() == "")  
  {  
   alert("Name is required");  
  }  
  else if($('#user-email').val() == '')  
  {  
   alert("Address is required");  
  }
  else if($('#user-message').val() == '')
  {  
   alert("Designation is required");  
  }
   
  else  
  {  
   $.ajax({  
    url:"insert5.php",  
    method:"POST",  
    data:$('#insert_comment').serialize(),  
    beforeSend:function(){  
     $('#insert').val("Inserting");  
    },  
    success:function(data){  
     $('#insert_comment')[0].reset();  
     $('#add_data_Modal').modal('hide');  
     $('#employee_table').html(data);  
    }  
   });  
  }  
 });


	$('.hover').tooltip({
	title: fetchData,
	html: true,
	placement: 'right'
	});

	function fetchData()
	{
		var fetch_data = '';
		var element = $(this);
		var id = element.attr("id");
		$.ajax({
		url:"fetch.php",
		method:"POST",
		async: false,
		data:{id:id},
		success:function(data)
		{
			fetch_data = data;
		}
	});   
	return fetch_data;
	}


 $(document).on('click', '.view_data', function(){

  var employee_id = $(this).attr("id");
  $.ajax({
   url:"select1.php",
   method:"POST",
   data:{employee_id:employee_id},
   success:function(data){
    $('#employee_detail').html(data);
    $('#dataModal').modal('show');
   }
  });
 });
});  
 </script>