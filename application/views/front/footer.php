<footer>

	<div class="footer-top">

		<div class="container">

		<div class="row">

			<div class="col-xs-12 col-sm-9">

				<marquee behavior="scroll" direction="right" onmouseover="this.stop();" onmouseout="this.start();"><h3><?= $footer[0]->marque_text ?></h3></marquee>

			</div>

			<div class="col-xs-12 col-sm-3">

				<div class="foob-contact">

					<a href="<?= base_url() ?>contact-us">

						Contact Us

					</a>

				</div>

			</div>

		</div>

	</div>

	</div>

	<div class="footer-middle">

		<div class="container">

			<div class="row">

				<div class="col-sm-3">

					<div class="foo-one">

						<a href="#">

							<img src="<?= base_url() ?><?= $footer[0]->logo?>" class="img-fluid">

						</a>

						<img src="<?= base_url() ?><?= $footer[0]->image?>" class="img-fluid">

						<div class="foo-social">

							<ul>

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

				</div>

				<div class="col-sm-3">

					<div class="foo-links">

						<h3>Quick Links</h3>

						<ul>

							<li><a href="<?= base_url() ?>about-us"><i class="fas fa-chevron-right"></i> About Us</a></li>

							<li><a href="<?= base_url() ?>consult-online"><i class="fas fa-chevron-right"></i> Consult Online</a></li>

							<li><a href="<?= base_url() ?>appointment"><i class="fas fa-chevron-right"></i> Visit Us</a></li>

							<li><a href="<?= base_url() ?>disclaimer"><i class="fas fa-chevron-right"></i> Disclaimer</a></li>

							<li><a href="<?= base_url() ?>privacy-policy"><i class="fas fa-chevron-right"></i> Privacy Policy</a></li>
                            <li><a href="<?= base_url() ?>cancellation-policy"><i class="fas fa-chevron-right"></i> Cancellation Policy</a></li>
						</ul>

					</div>

				</div>

				<div class="col-sm-3">

					<div class="foo-links">

						<h3>Our Services</h3>

						<ul>

							<?php if (isset($services) && !empty($services)) {

											$i=1;

										 foreach($services as $service) { ?>

							<li><a href="<?= base_url() ?>services/<?= $service->slug ?>"><i class="fas fa-chevron-right"></i> <?= $service->name ?></a></li>

							<?php }} ?>

						</ul>

					</div>

				</div>

				<div class="col-sm-3">

					<div class="foo-links">

						<h3>Get in Touch</h3>

						<ul>

							<li><a href="#"><i class="fas fa-map-pin"></i> <?= $footer[0]->address?></a></li>

							<li><a href="#"><i class="fas fa-phone-alt"></i> <?= $footer[0]->contact ?></a></li>

							<li><a href="#"><i class="fas fa-envelope"></i><?= $footer[0]->email?></a></li>

						</ul>

					</div>

				</div>

			</div>

		</div>

	</div>

	<div class="footer-bottom">

		<div class="container">

			<div class="row">

				<div class="col-sm-12">

					<p><?= $footer[0]->copyright_text ?> | Designed &amp; Developed By <a href="https://www.webmingo.in">Webmingo IT Solutions Pvt. Ltd.</a></p>

				</div>

			</div>

		</div>

	</div>

</footer>


<script src="<?= base_url() ?>assets/js/jquery.min.js"></script>

<script src="<?= base_url() ?>assets/js/popper.min.js"></script>

<script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>

<script src="<?= base_url() ?>assets/js/owl.carousel.min.js"></script>

<!-- Rev slider js -->

<script src="<?= base_url() ?>assets/js/revolution/jquery.themepunch.tools.min.js"></script>

<script src="<?= base_url() ?>assets/js/revolution/jquery.themepunch.revolution.min.js"></script>

<script src="<?= base_url() ?>assets/js/revolution/revolution.extension.video.min.js"></script>

<script src="<?= base_url() ?>assets/js/revolution/revolution.extension.slideanims.min.js"></script>

<script src="<?= base_url() ?>assets/js/revolution/revolution.extension.layeranimation.min.js"></script>

<script src="<?= base_url() ?>assets/js/revolution/revolution.extension.navigation.min.js"></script>



<script src="<?= base_url() ?>assets/js/custom.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">





<script type="text/javascript">





<?php if($this->session->flashdata('success')){ ?>

    toastr.success("<?php echo $this->session->flashdata('success'); ?>");

<?php }else if($this->session->flashdata('error')){  ?>

    toastr.error("<?php echo $this->session->flashdata('error'); ?>");

<?php }else if($this->session->flashdata('warning')){  ?>

    toastr.warning("<?php echo $this->session->flashdata('warning'); ?>");

<?php }else if($this->session->flashdata('info')){  ?>

    toastr.info("<?php echo $this->session->flashdata('info'); ?>");

<?php } ?>


$(document).ready(function() {
    setTimeout(function() {
      $('#onload').modal('show');
    }, 3000); // milliseconds
});


</script>

</body>

</html>