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
</head>

<body>
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
							<li><a href="<?= $social[0]->twitter_link ?>"><i class="<?= $social[0]->twitter ?>"></i></a>
								</li>
								<li><a href="<?= $social[0]->insta_link ?>"><i class="<?= $social[0]->insta ?>"></i></a>
								</li>
								<li><a href="<?= $social[0]->linkedin_link ?>"><i class="<?= $social[0]->linkedin ?>"></i></a>
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
								<li><a href="<?= base_url() ?>consult-online">FAQ</a>
								</li>
								<li><a href="<?= base_url() ?>contact-us">Request an Appointment</a>
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
					<div class="col-md-4 col-12 col-sm-4 order-2 order-sm-1 logo-nav">
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
									<h3><a href="<?= base_url() ?>consult-online">Appointment</a></h3>
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
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    					<span class="navbar-toggler-icon"></span>
  					</button>
				

					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav m-auto">
							<li class="nav-item active">
								<a class="nav-link" href="<?= base_url() ?>">Home <span class="sr-only">(current)</span></a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="<?= base_url() ?>about-us">Counsellor</a>
							</li>
							<li class="nav-item dropdown">
        						<a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Our Services
        						</a>
        						<div class="dropdown-menu" aria-labelledby="navbarDropdown">

									<a class="dropdown-item" href="<?= base_url() ?>services">Show All Services</a>
									<?php if (isset($services) && !empty($services)) {
										 foreach($services as $service) { ?>
									<a class="dropdown-item" href="<?= base_url() ?>services/<?= $service->slug ?>"><?= $service->name ?></a>
								<?php }} ?>
        						</div>
      						</li>
							<li class="nav-item dropdown">
        						<a href="<?= base_url() ?>appointment" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          						Book an Appointment
        						</a>
        						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
									<a class="dropdown-item" href="<?= base_url() ?>contact-us">Visit Us</a>
									<a class="dropdown-item" href="<?= base_url() ?>consult-online">Consult Online</a>
        						</div>
      						</li>
      						</li>
							<li class="nav-item">
								<a class="nav-link" href="<?= base_url() ?>consult-online">FAQ</a>
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