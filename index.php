<?php  

$connect = mysqli_connect("localhost", "help", "help", "help");
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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="rating.css" />
</head>

<body>

	<div style="background-color:lightblue !important" class="jumbotron">
		<div class="container text-center">
			<h1>Help Us!</h1>
			<h3>Raising Money For A Cause!</h3>
		</div>
	</div>

	<br /><br />
	<div class="container" style="width:65% !important;">
		<h2 align="center">
			<font color="red" align="center">bKash For Donation: +8801687997516</font>
		</h2>
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
						<th width="15%">Who Donated?</th>
					</tr>
					<?php
				while($row = mysqli_fetch_array($result))
				{
				?>
					<?php
				$r = $row['trust'];
				if ($r == 'Yes'): ?>
					<tr>
						<td><label><a href="#" class="hover" id="<?php echo $row[" id"]; ?>">
									<?php echo $row["name"]; ?>
								</a></label></td>
						<td><input type="button" name="view" value="View" id="<?php echo $row[" id"]; ?>" class="btn
							btn-info btn-xs view_data" /></td>
						<td><input type="button" name="reached" value="Donate" id="<?php echo $row[" id"]; ?>"
							data-toggle="modal" data-target="#donate_money" class="btn btn-info btn-xs" /></td>
						<td><input type="button" name="wd" value="WHO?" id="<?php echo $row[" id"]; ?>" class="btn
							btn-info btn-xs viewd_data" /></td>
					</tr>
					<?php endif; ?>
					<?php
				}
				?>
				</table>
			</div>
			<div align="center">
				<button type="button" name="age" id="age" data-toggle="modal" data-target="#add_data_Modal"
					class="btn btn-warning">Add Patient</button>
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
						<strong>বিন্দু</strong></br>
						Dhaka - 1200</br>
						Phone Number: +8801971322990, +8801687997516</br>
						Email: pritomsh111@gmail.com</br>
					</address>
				</div>

				<div class="col-lg-8">
					<form method="post" id="insert_comment" class="form-horizontal">
						<div class="form-group">
							<label for="user-name" class="col-lg-2 control-label">Name</label>
							<div class="col-lg-10">
								<input type="text" class="form-control" name="name" id="user-name"
									placeholder="Enter you name">
							</div>
						</div><!-- End form group -->

						<div class="form-group">
							<label for="user-email" class="col-lg-2 control-label">Email</label>
							<div class="col-lg-10">
								<input type="text" class="form-control" name="email" id="user-email"
									placeholder="Enter you Email Address">
							</div>
						</div><!-- End form group -->

						<div class="form-group">
							<label for="user-message" class="col-lg-2 control-label">Any Message</label>
							<div class="col-lg-10">
								<textarea name="message" id="user-message" class="form-control" cols="20" rows="10"
									placeholder="Enter your Message"></textarea>
							</div>
						</div><!-- End form group -->

						<div class="form-group">
							<label for="user-message" class="col-lg-2 control-label">Ratings</label>
							<div class="col-lg-5">
								<fieldset class="rating" name="rating" id="rating">
									<input type="radio" id="star5" name="rating" value="5 star" /><label class="full"
										for="star5" title="Awesome - 5 stars"></label>
									<input type="radio" id="star4half" name="rating" value="4 and a half star" /><label
										class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
									<input type="radio" id="star4" name="rating" value="4 star" /><label class="full"
										for="star4" title="Pretty good - 4 stars"></label>
									<input type="radio" id="star3half" name="rating" value="3 and a half star" /><label
										class="half" for="star3half" title="Meh - 3.5 stars"></label>
									<input type="radio" id="star3" name="rating" value="3 star" /><label class="full"
										for="star3" title="Meh - 3 stars"></label>
									<input type="radio" id="star2half" name="rating" value="2 and a half star" /><label
										class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
									<input type="radio" id="star2" name="rating" value="2 star" /><label class="full"
										for="star2" title="Kinda bad - 2 stars"></label>
									<input type="radio" id="star1half" name="rating" value="1 and a half star" /><label
										class="half" for="star1half" title="Meh - 1.5 stars"></label>
									<input type="radio" id="star1" name="rating" value="1 star" /><label class="full"
										for="star1" title="Sucks big time - 1 star"></label>
									<input type="radio" id="starhalf" name="rating" value="half star" /><label
										class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
								</fieldset>
							</div>
						</div>



						<div class="form-group">
							<div class="col-lg-10 col-lg-offset-2">
								<button type="submit" name="insert" id="insert" class="btn btn-primary">Submit</button>

								<button type="button" name="view" id="view" onclick="h('Reviews')"
									class="btn btn-primary tag_cnt">See Reviews</button>
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
			<p>&copy; বিন্দু , 2017</p>
		</div>
	</footer>
</body>
<!--<script type="text/javascript" async>function ajaxpath_590eb21f19523(url){return window.location.href == '' ? url : url.replace('&s=','&s=' + escape(window.location.href));}(function(){document.write('<div id="fcs_div_590eb21f19523"><a title="free comment script" href="http://www.freecommentscript.com">&nbsp;&nbsp;<b>Free HTML User Comments</b>...</a></div>');fcs_590eb21f19523=document.createElement('script');fcs_590eb21f19523.type="text/javascript";fcs_590eb21f19523.src=ajaxpath_590eb21f19523((document.location.protocol=="https:"?"https:":"http:")+"//www.freecommentscript.com/GetComments2.php?p=590eb21f19523&s=#!590eb21f19523");setTimeout("document.getElementById('fcs_div_590eb21f19523').appendChild(fcs_590eb21f19523)",1);})();</script><noscript><div><a href="http://www.freecommentscript.com" title="free html user comment box">Free Comment Script</a></div></noscript>-->

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
					<textarea name="phone_number" id="phone_number" placeholder="Phone No."
						class="form-control"></textarea>
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
					<input type="text" name="designation" id="designation" placeholder="Designation"
						class="form-control" />
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
					<input type="text" name="fblink" id="fblink" placeholder="Facebook Link(Not Necessary)"
						class="form-control" />
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
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Donate</h4>
			</div>
			<div class="modal-body">
				<form method="post" id="donateform">
					<label>Enter Your Name</label>
					<input type="text" name="donor_name" id="donor_name" placeholder="Donor's Name"
						class="form-control" />
					<br />
					<label>Enter Your Phone Number</label>
					<textarea name="donor_phone" id="donor_phone" placeholder="Donor's Phone No."
						class="form-control"></textarea>
					<br />
					<label>Enter Your Email</label>
					<input type="text" name="donor_email" id="donor_email" placeholder="Donor's Email"
						class="form-control" />
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
						<option value="<?php echo $row[" name"]; ?>">
							<?php echo $row["name"]; ?>
						</option>

						<?php endif; ?>
						<?php
						}
						?>
					</select>
					<br />
					<label>Enter bKash No.</label>
					<input type="text" name="bkash_no" id="bkash_no" placeholder="bKash No. (Personal No.)"
						class="form-control" />
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

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
						aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Image Tag Description</h4>
			</div>
			<div class="modal-body">

				<?php
			$connect = mysqli_connect("localhost", "help", "help", "help");
			$query = "SELECT * FROM comments";
			$result = mysqli_query($connect, $query);
				
			
			while($row = mysqli_fetch_array($result))
			{
			?>
				<?php 
				
				$output = '';
				$output .= '
				<div class="table-responsive">  
				<table class="table table-bordered">';
				$output .= '
					<tr>  
						<td width="30%"><label>Name</label></td>  
						<td width="70%">'.$row["name"].'</td>  
					</tr>
					<tr>  
						<td width="30%"><label>Date</label></td>  
						<td width="70%">'.$row["date"].'</td>  
					</tr>
					<tr>  
						<td width="30%"><label>Message</label></td>  
						<td width="70%">'.$row["message"].'</td>  
					</tr>
					<tr>  
						<td width="30%"><label>Rating</label></td>  
						<td width="70%">'.$row["rating"].'</td>  
					</tr>
					<br>
				 ';
			
				$output .= '</table></div>';
				echo $output;
				
				?>
				<?php
			}
			?>


			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

<script>

	function h(Data) {

		$("#myModal .modal-title").html(Data)
		$("#myModal").modal();
	}


	$(document).ready(function () {
		$('#donateform').on("submit", function (event) {
			event.preventDefault();
			if ($('#donor_name').val() == "") {
				alert("Donor's Name is required");
			}
			else if ($('#donor_phone').val() == '') {
				alert("Donor's Phone No. is required");
			}
			else if ($('#donor_email').val() == '') {
				alert("Donor's Email is required");
			}
			else if ($('#patient_name').val() == '') {
				alert("Patient's Name is required");
			}
			else if ($('#amount').val() == '') {
				alert("Amount is required");
			} else {
				$.ajax({
					url: "select2.php",
					method: "POST",
					data: $('#donateform').serialize(),
					beforeSend: function () {
						$('#insert').val("Inserting");
					},
					success: function (data) {
						$('#donateform')[0].reset();
						$('#donate_money').modal('hide');
						$('#employee_table').html(data);
					}
				});
			}
		});

		$('#insert_form').on("submit", function (event) {
			event.preventDefault();
			if ($('#name').val() == "") {
				alert("Name is required");
			}
			else if ($('#address').val() == '') {
				alert("Address is required");
			}
			else if ($('#designation').val() == '') {
				alert("Designation is required");
			}
			else if ($('#goal').val() == '') {
				alert("Total Money is required");
			}

			else {
				$.ajax({
					url: "insert1.php",
					method: "POST",
					data: $('#insert_form').serialize(),
					beforeSend: function () {
						$('#insert').val("Inserting");
					},
					success: function (data) {
						$('#insert_form')[0].reset();
						$('#add_data_Modal').modal('hide');
						$('#employee_table').html(data);
					}
				});
			}
		});


		$('#insert_comment').on("submit", function (event) {
			event.preventDefault();
			if ($('#user-name').val() == "") {
				alert("Name is required");
			}
			else if ($('#user-email').val() == '') {
				alert("Address is required");
			}
			else if ($('#user-message').val() == '') {
				alert("Designation is required");
			}
			else {
				$.ajax({
					url: "insert5.php",
					method: "POST",
					data: $('#insert_comment').serialize(),
					beforeSend: function () {
						$('#insert').val("Inserting");
					},
					success: function (data) {
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

		function fetchData() {
			var fetch_data = '';
			var element = $(this);
			var id = element.attr("id");
			$.ajax({
				url: "fetch.php",
				method: "POST",
				async: false,
				data: { id: id },
				success: function (data) {
					fetch_data = data;
				}
			});
			return fetch_data;
		}


		$(document).on('click', '.view_data', function () {

			var employee_id = $(this).attr("id");
			$.ajax({
				url: "select1.php",
				method: "POST",
				data: { employee_id: employee_id },
				success: function (data) {
					$('#employee_detail').html(data);
					$('#dataModal').modal('show');
				}
			});
		});

		$(document).on('click', '.viewd_data', function () {

			var employee_id = $(this).attr("id");
			$.ajax({
				url: "select6.php",
				method: "POST",
				data: { employee_id: employee_id },
				success: function (data) {
					$('#employee_detail').html(data);
					$('#dataModal').modal('show');
				}
			});
		});
	});  
</script>