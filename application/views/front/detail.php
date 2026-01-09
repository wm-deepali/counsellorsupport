<?php
$MERCHANT_KEY = "1PnL2mq7";
$SALT = "2JZ0mx7Z6F";
// Merchant Key and Salt as provided by Payu.

//$PAYU_BASE_URL = "https://sandboxsecure.payu.in";		// For Sandbox Mode
$PAYU_BASE_URL = "https://secure.payu.in";			// For Production Mode

$action = '';
// }j%8s]RjrB$f
$posted = array();
if (!empty($_POST)) {
	//print_r($_POST);
	foreach ($_POST as $key => $value) {
		$posted[$key] = $value;

	}
}

$formError = 0;
if (empty($posted['txnid'])) {
	// Generate random transaction id
	$txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
} else {
	$txnid = $posted['txnid'];
}
$hash = '';
// Hash Sequence
$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
if (!empty($_POST)) {
	//$posted['productinfo'] = json_encode(json_decode('[{"name":"tutionfee","description":"","value":"500","isRequired":"false"},{"name":"developmentfee","description":"monthly tution fee","value":"1500","isRequired":"false"}]'));
	$hashVarsSeq = explode('|', $hashSequence);
	$hash_string = '';
	foreach ($hashVarsSeq as $hash_var) {
		$hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
		$hash_string .= '|';
	}

	$hash_string .= $SALT;


	$hash = strtolower(hash('sha512', $hash_string));

	$action = $PAYU_BASE_URL . '/_payment';

} elseif (!empty($posted['hash'])) {
	$hash = $posted['hash'];
	$action = $PAYU_BASE_URL . '/_payment';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Welcome To Counsellor Support</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Rev slider css -->
	<link href="<?= base_url() ?>assets/css/revolution/setting.css" rel="stylesheet">
	<link href="<?= base_url() ?>assets/css/revolution/layers.css" rel="stylesheet">
	<link href="<?= base_url() ?>assets/css/revolution/navigation.css" rel="stylesheet">
	<link href="<?= base_url() ?>assets/css/revolution/animate.css" rel="stylesheet">
	<!-- Libraries -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/owl.carousel.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">
	<script>
		var hash = '<?php echo $hash ?>';
		function submitPayuForm() {
			if (hash == '') {
				return;
			}
			var payuForm = document.forms.payuForm;
			payuForm.submit();
		}
	</script>
</head>

<body onload="submitPayuForm()">
	<header>
		<div class="top-section">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-4 nopad">
						<div class="social-icon">
							<ul>
								<li>Location: <?= $header[0]->location ?></li>
								<li><a href="<?= $social[0]->fb_link ?>"><i class="<?= $social[0]->fb ?>"></i></a>
								</li>
								<li><a href="<?= $social[0]->twitter_link ?>"><i
											class="<?= $social[0]->twitter ?>"></i></a>
								</li>
								<li><a href="<?= $social[0]->insta_link ?>"><i class="<?= $social[0]->insta ?>"></i></a>
								</li>
								<li><a href="<?= $social[0]->linkedin_link ?>"><i
											class="<?= $social[0]->linkedin ?>"></i></a>
								</li>
								<li><a href="<?= $social[0]->utube_link ?>"><i class="<?= $social[0]->utube ?>"></i></a>
								</li>
							</ul>
						</div>
					</div>
					<div class="col-md-6 col-8 nopad">
						<div class="top-menu">
							<ul>
								<li><a href="<?= base_url() ?>services">Our Services</a>
								</li>
								<li><a href="<?= base_url() ?>contact-us">Request for Appointment</a>
								</li>
								<li class="active"><a href="<?= base_url() ?>consult-online">Consult Online</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="middle-section">
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-6 order-0 order-sm-0">
						<div class="call-mid">
							<div class="media">
								<i class="fas fa-phone-alt align-self-center mr-3"></i>
								<div class="media-body">
									<h5>Call Us</h5>
									<h3><?= $header[0]->mobile ?></h3>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-4 order-2 order-sm-1 logo-nav">
						<div class="nav-logo">
							<a href="index.php">
								<img src="<?= base_url() ?><?= $header[0]->logo ?>" class="img-fluid">
							</a>

						</div>
					</div>
					<div class="col-md-4 col-6 order-1 order-sm-2">
						<div class="appoint-mid">
							<div class="media">
								<div class="media-body">
									<h5><a href="<?= base_url() ?>consult-online">Request an</a></h5>
									<h3><a href="<?= base_url() ?>consult-online">Appoinments</a></h3>
								</div>
								<i class="fas fa-clock align-self-center ml-3"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="navigation">
			<div class="container">
				<nav class="navbar navbar-expand-lg navbar-light bg-light">
					<button class="navbar-toggler" type="button" data-toggle="collapse"
						data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
						aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>


					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav m-auto">
							<li class="nav-item active">
								<a class="nav-link" href="<?= base_url() ?>">Home <span
										class="sr-only">(current)</span></a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="<?= base_url() ?>about-us">Counsellor</a>
							</li>
							<li class="nav-item dropdown">
								<a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button"
									data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Our Services
								</a>
								<div class="dropdown-menu" aria-labelledby="navbarDropdown">

									<a class="dropdown-item" href="<?= base_url() ?>services">Show All Services</a>
									<?php if (isset($services) && !empty($services)) {
										foreach ($services as $service) { ?>
											<a class="dropdown-item"
												href="<?= base_url() ?>services/<?= $service->slug ?>"><?= $service->name ?></a>
										<?php }
									} ?>
								</div>
							</li>
							<li class="nav-item dropdown">
								<a href="<?= base_url() ?>appointment" class="nav-link dropdown-toggle"
									id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
									aria-expanded="false">
									Book an Appointment
								</a>
								<div class="dropdown-menu" aria-labelledby="navbarDropdown">
									<a class="dropdown-item" href="<?= base_url() ?>appointment">Visit Us</a>
									<a class="dropdown-item" href="<?= base_url() ?>consult-online">Consult Online</a>
								</div>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="<?= base_url() ?>feedback">Feedback &amp; Suggestions</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="<?= base_url() ?>contact-us">Contact Us</a>
							</li>
						</ul>
					</div>
				</nav>
			</div>
		</div>
	</header>

	<section class="detail-page-section">
		<div class="container">
			<div class="row">
				<div class="col-sm-8">
					<div class="content">
						<h4>Appointment Detail</h4>
						<table class="table">
							<tr>
								<td class="label"><strong>Name:</strong>
								</td>
								<td class="data"><span><?= $user[0]->name ?></span>
								</td>
							</tr>
							<tr>
								<td class="label"><strong>Contact:</strong>
								</td>
								<td class="data"><span><?= $user[0]->mobile ?></span>
								</td>
							</tr>
							<tr>
								<td class="label"><strong>Email:</strong>
								</td>
								<td class="data"><span><?= $user[0]->email ?></span>
								</td>
							</tr>
							<tr>
								<td class="label"><strong>Package:</strong></td>
								<td class="data">
									<span><?= $user[0]->package_name ?> (<?= $user[0]->category_name ?>)</span>
								</td>
							</tr>

							<tr>
								<td class="label"><strong>Date:</strong>
								</td>
								<td class="data"><span><?= $user[0]->date ?></span>
								</td>
							</tr>
							<tr>
								<td class="label"><strong>Day:</strong>
								</td>
								<td class="data"><span><?= $user[0]->days ?></span>
								</td>
							</tr>

							<tr>
								<td class="label"><strong>Time:</strong>
								</td>
								<td class="data"><span><?= $user[0]->from_ ?> - <?= $user[0]->to_ ?></span>
								</td>
							</tr>
							<tr>
								<td class="label"><strong>Description:</strong>
								</td>
								<td class="data"><span><?= $user[0]->description ?></span>
								</td>
							</tr>
							<tr>
								<td class="label"><strong>Document :</strong>
								</td>
								<td class="data"><a href="<?= base_url() . $user[0]->image ?>" target="_blank">View
										Attachment</a>
								</td>
							</tr>
						</table>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="payment">
						<h4>Counsellor</h4>
						<table class="table">
							<tr>
								<td class="label"><strong>Counsellor Name</strong>
								</td>
								<td class="data"><span>Ms Vidushi Dixit</span>
								</td>
							</tr>
							<tr>
								<td class="label"><strong>Fee</strong></td>
								<td class="data">
									<?php
									// Prefer package price type if present
									$symbol = '$';
									if (isset($user[0]->price_type) && $user[0]->price_type == 'INR') {
										$symbol = '₹';
									}
									?>
									<span><?= $symbol  . number_format($user[0]->amount, 2) ?></span>
								</td>
							</tr>

							<tr>
								<td class="label"><strong>Mobile No.</strong>
								</td>
								<td class="data"><span><?= $footer[0]->contact ?></span>
								</td>
							</tr>
							<tr>
								<td class="label"><strong>Email</strong>
								</td>
								<td class="data"><span><?= $footer[0]->email ?></span>
								</td>
							</tr>
						</table>
						<div class="text-center payment-button">
							<button type="button" class="pay-btn" data-target="#pay_now" data-toggle="modal">Proceed to
								Payment <i class="fas fa-chevron-circle-right"></i></button>
						</div>
					</div>
				</div>

				<!-- Modal -->
				<div class="modal" id="pay_now" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
					aria-hidden="true">
					<div class="modal-dialog modal-lg" role="document">
						<div class="modal-content">
							<div class="modal-header modal-consult">
								<h3 class="modal-title" id="exampleModalLabel">Payment Option</h3>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>

							</div>
							<div class="modal-body">
								<div class="payment-modal">
									<div class="row">
										<div class="col-sm-6 border-1r text-center">
											<h4>Scan QR Code</h4>
											<img src="<?= base_url() ?>assets/images/qr.jpeg" class="img-fluid">
										</div>
										<div class="col-sm-6 align-self-center text-center">
											<form action="<?= $action ?>" method="post" name="payuForm">
												<input type="hidden" name="key" value="<?php echo $MERCHANT_KEY ?>" />
												<input type="hidden" name="hash" value="<?php echo $hash ?>" id="hash">
												<input type="hidden" name="txnid" id="txnid"
													value="<?php echo $txnid ?>" />
												<input name="amount" type="hidden"
													value="<?php echo (empty($user[0]->amount)) ? '' : $user[0]->amount; ?>"
													id="amount">
												<input name="firstname" type="hidden" id="firstname"
													value="<?php echo (empty($user[0]->name)) ? '' : $user[0]->name; ?>" />
												<input name="email" type="hidden" id="email"
													value="<?php echo (empty($user[0]->email)) ? '' : $user[0]->email; ?>">
												<input name="phone" type="hidden"
													value="<?php echo (empty($user[0]->mobile)) ? '' : $user[0]->mobile; ?>">
												<input name="productinfo"
													value="<?php echo (empty($user[0]->service_name)) ? '' : $user[0]->service_name ?>"
													type="hidden" id="service_name">
												<input name="surl" type="hidden"
													value="<?= base_url(); ?>front/success">
												<input name="furl" type="hidden"
													value="<?= base_url(); ?>front/failure">
												<input type="hidden" name="service_provider" value="payu_paisa"
													id="service_provider">
												<input type="hidden" name="appoint_id"
													value="<?php echo (empty($user[0]->id)) ? '' : $user[0]->id ?>"
													id="appoint_id">
												<!-- <h4><span>Pay Using</span> <br>Net Banking / Credit or Debit Card / Wallet</h4>
													<button id="btn-save" type="submit" class="btn-vd btn">Pay Now</button> -->
												<?php
												$whatsapp_number = preg_replace('/[^0-9]/', '', $footer[0]->contact);
												$appoint_id = $user[0]->id;
												?>
												<h4 class="mb-3">Complete Payment</h4>

												<p style="font-size:14px; line-height:1.6;">
													After doing the payment, please share the <strong>payment
														screenshot</strong>
													on the below given WhatsApp number.
												</p>

												<p style="font-size:14px;">
													📞 <strong>WhatsApp:</strong> <?= $footer[0]->contact ?><br>
													📧 <strong>Email:</strong> <?= $footer[0]->email ?>
												</p>

												<button type="button" class="btn btn-success mt-2"
													style="padding:10px 18px; font-size:14px;"
													onclick="goToWhatsapp(<?= $appoint_id ?>)">
													<i class="fab fa-whatsapp"></i> WhatsApp
												</button>



											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php include('footer.php'); ?>
	<script type="text/javascript">
		$(document).ready(function () {
			let baseurl = "<?= base_url(); ?>";
			$("#btn-save").click(function () {
				var txnid = $('#txnid').val();
				var hash = $('#hash').val();
				var appoint_id = $('#appoint_id').val();
				var service_provider = $('#service_provider').val();
				var amount = $('#amount').val();
				jQuery.ajax({
					type: "POST",
					url: baseurl + "front/add_payment_detail",
					dataType: 'html',
					data: { txnid: txnid, hash: hash, appoint_id: appoint_id, amount: amount, service_provider: service_provider },
					success: function (res) {
						if (res == 1) {
							toastr.success("Data Added Successfully");
							//location.reload();
						}
					},
				});
			});
		});
	</script>
	<script>
		function goToWhatsapp(appoint_id) {
			let baseurl = "<?= base_url(); ?>";
			let whatsappUrl =
				"https://wa.me/<?= $whatsapp_number ?>?text=Hello%20I%20have%20completed%20the%20payment.%20Please%20find%20the%20screenshot%20attached.";

			$.ajax({
				url: baseurl + "front/mark-whatsapp-payment",
				type: "POST",
				data: { appoint_id: appoint_id },
				success: function (res) {
					// Redirect to WhatsApp no matter what
					window.open(whatsappUrl, "_blank");
				}
			});
		}
	</script>