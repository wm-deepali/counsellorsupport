<!doctype html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="<?= base_url()?>assets/admin/css/bootstrap-4.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/admin/css/style.css">
</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col-md-5 mx-auto">
				<div class="myform form ">
					<div class="logo mb-3">
						<img src="<?= base_url()?>assets/images/logo.png" class="img-fluid">
					</div>
					<form name="login" action="<?= base_url() ?>admin/admin_login" method="POST">
						<div class="form-group">
							<label for="exampleInputId">Email</label>
							<input type="text" name="email" class="form-control" id="email" placeholder="Enter Email">
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Password</label>
							<input type="password" name="password" id="password" class="form-control" placeholder="Enter Password">
						</div>
						<div class="form-group row">
							<div class="col-md-12 text-center ">
								<button type="submit" class=" btn btn-block mybtn btn-dark tx-tfm">Login</button>
							</div>
						</div>
						<div class="form-group text-center">
							<!--<a href="#forgot-pass" data-target="#forgot-pass" data-toggle="modal">Forgot Password ?</a>-->
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="forgot-pass" tabindex="-1" role="dialog" aria-labelledby="forgot-pass" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="forgot-pass">Forgot Password</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
				
				</div>
				<div class="modal-body">
					<div class="form-group row">
						<div class="col-sm-12">
							<label class="label-control">Registered Mobile No.</label>
							<input type="number" class="text-control" placeholder="Enter Registered Mobile No.">
							<span>4 Digit OTP Will Sent to your Mobile Number</span>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-12 text-center">
							<button type="button" data-target="#otp-verify" data-toggle="modal" data-dismiss="modal" class="btn btn-dark">Send OTP</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="modal fade" id="otp-verify" tabindex="-1" role="dialog" aria-labelledby="otp-verify" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="forgot-pass">Change Password</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          				<span aria-hidden="true">&times;</span>
        			</button>
				
				</div>
				<div class="modal-body">
					<div class="form-group row otp-box justify-content-center">
						<div class="col-sm-8">
							<label class="label-control">Enter OTP</label>
							<div class="d-flex">
								<input type="number" class="text-control" placeholder="Enter Enter OTP">&nbsp;&nbsp;
								<button class="btn btn-dark btn-sm" id="verify-otp" type="button">Verify</button>
							</div>
						</div>
					</div>
					
					<div class="form-group row new-password" style="display:none;">
						<div class="col-sm-6">
							<label class="label-control">Enter New Password</label>
							<input type="password" class="text-control" placeholder="Enter New Password">
						</div>
						<div class="col-sm-6">
							<label class="label-control">Re-enter Password</label>
							<input type="password" class="text-control" placeholder="Re-enter Password">
						</div>
					</div>
					
					<div class="form-group row new-password" style="display:none;">
						<div class="col-sm-12 text-center">
							<button class="btn btn-dark" type="submit">Change Password</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="<?= base_url()?>assets/admin/js/jquery.js" type="text/javascript"></script>
	<script src="<?= base_url()?>assets/admin/js/poppers.js" type="text/javascript"></script>
	<script src="<?= base_url()?>assets/admin/js/bootstrap-4.js" type="text/javascript"></script>
	<script src="<?= base_url()?>assets/admin/js/custom.js" type="text/javascript"></script>
</body>
</html>