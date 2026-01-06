<?php include('header.php');?>

<section class="detail-page-section">

	<div class="container">

		<div class="row">

			<div class="col-lg-8">

				<div class="content">

					<h4>Appointment Detail</h4>

					<table class="table">

						<tr>

							<td class="label"><strong>Name:</strong>

							</td>

							<td class="data"><span>Pramod</span>

							</td>

						</tr>

						<tr>

							<td class="label"><strong>Contact:</strong>

							</td>

							<td class="data"><span>1234567890</span>

							</td>

						</tr>

						<tr>

							<td class="label"><strong>Email:</strong>

							</td>

							<td class="data"><span>Email@gmail.com</span>

							</td>

						</tr>

						<tr>

							<td class="label"><strong>Service:</strong>

							</td>

							<td class="data"><span>Service</span>

							</td>

						</tr>

						<tr>

							<td class="label"><strong>Time:</strong>

							</td>

							<td class="data"><span>10:00 am - 11:00 am</span>

							</td>

						</tr>

						<tr>

							<td class="label"><strong>Description:</strong>

							</td>

							<td class="data"><span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos asperiores ea quas magni numquam sequi rerum placeat tempora quod voluptas.</span>

							</td>

						</tr>

						<tr>

							<td class="label"><strong>Document :</strong>

							</td>

							<td class="data"><img src="images/service/4.jpg" alt="Attachment" class="img-fluid">

							</td>

						</tr>



					</table>

				</div>

			</div>

			<div class="col-lg-4">

				<div class="payment">

					<h4>Doctor</h4>

					<table class="table">

						<tr>

							<td class="label"><strong>Counsellor Information</strong>

							</td>

							<td class="data"><span>Ms Vidushi Dixit</span>

							</td>

						</tr>

						<tr>

							<td class="label"><strong>Mobile No.</strong>

							</td>

							<td class="data"><span>+91-8448582980</span>

							</td>

						</tr>

						<tr>

							<td class="label"><strong>Email</strong>

							</td>

							<td class="data"><span>counsellor@counsellorsupport.com</span>

							</td>

						</tr>

					</table>

					<div class="text-center payment-button">

						<button type="button" class="pay-btn" data-target="#pay_now" data-toggle="modal">Proceed to Payment <i class="fas fa-chevron-circle-right"></i></button>

					</div>

				</div>

			</div>



			<!-- Modal -->

			<div class="modal" id="pay_now" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

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

										<img src="images/qr.png" class="img-fluid">

									</div>

									<div class="col-sm-6 align-self-center text-center">

										<form>

											<h4><span>Pay Using</span> <br>Net Banking / Credit or Debit Card / Wallet</h4>

											<button class="btn-vd btn">Pay Now</button>

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

<?php include('footer.php');?>